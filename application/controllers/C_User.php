<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Dept');
        $this->load->model('M_Tipeuser');
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

        $tabel = 'tb_akses';
        $edit = array(
            'id_tipeuser' => $id,
            'edit' => '1',
            'id_submenu' => '4'
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
            'id_submenu' => '4'
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
            'id_submenu' => '4'
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

        $data['cust'] = $this->M_User->getuser();
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cust'] = $this->M_User->getuser();
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['tipe'] = $this->M_Tipeuser->gettipe();
        $data['dept'] = $this->M_Dept->gettipe();
        $this->load->view('user/v_adduser',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['tipe'] = $this->M_Tipeuser->gettipe();
        $data['dept'] = $this->M_Dept->gettipe();
        $this->load->view('user/v_edituser',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['tipe'] = $this->M_Tipeuser->gettipe();
        $data['dept'] = $this->M_Dept->gettipe();
        $this->load->view('user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {   
        $this->M_User->tambah();
        $this->session->set_flashdata('Sukses', "User Baru Berhasil Ditambah!!");
        redirect('User');  
    }

    function update()
    {   
        $this->M_User->update();
        $this->session->set_flashdata('Sukses', "User Berhasil Dirubah!!");
        redirect('User');
    }

    function hapus($id){
        $where = array('id_user' => $id);
        $this->M_Setting->delete($where,'tb_staf');
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Hapus!!");
        redirect('User');
    }

}
