<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $_table = "tb_menu";

    public $id_menu;
    public $menu;
    public $icon;
    public $urutan;

    public function rules()
    {
        return [
            ['field' => 'menu',
            'label' => 'Menu'],

            ['field' => 'icon',
            'label' => 'Icon'],

            ['field' => 'urutan',
            'label' => 'Urutan']

            
        ];
    }

    public function getAll()
    {
        return $this->db->get('tb_menu')->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_menu" => $id])->row();
    }



}
