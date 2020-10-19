<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Tipeuser extends CI_Model {

	function gettipe(){
        $query = $this->db->get('tb_tipeuser');
    	return $query->result();
    }

    function getspek($ida){
        $this->db->where('id_tipeuser', $ida);
        $query = $this->db->get('tb_tipeuser');
        return $query->result();
    }


    function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'tipeuser' => $this->input->post('tipeuser'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_tipeuser', $user);
    }

    function update(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'tipeuser' => $this->input->post('tipeuser'),
            'tglupdate' => date('Y-m-d h:i:s')
        );

        $where = array(
            'id_tipeuser' => $this->input->post('id')
        );

        $this->db->where($where);
        $this->db->update('tb_tipeuser',$user);
    }

    
}