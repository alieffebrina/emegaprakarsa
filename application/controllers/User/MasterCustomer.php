<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterCustomer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mastercustomer_model");
        $this->load->library('form_validation');
        $this->load->model("mastercustomer_model");
    }

    public function index()
    {
        $data["mastercustomer"] = $this->mastercustomer_model->getAll();
        $this->load->view("user/mastercustomer/list", $data);
    }

    public function add()
    {
        $mastercustomer = $this->mastercustomer_model;
        $validation = $this->form_validation;
        $validation->set_rules($mastercustomer->rules());

        if ($validation->run()) {
            $mastercustomer->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("user/mastercustomer/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('user/mastercustomer');
       
        $mastercustomer = $this->mastercustomer_model;
        $validation = $this->form_validation;
        $validation->set_rules($mastercustomer->rules());

        if ($validation->run()) {
            $mastercustomer->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["mastercustomer"] = $mastercustomer->getById($id);
        if (!$data["mastercustomer"]) show_404();
        
        $this->load->view("user/mastercustomer/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mastercustomer_model->delete($id)) {
            redirect(site_url('user/mastercustomer'));
        }
    }
}
