<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model
{
    private $_table = "tb_provinsi";

    public $id_provinsi;
    public $nama_prov;

    public function rules()
    {
        return [
            ['field' => 'nama_prov',
            'label' => 'prv',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get("tb_provinsi")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_provinsi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_provinsi = uniqid();
        $this->nama_prov = $post["nama_prov"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_provinsi = $post["id"];
        $this->nama_prov = $post["nama_prov"];
        $this->db->update($this->_table, $this, array('id_provinsi' => $post['id']));
    }

}
