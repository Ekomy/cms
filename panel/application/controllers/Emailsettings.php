<?php

class Emailsettings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "email_settings_v";

        $this->load->model("emailsettings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->emailsettings_model->get_all(
            array()
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("protocol", "Protocol Name", "required|trim");
        $this->form_validation->set_rules("host", "E-Mail host", "required|trim");
        $this->form_validation->set_rules("port", "Port Number", "required|trim");
        $this->form_validation->set_rules("user_name", "User Name", "required|trim");
        $this->form_validation->set_rules("user", "E-mail(User)", "required|trim|valid_email");
        $this->form_validation->set_rules("from", "To (User)", "required|trim|valid_email");
        $this->form_validation->set_rules("to", "From (User)", "required|trim|valid_email");

        $this->form_validation->set_rules("password", "Password", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> This filed must be filled",
                "valid_email"   => "Please write a valid e-mail address.",
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->emailsettings_model->add(
                array(
                    "protocol"      => $this->input->post("protocol"),
                    "host"          => $this->input->post("host"),
                    "port"          => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"          => $this->input->post("user"),
                    "from"          => $this->input->post("from"),
                    "to"            => $this->input->post("to"),
                    "password"      => $this->input->post("password"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

            die();

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){


        $viewData = new stdClass();

        $item = $this->emailsettings_model->get(
            array(
                "id"=>$id
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_password_form($id){


        $viewData = new stdClass();

        $item = $this->emailsettings_model->get(
            array(
                "id"=>$id
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){

        $this->load->library("form_validation");

         $oldUser = $this->emailsettings_model->get(
            array(
                "id" => $id
            )
        );

        if($oldUser->user_name != $this->input->post("user_name")){
            $this->form_validation->set_rules("user_name", "User Name", "required|trim|is_unique[users.user_name]");
        }
        if($oldUser->user_name != $this->input->post("email")){
            $this->form_validation->set_rules("email", "E-mail", "required|trim|valid_email|is_unique[users.email]");        }

        $this->form_validation->set_rules("full_name", "Name Surname", "required|trim");


        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> This filed must be filled",
                "valid_email"   => "Please write a valid e-mail address.",
                "is_unique"     => "<b>{field}</b> already used",
                "min_length" => "<b>{field}</b> must be longer than 6 characters",
                "max_length" => "<b>{field}</b> must be shorter than 8 characters"

            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->emailsettings_model->update(array("id" => $id),
            array(
                "user_name"     => $this->input->post("user_name"),
                "full_name"     => $this->input->post("full_name"),
                "email"         => $this->input->post("email"),
            ));

            if($update){

                $alert = array(
                    "title" => "Successfully deleted",
                    "text" => "Your item is now out of list",
                    "type" => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation failed",
                    "text" => "There was a problem with delete",
                    "type" => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->emailsettings_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_password($id){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[8]");
        $this->form_validation->set_rules("re_password", "Re Password", "required|trim|min_length[6]|max_length[8]|matches[password]");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> This filed must be filled",
                "matches"     => "Passwords does not match",
                "min_length" => "<b>{field}</b> must be longer than 6 characters",
                "max_length" => "<b>{field}</b> must be shorter than 8 characters"

            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->emailsettings_model->update(array("id" => $id),
                array(
                    "password"     => md5( $this->input->post("password")),
                ));

            if($update){

                $alert = array(
                    "title" => "Successfully changed",
                    "text" => "Your password now changed",
                    "type" => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation failed",
                    "text" => "There was a problem with changing",
                    "type" => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->emailsettings_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $delete = $this->emailsettings_model->delete(
            array(
                "id" => $id
            )
    );

        if($delete) {

            $alert = array(
                "title" => "Successfully deleted",
                "text" => "Your item is now out of list",
                "type" => "success"
            );

        }
        else {

            $alert = array(
                "title" => "Operation failed",
                "text" => "There was a problem with delete",
                "type" => "error"
            );


             }
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("emailsettings"));

    }

    public function isActiveSetter($id){
        if($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->emailsettings_model->update(
                array(
                    "id"       => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function rankSetter(){

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->emailsettings_model->update(
                array(
                    "id" =>$id,
                    "rank !=" =>$rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }



}
