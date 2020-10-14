<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu_model extends CI_Model
{
    private $_table = "tb_submenu";

    public $id_submenu;
    public $id_menus;
    public $submenu;
    public $linksubmenu;
    public $statusmenu;

    public function rules()
    {
        return [
            ['field' => 'submenu',
            'label' => 'Submenu'],

            ['field' => 'icon',
            'label' => 'Icon'],

            ['field' => 'urutan',
            'label' => 'Urutan']

            
        ];
    }

    public function getAll()
    {
        return $this->db->get('tb_submenu')->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_submenu" => $id])->row();
    }



}
