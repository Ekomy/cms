<?php

class Home extends CI_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "homepage";
        $this->load->helper("text");


    }

    public function index(){

        print_r(get_settings());

        die();

        echo $this->viewFolder;

    }

    public function product_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "product_list_v";

        $this->load->model("product_model");

        $viewData->products = $this->product_model->get_all(
            array(
                "isActive" => 1
                ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
    }

    public function product_detail($url = "")
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "product_v";

        $this->load->model("product_model");
        $this->load->model("product_image_model");

        $viewData->product = $this->product_model->get(
            array(
                "isActive" => 1,
                "url" => $url
            )
        );

        $viewData->product_images = $this->product_image_model->get_all(
            array(
                "isActive" => 1,
                "product_id" => $viewData->product->id
            ), "rank ASC"
        );


        $viewData->other_products = $this->product_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $viewData->product->id,
            ), "rand()", array("start" => 0, "count" => 3)
        );

        $this->load->view($viewData->viewFolder, $viewData);


    }

    public function course_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "course_list_v";

        $this->load->model("course_model");

        $viewData->courses = $this->course_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC, event_date ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);


    }

    public function course_detail($url = "")
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "course_v";

        $this->load->model("course_model");

        $viewData->course = $this->course_model->get(
            array(
                "isActive" => 1,
                "url" => $url
            )
        );


        $viewData->other_courses = $this->course_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $viewData->course->id,
            ), "rand()", array("start" => 0, "count" => 3)
        );

        $this->load->view($viewData->viewFolder, $viewData);


    }

    public function reference_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "reference_list_v";

        $this->load->model("reference_model");

        $viewData->references = $this->reference_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
    }

    public function brand_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "brand_list_v";

        $this->load->model("brand_model");

        $viewData->brands = $this->brand_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
    }

    public function service_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "service_list_v";

        $this->load->model("service_model");

        $viewData->services = $this->service_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
    }

    public function about_us(){

        $viewData = new stdClass();
        $viewData->viewFolder = "about_v";

        $this->load->model("settings_model");

        $viewData->settings = $this->settings_model->get();

        $this->load->view($viewData->viewFolder, $viewData);

    }

}