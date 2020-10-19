<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dept extends CI_Model {

	function gettipe(){
        $query = $this->db->get('tb_dept');
    	return $query->result();
    }

    function getspek($ida){
        $this->db->where('id_dept', $ida);
        $query = $this->db->get('tb_dept');
        return $query->result();
    }


    function tambah(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'dept' => $this->input->post('dept'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        
        $this->db->insert('tb_dept', $user);
    }

    function update(){
        $user = array(
            'id_user' => $this->session->userdata('id_user'),
            'dept' => $this->input->post('dept'),
            'tglupdate' => date('Y-m-d h:i:s')
        );

        $where = array(
            'id_dept' => $this->input->post('id')
        );

        $this->db->where($where);
        $this->db->update('tb_dept',$user);
    }

    
}