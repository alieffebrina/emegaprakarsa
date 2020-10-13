<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        if ($this->input->post()) {
            if ($this->user_model->doLogin()) redirect(site_url('karyawan'));
        }
        $this->load->view("karyawan/login_page.php");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('karyawan/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }
}
