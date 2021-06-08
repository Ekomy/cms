<?php

class News extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "news_v";

        $this->load->model("news_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->news_model->get_all(
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

        $news_type = $this->input->post("news_type");

        if($news_type == "image") {

            if($_FILES["img_url"]["name"] == ""){

                $alert = array(
                    "title" => "Operation failed",
                    "text" => "Please choose an image",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("news/new_form"));

                die();
            }

        } else if( $news_type == "video ") {

            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");

        }

        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> This filed must be filled"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            if($news_type == "image") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $image_513x289 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",513,289, $file_name);
                $image_730x411 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",730,411, $file_name);

                if($image_513x289 && $image_730x411){

                    $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "news_type"     => $news_type,
                        "img_url"       => $file_name,
                        "video_url"     => "#",
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s")
                    );
                } else {

                    $alert = array(
                        "title" => "Operation failed",
                        "text" => "Error: Image couldn't uploaded",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("news/new_form"));

                }

            } else if($news_type == "video") {

                $data = array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "news_type"     => $news_type,
                    "img_url"       => "#"  ,
                    "video_url"     => $this->input->post("video_url"),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                );

            }

            $insert = $this->news_model->add($data);

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

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("news"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){


        $viewData = new stdClass();

        $item = $this->news_model->get(
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

        // Kurallar yazilir..

        $news_type = $this->input->post("news_type");

        if($news_type == "video"){

            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");

        }

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> must be filled"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            if($news_type == "image"){

                // Upload Süreci...


                if($_FILES["img_url"]["name"] !== "") {

                    $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                    $image_513x289 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",513,289, $file_name);
                    $image_730x411 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",730,411, $file_name);

                    if($image_513x289 && $image_730x411){

                        $uploaded_file = $this->upload->data("file_name");

                        $data = array(
                            "title" => $this->input->post("title"),
                            "description" => $this->input->post("description"),
                            "url" => convertToSEO($this->input->post("title")),
                            "news_type" => $news_type,
                            "img_url" => $file_name,
                            "video_url" => "#",
                        );

                    } else {

                        $alert = array(
                            "title" => "İşlem Başarısız",
                            "text" => "Görsel yüklenirken bir problem oluştu",
                            "type" => "error"
                        );

                        $this->session->set_flashdata("alert", $alert);

                        redirect(base_url("news/update_form/$id"));

                        die();

                    }

                } else {

                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                    );

                }

            } else if($news_type == "video"){

                $data = array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "news_type"     => $news_type,
                    "img_url"       => "#",
                    "video_url"     => $this->input->post("video_url")
                );

            }

            $update = $this->news_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("news"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->news_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $delete = $this->news_model->delete(
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
        redirect(base_url("news"));

    }

    public function isActiveSetter($id){
        if($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->news_model->update(
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

            $this->news_model->update(
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
