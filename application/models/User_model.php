<?php

class User_model extends CI_Model
{
    private $_table = "tb_userlog";

    public $id_userlog;
    public $id_user;
    public $waktu;
    public $id_submenu;
    public $ket;

    public function rules()
    {
        return [
            ['field' => 'id_user',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'id_submenu',
            'label' => 'Submenu',
            'rules' => 'required'],

            ['field' => 'ket',
            'label' => 'Keterangan',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_userlog" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->id_submenu = $post["id_submenu"];
        $this->role = $post["role"] ?? "customer";
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    }

    public function doLogin(){
		$post = $this->input->post();

        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        if($user){
            $isPasswordTrue = password_verify($post["password"], $user->password);
            $isAdmin = $user->role == "admin";
            if($isPasswordTrue && $isAdmin){ 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
		}
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

}
