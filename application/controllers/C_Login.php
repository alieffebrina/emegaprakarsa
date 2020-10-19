<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_login');
		$this->load->library('session');
	}

	function index()
	{
		$this->load->view('v_login');
		
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//echo $nip.$password;
		$user = $this->M_login->get($username, $password);

		if(empty($user)){
			$this->session->set_flashdata('pesan','salah');
			$this->load->view('v_login');
		} else {
    		$session = array(
	          'authenticated'=>true, // Buat session authenticated dengan value true
	          'username'=>$user->username,  // Buat session nip
	          'nama'=>$user->nama,
	          'id_user'=>$user->id_user, // Buat session authenticated
	          'tipeuser'=>$user->id_tipeuser
	        );
	        $this->session->set_userdata($session); // Buat session sesuai $session
	        $this->M_login->userlog();
	        redirect('Welcome');
   		}
   	}

	public function logout(){
		$this->M_login->logout();
	    $this->session->sess_destroy(); // Hapus semua session
	    redirect('Login'); // Redirect ke halaman login
	}
}
