<?php
class Organization_model extends CI_Model{
 
    function organization_list($user){
        
        $req = $this->db->select('*')
        ->from('users')
        ->join('orgainzations', 'orgainzations.userid=users.userid')
        ->join('token', 'token.tokenid=orgainzations.tokenid')
        ->where('users.userid', $user['userid'])
        ->get();

        return $req->result_array();
    }
 
    function save_organization($data){
        
        $result=$this->db->insert('orgainzations',$data);

        return $result;
    }
 
    function update_organization($data){
        $this->db->set('orgName', $data['orgname']);
        $this->db->set('orgLocation', $data['orglocation']);
        $this->db->set('orgDomain', $data['orgdomain']);
        $this->db->where('orgId', $data['orgid']);
        $result=$this->db->update('orgainzations');
        return $result;
    }
 
    function delete_organization($id){
        $this->db->where('orgId', $id);
        $result=$this->db->delete('orgainzations');
        return $result;
    }

    function check_org($id, $org_name){
        $req = $this->db->select('*')
        ->from('orgainzations')
        ->where('userid', $id)
        ->where('orgName', $org_name)
        ->get();

        return $req->result_array();
    }
     
}