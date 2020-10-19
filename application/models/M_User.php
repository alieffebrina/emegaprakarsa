<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	function getuser(){
		$this->db->select('tb_staf.*, tb_provinsi.name_prov, tb_kota.name_kota, tb_kecamatan.kecamatan, tb_tipeuser.tipeuser, tb_dept.dept');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_staf.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_staf.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_staf.id_kecamatan');
        $this->db->join('tb_tipeuser', 'tb_tipeuser.id_tipeuser = tb_staf.id_tipeuser');
        $this->db->join('tb_dept', 'tb_dept.id_dept = tb_staf.id_dept');
        $query = $this->db->get('tb_staf');
    	return $query->result();
    }

    function getspek($ida){
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_staf.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_staf.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_staf.id_kecamatan');
        $this->db->join('tb_tipeuser', 'tb_tipeuser.id_tipeuser = tb_staf.id_tipeuser');
        $this->db->join('tb_dept', 'tb_dept.id_dept = tb_staf.id_dept');
        $this->db->where('tb_staf.id_user', $ida);
        $query = $this->db->get('tb_staf');
        return $query->result();
    }


    function tambah(){
        $user = array(
            'id_userupdate' => $this->session->userdata('id_user'),
            'id_tipeuser' => $this->input->post('tipe'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'tlp' => $this->input->post('tlp'),
            'jabatan' => $this->input->post('jabatan'),
            'id_dept' => $this->input->post('dept'),
            'username' => $this->input->post('username'),
            'password' => md5('123456'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_staf', $user);
    }

    function update(){
        $user = array(
            'id_userupdate' => $this->session->userdata('id_user'),
            'id_tipeuser' => $this->input->post('tipe'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'tlp' => $this->input->post('tlp'),
            'jabatan' => $this->input->post('jabatan'),
            'id_dept' => $this->input->post('dept'),
            'username' => $this->input->post('username'),
            'tglupdate' => date('Y-m-d h:i:s')
        );

        $where = array(
            'id_user' => $this->input->post('id')
        );

        $this->db->where($where);
        $this->db->update('tb_staf',$user);
    }
}