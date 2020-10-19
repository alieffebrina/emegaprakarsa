<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Customer extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Customer');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cust'] = $this->M_Customer->getcustomer();

        $tabel = 'tb_akses';
        $edit = array(
            'id_tipeuser' => $id,
            'edit' => '1',
            'id_submenu' => '1'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'id_tipeuser' => $id,
            'delete' => '1',
            'id_submenu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $tambah = array(
            'id_tipeuser' => $id,
            'add' => '1',
            'id_submenu' => '1'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else{
            $tomboltambah = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksestambah'] = $tomboltambah;
        $data['aksesedit'] = $tomboledit;

        $this->load->view('customer/v_customer',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cust'] = $this->M_Customer->getcustomer();
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('customer/v_addcustomer',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cust'] = $this->M_Customer->getspek($ida);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('customer/v_editcustomer',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cust'] = $this->M_Customer->getspek($ida);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('customer/v_vcustomer',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {   
        $this->M_Customer->tambah();
        $this->session->set_flashdata('Sukses', "Customer Baru Berhasil Ditambah!!");
        redirect('Customer');  
    }

    function update()
    {   
        $this->M_Customer->update();
        $this->session->set_flashdata('Sukses', "Customer Berhasil Dirubah!!");
        redirect('Customer');
    }

    function hapus($id){
        $where = array('id_customer' => $id);
        $this->M_Setting->delete($where,'tb_customer');
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Hapus!!");
        redirect('Customer');
    }

}
