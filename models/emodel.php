<?php

class emodel extends CI_Model{
    
    public function getmails() {
        return $users=  $this->db->get('email')->result_array();
    }
    public function create($formArray) {
        
        $query=$this->db->insert('email',$formArray);//inserts into users table;
        $error=$this->db->error();
        $this->session->set_userdata('msg',$error);
        return $query;
        
    }
    public function deleteuser($userId) {
        $this->db->where('id',$userId);
        return $query=$this->db->delete('email');
        
        
    }
    public function dologin($username,$password) {
        $this->db->where('name',$username);
        $this->db->where('password',$password);
        return $users=  $this->db->get('user')->row_array();
        
        
    }
}

?>
