<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("submenu_model");
        $this->load->library('form_validation');
        $this->load->model("submenu_model");
		if($this->user_model->isNotLogin()) redirect(site_url('karyawan/login'));
    }

    public function index()
    {
        $data["menu"] = $this->menu_model->getAll();
        $this->load->view("user/menu/list", $data);
    }

    public function add()
    {
        $menu = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("karyawan/karyawan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('karyawan/karyawan');
       
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["karyawan"] = $karyawan->getById($id);
        if (!$data["karyawan"]) show_404();
        
        $this->load->view("karyawan/karyawan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->karyawan_model->delete($id)) {
            redirect(site_url('karyawan/karyawan'));
        }
    }
}
