<?php

class product_model extends CI_Model {

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();
    }

   /** bütün kayıtları bana getiricek olan metot */
    public function get_all(){

        return $this->db->get($this->tableName)->result();
    }

}