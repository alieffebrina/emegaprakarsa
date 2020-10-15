<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterCustomer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('mastercustomer_model');
        $this->load->model('Provinsi_model');
        $this->load->model('Kota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('template/header');
        $data['menu'] = $this->Menu_model->getAll();
        $this->load->view('template/sidebar', $data);
        $data["mastercustomer"] = $this->mastercustomer_model->getAll();
        $this->load->view("customer/customer", $data);
        $this->load->view('template/footer');
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
        $data['menu'] = $this->Menu_model->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $data['name_prov'] = $this->Provinsi_model->getAll();
        $data['name_kota'] = $this->Kota_model->getAll();
        $this->load->view('customer/tambah', $data);

        $this->load->view('template/footer', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('customer/edit');
       
        $mastercustomer = $this->mastercustomer_model;
        $validation = $this->form_validation;
        $validation->set_rules($mastercustomer->rules());

        if ($validation->run()) {
            $mastercustomer->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["mastercustomer"] = $mastercustomer->getById($id);
        if (!$data["mastercustomer"]) show_404();
        
        $this->load->view("customer/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mastercustomer_model->delete($id)) {
            redirect(site_url('user/mastercustomer'));
        }
    }
}
