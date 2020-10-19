<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Customer extends CI_Model {

	function getcustomer(){
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_customer.id_kecamatan');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_customer.id_kota');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_customer.id_provinsi');
        $query = $this->db->get('tb_customer');
    	return $query->result();
    }

    function getspek($ida){
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_customer.id_kecamatan');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_customer.id_kota');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_customer.id_provinsi');
        $this->db->where('id_customer', $ida);
        $query = $this->db->get('tb_customer');
        return $query->result();
    }


    function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'namacustomer' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_customer', $user);
    }

    function update(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'namacustomer' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'tglupdate' => date('Y-m-d h:i:s')
        );

        $where = array(
            'id_customer' => $this->input->post('id')
        );

        $this->db->where($where);
        $this->db->update('tb_customer',$user);
    }

    
}