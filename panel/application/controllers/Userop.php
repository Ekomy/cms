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

    public function send_email(){

        $config = array(
            "protocol"    => "smtp",
            "smtp_host"   => "ssl://smtp.gmail.com",
            "smtp_port"   => "465",
            "smtp_user"   => "edarendeli97@gmail.com",
            "smtp_pass"   => "EkinDar97!wroclaw",
            "starttls"    => true,
            "charset"     => "utf-8",
            "mailtype"    => "html",
            "wordwrap"    => true
        );


        $this->load->library("email" , $config);

        $this->email->set_newline("\r\n");
        $this->email->from("edarendeli97@gmail.com", "DEKIN");
        $this->email->to("darendeli.ekin@gmail.com");
        $this->email->subject("Sisteme Kayıt");
        $this->email->message("Yaşıyooorrr!!!!");


        $send = $this->email->send();

        if($send){
            echo "E-posta başarı ile gönderilmiştir";
        } else {
            echo $this->email->print_debugger();
        }

    }

}
