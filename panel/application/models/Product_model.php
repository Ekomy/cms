<?php

class Product_model extends CI_Model {

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where =array()) {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all(){

        return $this->db->get($this->tableName)->result();

    }

    public function add($data = array()){

        return $this->db->insert($this->tableName, $data);

    }

}
