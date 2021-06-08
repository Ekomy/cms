<?php

class
Product extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "product_v";

        $this->load->model("product_model");
        $this->load->model("product_image_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->product_model->get_all(
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

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->product_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
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

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("product"));

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

        $item = $this->product_model->get(
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

        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> field must be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->product_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                )
            );


            if($update) {

                $alert = array(
                    "title" => "Successfully updated",
                    "text" => "Your item is now updated",
                    "type" => "success"
                );

            }
            else {

                $alert = array(
                    "title" => "Operation failed",
                    "text" => "There was a problem with update",
                    "type" => "error"
                );

        }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("product"));

        } else {

            $viewData = new stdClass();
            $item = $this->product_model->get(
                array(
                    "id"=>$id
                )
            );

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item= $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id){

        $delete = $this->product_model->delete(
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
        redirect(base_url("product"));

    }

    public function imageDelete($id, $parent_id){

        $fileName = $this->product_image_model->get(
            array(
                "id" => "$id"
            )
        );

        $delete = $this->product_image_model->delete(
            array(
                "id" => $id
            )
        );

        if($delete){

            unlink("uploads/{$this->viewFolder}/$fileName->image_url");

            redirect(base_url("product/image_form/$parent_id"));
        }else {
            redirect(base_url("product/image_form/$parent_id"));
        }
    }

    public function isActiveSetter($id){
        if($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_model->update(
                array(
                    "id"       => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function imageIsActiveSetter($id){
        if($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_image_model->update(
                array(
                    "id"       => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function isCoverSetter($id, $parent_id){

        if($id && $parent_id) {

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            // ID for cover
            $this->product_image_model->update(
                array(
                    "id"         => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );

            $this->product_image_model->update(
                array(
                    "id !="         => $id,
                    "product_id"    => $parent_id
                ),
                array(
                    "isCover"       =>  0
                )
            );

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->product_image_model->get_all(
                array(
                    "product_id" => $parent_id
                )
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData,true);

            echo $render_html;

        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->product_model->update(
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

    public function imageRankSetter(){
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->product_image_model->update(
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

    public function image_form($id){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            )
        );

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            ),"rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function image_upload($id){

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $image_348x215 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",348,215, $file_name);
        $image_1080x426 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",1080,426, $file_name);

        if($image_348x215 && $image_1080x426){

            $this->product_image_model->add(
                array(
                    "img_url"       => $file_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "product_id"    => $id
                )
            );
        }
        else
            echo "Operation failed";

        }

    public  function refresh_image_list($id){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            )
        );

       $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData,true);

       echo $render_html;
    }

}
