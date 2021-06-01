<?php

class Home extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "homepage";
        $this->load->helper("text");

    }

    public function index(){

        // Anasayfa...
        echo $this->viewFolder;

    }

    public function product_list()
    {

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

    public function course_list()
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "course_list_v";

        $this->load->model("course_model");

        $viewData->courses = $this->course_model->get_all(
            array(
                "isActive" => 1
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

    public function reference_list()
    {

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

    public function brand_list()
    {

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

    public function service_list()
    {

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

    public function about_us()
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "about_v";

        $this->load->model("settings_model");

        $viewData->settings = $this->settings_model->get();

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function contact()
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "contact_v";

        $this->load->helper("captcha");

        $config = array(
            "word" => '',
            "img_path" => 'captcha/',
            "img_url" => base_url("captcha"),
            "img_height" => 50,
            "img_width" => 150,
            "expiration" => 7200,
            "word_length" => 5,
            "font_size" => 40,
            "img_id" => "captcha_img",
            "pool" => "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHHIJKLMNOPQRSTUVWXYZ",
            "colors" => array(
                'background' => array(204, 0, 204),
                'border' => array(255, 255, 255),
                'text' => array(204, 255, 204),
                'grid' => array(0, 0, 112)
            )

        );

        $viewData->captcha = create_captcha($config);

        $this->session->set_userdata("captcha", $viewData->captcha["word"]);

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function send_contact_message()
    {

        $this->load->library("form_validation");

        $this->form_validation->set_rules("name", "Name", "trim|required");
        $this->form_validation->set_rules("email", "E-Mail", "trim|required|valid_email");
        $this->form_validation->set_rules("subject", "Subject", "trim|required");
        $this->form_validation->set_rules("message", "Message", "trim|required");
        $this->form_validation->set_rules("captcha", "Validation Code", "trim|required");


        if ($this->form_validation->run() === FALSE) {

            // TODO Alert...

            redirect(base_url("contact_us"));


        } else {


            if ($this->session->userdata("captcha") == $this->input->post("captcha")) {

                $name = $this->input->post("name");
                $email = $this->input->post("email");
                $subject = $this->input->post("subject");
                $message = $this->input->post("message");

                $email_message = "{$name} isimli ziyaretçi. Mesaj Bıraktı <br><b>Mesaj : </b> {$message} <br> <b>E-posta : </b> {$email}";

                if (send_email("", "Website contact message | $subject", $email_message)) {

                    echo "success";
                } else {
                    echo "failed";
                }

            } else {

                // TOdO Alert..

                redirect(base_url("contact_us"));

            }

        }



    }

    public function make_me_member(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("subscribe_email","E-mail address","trim|required|valid_email");

        if($this->form_validation->run() === FALSE) {


        } else {


            $this->load->model("member_model");

            $insert = $this->member_model->add(
                array(
                    "email"       => $this->input->post("subscribe_email"),
                    "isActive"    => 1,
                    "createdAt"   => date("Y-m-d H:i:s"),
                    "ip_address"  => $this->input->ip_address()
                )
            );

            if($insert){

            } else {

            }
        }

        redirect(base_url("contact"));
    }

    public function news_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "news_list_v";

        $this->load->model("news_model");

        $viewData->news_list = $this->news_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);


    }

    public function news_detail($url){

        if( $url != "") {

            $viewData = new stdClass();
            $viewData->viewFolder = "news_v";

            $this->load->model("news_model");

            $news = $this->news_model->get(
                array(
                    "isActive" => 1,
                    "url"      => $url
                ), "rank DESC"
            );

            if($news){

                $viewData->news = $news;

                $viewData->recent_news_list = $this->news_model->get_all(
                    array(
                        "isActive" => 1,
                        "id !="    => $news->id
                    ), "rank DESC", array("count" => 4, "start" => 0)
                );

                $viewCount  =  $news->viewCount +1;
                $this->news_model->update(
                    array(
                        "id"  => $news->id
                    ),
                    array(
                        "viewCount" => ++$news->viewCount
                    )
                );

                $viewData->news->viewCount = $viewCount;
                $viewData->opengrapgh = true;

                $this->load->view($viewData->viewFolder, $viewData);

            } else {

            }

        } else {

        }

    }

}