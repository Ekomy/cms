<?php

class Brands extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "brands_v";

        $this->load->model("brand_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->brand_model->get_all(
            array(), "rank ASC"
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

            if($_FILES["img_url"]["name"] == ""){

                $alert = array(
                    "title" => "Operation failed",
                    "text" => "Please choose an image",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("brands/new_form"));

                die();
        }

        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> This filed must be filled"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"],PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);

            $image_277x416  = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",277,416, $file_name);

            if($image_277x416){

                $insert = $this->brand_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "img_url"       => $file_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
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
                redirect(base_url("brands/new_form"));

                die();

            }


            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("brands"));

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

        $item = $this->brand_model->get(
            array(
                "id"=>$id
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

                if($_FILES["img_url"]["name"] !== "") {

                    $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                    $image_277x416  = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",277,416, $file_name);

                    if($image_277x416){

                        $data = array(
                            "title" => $this->input->post("title"),
                            "img_url" => $file_name
                        );

                    } else {

                        $alert = array(
                            "title" => "Operation failed",
                            "text" => "There was a problem with delete",
                            "type" => "error"
                        );

                        $this->session->set_flashdata("alert", $alert);

                        redirect(base_url("brands/update_form/$id"));

                        die();

                    }

                } else {

                    $data = array(
                        "title" => $this->input->post("title"),
                    );

                }

            $update = $this->brand_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
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

            redirect(base_url("brands"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->brand_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $delete = $this->brand_model->delete(
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
        redirect(base_url("brands"));

    }

    public function isActiveSetter($id){
        if($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->brand_model->update(
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

            $this->brand_model->update(
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
