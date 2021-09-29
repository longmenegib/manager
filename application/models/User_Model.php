<?php
class User_model extends CI_Model{
 
    function user_list(){
        $hasil=$this->db->get('users');
        return $hasil->result();
    }
 
    function save_user($data){
        
        $result=$this->db->insert('users',$data);

        return $result;
    }

    function user_exist($user){
        
        $req = $this->db->get_where('users', $user);
        
        return $req->result_array();
    }
 
    function update_user($data){
 
    }
 
    function delete_user(){
    
    }
     
}