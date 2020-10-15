<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model
{
    private $_table = "tb_kota";

    public $id_kota;
    public $id_provinsi;
    public $name_kota;

    public function rules()
    {
        return [
            ['field' => 'id_provinsi',
            'label' => 'prv',
            'rules' => 'required'],

            ['field' => 'name_kota',
            'label' => 'name_kota',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get("tb_kota")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kota" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();   
        $this->id_kota = uniqid();
        $this->id_provinsi = $post["id_provinsi"];
        $this->name_kota = $post["name_kota"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kota = $post["id"];
        $this->id_provinsi = $post["id_provinsi"];
        $this->name_kota = $post["name_kota"];
        $this->db->update($this->_table, $this, array('id_kota' => $post['id']));
    }

}

