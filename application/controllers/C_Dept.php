<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Dept extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Dept');
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
        $data['dept'] = $this->M_Dept->gettipe();

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

        $this->load->view('dept/v_dept',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['edept'] = $this->M_Dept->getspek($ida);
        $data['dept'] = $this->M_Dept->gettipe();
        $this->load->view('dept/v_edept',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {   
        $this->M_Dept->tambah();
        $this->session->set_flashdata('Sukses', "Departemen Baru Berhasil Ditambah!!");
        redirect('Dept');  
    }

    function update()
    {   
        $this->M_Dept->update();
        $this->session->set_flashdata('Sukses', "Departemen Berhasil Dirubah!!");
        redirect('Dept');
    }

    function hapus($id){
        $where = array('id_dept' => $id);
        $this->M_Setting->delete($where,'tb_dept');
        $this->session->set_flashdata('Sukses', "Departemen Berhasil Di Hapus!!");
        redirect('Dept');
    }

}
