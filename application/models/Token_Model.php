<?php
class Token_model extends CI_Model{
    function check($token){
        $req = $this->db->select('*')
        ->from('token')
        ->where('token.token', $token)
        ->get();

        return $req->result_array();
    }

    function save_token($data){
        
        $result=$this->db->insert('token',$data);

        return $result;
    }
}