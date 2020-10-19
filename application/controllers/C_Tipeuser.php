<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Tipeuser extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
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
        $data['tipe'] = $this->M_Tipeuser->gettipe();

        $tabel = 'tb_akses';
        $edit = array(
            'id_tipeuser' => $id,
            'edit' => '1',
            'id_submenu' => '2'
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
            'id_submenu' => '2'
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
            'id_submenu' => '2'
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

        $this->load->view('tipeuser/v_tipeuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['tipe'] = $this->M_Tipeuser->getspek($ida);
        $data['tipe'] = $this->M_Tipeuser->gettipe();
        $this->load->view('tipeuser/v_etipeuser',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['tipe'] = $this->M_Tipeuser->getspek($ida);
        $data['tipe'] = $this->M_Tipeuser->gettipe();
        $this->load->view('tipeuser/v_vtipeuser',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {   
        $this->M_Tipeuser->tambah();
        $this->session->set_flashdata('Sukses', "Tipe User Baru Berhasil Ditambah!!");
        redirect('Tipeuser');  
    }

    function update()
    {   
        $this->M_Tipeuser->update();
        $this->session->set_flashdata('Sukses', "Tipe User Berhasil Dirubah!!");
        redirect('Tipeuser');
    }

    function hapus($id){
        $where = array('id_tipeuser' => $id);
        $this->M_Setting->delete($where,'tb_tipeuser');
        $this->session->set_flashdata('Sukses', "Tipe User Berhasil Di Hapus!!");
        redirect('Tipeuser');
    }

}
