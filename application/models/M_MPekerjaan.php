<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_MPekerjaan extends CI_Model {

	function gettipe(){
        $query = $this->db->get('tb_jenispekerjaan');
    	return $query->result();
    }

    function getspek($ida){
        $this->db->where('id_jenispekerjaan', $ida);
        $query = $this->db->get('tb_jenispekerjaan');
        return $query->result();
    }


    function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'namapekerjaan' => $this->input->post('namapekerjaan'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );
        
        $this->db->insert('tb_jenispekerjaan', $user);
    }

    function update(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'namapekerjaan' => $this->input->post('namapekerjaan'),
            'tglupdate' => date('Y-m-d h:i:s')
        );

        $where = array(
            'id_jenispekerjaan' => $this->input->post('id')
        );

        $this->db->where($where);
        $this->db->update('tb_jenispekerjaan',$user);
    }

    
}