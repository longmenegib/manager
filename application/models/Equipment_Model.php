<?php
class Equipment_model extends CI_Model{

    function get_equipment_token($data){
        $req = $this->db->select('equipments.equipmentid')
        ->from('users')
        ->join('orgainzations', 'orgainzations.userid=users.userid')
        ->join('employee', 'employee.orgId=orgainzations.orgId')
        ->join('equipments', 'equipments.employeeid=employee.employeeid')
        ->where('orgainzations.tokenid', $data['tokenid'])
        ->where('equipments.macaddress', $data['macaddress'])
        ->get();

        return $req->result_array();
    }
 
    function equipment_list($data){
        $req = $this->db->select('*')
        ->from('users')
        ->join('orgainzations', 'orgainzations.userid=users.userid')
        ->join('employee', 'employee.orgId=orgainzations.orgId')
        ->join('equipments', 'equipments.employeeid=employee.employeeid')
        ->where('users.userid', $data['userid'])
        ->where('orgainzations.orgId', $data['orgId'])
        ->get();

        return $req->result_array();
    }
 
    function save_equipment($data){
        
        $result=$this->db->insert('equipments',$data);

        return $result;
    }
 
    function update_equipment($data){
        $this->db->set('macaddress', $data['macaddress']);
        $this->db->set('equipmenttype', $data['type']);
        $this->db->where('equipmentid', $data['equipmentid']);
        $result=$this->db->update('equipments');
        return $result;
    }
 
    function delete_equipment($equipid){
        $this->db->where('equipmentid', $equipid);
        $result=$this->db->delete('equipments');
        return $result;
    }
     
}