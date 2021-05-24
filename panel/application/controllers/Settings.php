<?php

class Settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "settings_v";

        $this->load->model("settings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->settings_model->get();

        if($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;

        $viewData->items = $item;

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

        if($_FILES["logo"]["name"] == ""){

            $alert = array(
                "title" => "Operation failed",
                "text" => "Please choose an image",
                "type" => "error"
            );

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("settings/new_form"));

            die();
        }

        $this->form_validation->set_rules("company_name", "School Name", "required|trim");
        $this->form_validation->set_rules("phone_1", "Main phone number", "required|trim");
        $this->form_validation->set_rules("email", "E-mail", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> This filed must be filled",
                "valid_email"   => "<b>{field}</b> This address is not a valid address"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"],PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("logo");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->settings_model->add(
                    array(
                        "company_name"     => $this->input->post("company_name"),
                        "phone_1"          => $this->input->post("phone_1"),
                        "phone_2"          => $this->input->post("phone_2"),
                        "fax_1"            => $this->input->post("fax_1"),
                        "fax_2"            => $this->input->post("fax_2"),
                        "address"          => $this->input->post("address"),
                        "about_us"         => $this->input->post("about_us"),
                        "mission"          => $this->input->post("mission"),
                        "vision"           => $this->input->post("vision"),
                        "email"            => $this->input->post("email"),
                        "facebook"         => $this->input->post("facebook"),
                        "twitter"          => $this->input->post("twitter"),
                        "instagram"        => $this->input->post("instagram"),
                        "linkedin"         => $this->input->post("linkedin"),
                        "logo"             => $uploaded_file,
                        "createdAt"        => date("Y-m-d H:i:s")
                    )
                );

                if($insert){

                    $alert = array(
                        "title"=> "Successfully added",
                        "text" => "Your item is now on the list",
                        "type" => "success"
                    );

                } else {

                    $alert = array(
                        "title" => "Operation failed",
                        "text" => "There was a problem with adding",
                        "type" => "error"
                    );
                }

            } else {
                $alert = array(
                    "title" => "Operation failed",
                    "text" => "Error: Image couldn't uploaded",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("settings/new_form"));

                die();

            }


            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("settings"));

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

        $item = $this->settings_model->get(
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

        $item = $this->settings_model->get(
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

         $oldUser = $this->settings_model->get(
            array(
                "id" => $id
            )
        );

        if($oldUser->user_name != $this->input->post("company_name")){
            $this->form_validation->set_rules("user_name", "User Name", "required|trim|is_unique[users.user_name]");
        }
        if($oldUser->user_name != $this->input->post("email")){
            $this->form_validation->set_rules("email", "E-mail", "required|trim|valid_email|is_unique[users.email]");        }


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

            $update = $this->settings_model->update(array("id" => $id),
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->settings_model->get(
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

            $update = $this->settings_model->update(array("id" => $id),
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->settings_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $delete = $this->settings_model->delete(
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
        redirect(base_url("settings"));

    }

    public function isActiveSetter($id){
        if($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->settings_model->update(
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

            $this->settings_model->update(
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
