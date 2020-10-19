<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
  public function get($username,$password){
    $where = array(
      'username' => $username,
      'password' => md5($password)
    );
  	$result = $this->db->get_where('tb_staf', $where)->row();

  	return $result;
  }

  function userlog(){
   		date_default_timezone_set('Asia/jakarta');  
   		$waktu = date('Y-m-d H:i:s');
        $userlog = array(
            'id_user' => $this->session->userdata('id_user'),
            'waktu' => $waktu,
            'ket' => 'Login',
        );

        $this->db->insert('tb_userlog', $userlog);
    }

    function logout(){
   		date_default_timezone_set('Asia/jakarta');  
   		$waktu = date('Y-m-d H:i:s');
        $userlog = array(
            'id_user' => $this->session->userdata('id_user'),
            'waktu' => $waktu,
            'ket' => 'Logout',
        );

        $this->db->insert('tb_userlog', $userlog);
    }
}
?>