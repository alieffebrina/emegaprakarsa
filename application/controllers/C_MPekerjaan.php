<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_MPekerjaan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_MPekerjaan');
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
            'id_submenu' => '5'
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
            'id_submenu' => '5'
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
            'id_submenu' => '5'
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

        $data['tipe'] = $this->M_MPekerjaan->gettipe();
        $this->load->view('mpekerjaan/v_mpekerjaan',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['pek'] = $this->M_MPekerjaan->getspek($ida);
        $data['tipe'] = $this->M_MPekerjaan->gettipe();
        $this->load->view('mpekerjaan/v_epekerjaan',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {   
        $this->M_MPekerjaan->tambah();
        $this->session->set_flashdata('Sukses', "Jenis Pekerjaan Baru Berhasil Ditambah!!");
        redirect('Jenispekerjaan');  
    }

    function update()
    {   
        $this->M_MPekerjaan->update();
        $this->session->set_flashdata('Sukses', "Jenis Pekerjaan Berhasil Dirubah!!");
        redirect('Jenispekerjaan');
    }

    function hapus($id){
        $where = array('id_jenispekerjaan' => $id);
        $this->M_Setting->delete($where,'tb_jenispekerjaan');
        $this->session->set_flashdata('Sukses', "Jenis Pekerjaan Berhasil Di Hapus!!");
        redirect('Jenispekerjaan');
    }

}
