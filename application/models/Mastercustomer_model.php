<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mastercustomer_model extends CI_Model
{
    private $_table = "tb_customer";

    public $id_customer;
    public $namacustomer;
    public $alamat;
    public $id_kota;
    public $id_provinsi;
    public $id_kecamatan;

    public function rules()
    {
        return [
            ['field' => 'namacustomer',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],

            ['field' => 'id_kota',
            'label' => 'kota',
            'rules' => 'required'],

            ['field' => 'id_provinsi',
            'label' => 'provinsi',
            'rules' => 'required'],

            ['field' => 'id_kecamatan',
            'label' => 'kecamatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_customer" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_customer = uniqid();
        $this->namacustomer = $post["namacustomer"];
		$this->alamat = $post["alamat"];
        $this->id_kota = $post["id_kota"];
        $this->id_provinsi = $post["id_provinsi"];
        $this->id_kecamatan = $post["id_kecamatan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_customer = $post["id"];
        $this->namacustomer = $post["namacustomer"];
        $this->alamat = $post["alamat"];
        $this->id_kota = $post["id_kota"];
        $this->id_provinsi = $post["id_provinsi"];
        $this->id_kecamatan = $post["id_kecamatan"];
        $this->db->update($this->_table, $this, array('id_customer' => $post['id']));
    }

}
