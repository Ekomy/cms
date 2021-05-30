<?php

class Userop extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");

    }

    public function login(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function do_login(){

        if(get_active_user()){
            redirect(base_url());
        }

        $this->load->library("form_validation");


        $this->form_validation->set_rules("user_email", "E-Mail", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Password", "required|trim|min_length[6]|max_length[8]");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> this field must be filled",
                "valid_email" => "Plase enter a valid e-mail",
                "min_length"  => "<b>{field}</b> Must be longer than 5 character",
                "max_length"  => "<b>{field}</b> Must be shorter than 8 character",
            )
        );

        // Form Validation Calistirilir..
        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {


            $user = $this->user_model->get(
                array(
                    "email"    => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password")),
                    "isActive" => 1
                )
            );

            if($user){

                $alert = array(
                    "title"=> "Successfully Log In",
                    "text" => "$user->full_name Welcome!",
                    "type"  => "success"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {

                $alert = array(
                    "title" => "Operation failed",
                    "text" => "Please check your email and password",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));

            }

        }


    }

    public function logout(){

       $this->session->unset_userdata("user");

       redirect(base_url("login"));

    }

    public function forget_password(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function reset_password() {

        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> this field must be filled",
                "valid_email" => "Plase enter a valid e-mail"
            )
        );

        if($this->form_validation->run() === FALSE){

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
        else {

            $user = $this->user_model->get(
                array(
                    "isActive"   => 1,
                    "email"      => $this->input->post("email")
                )
            );

            if($user){

                $this->load->helper("string");
                $temp_password = random_string();

                $send = send_email($user->email, "Forgot Password" , "You can enter DEKIN system with your new password: <b>{$temp_password}</b>");

                if($send){
                    echo "E-Mail has send correctly";
                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password"  => md5($temp_password)
                        )
                    );

                    $alert = array(
                        "title"  => "Operation Success",
                        "text"   => "Your new password is send it to you. Please Check your mail address",
                        "type"   => "success"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("login"));

                    die();

                } else {
                    $alert = array(
                        "title"  => "Operation Failed",
                        "text"   => "Operation failed. Please try again later.",
                        "type"   => "error"
                    );
                }

            } else {
                $alert = array(
                    "title"  => "Operation Failed",
                    "text"   => "The E-mail is not used by any user",
                    "type"   => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("forgot-password"));
            }


        }


    }



}
