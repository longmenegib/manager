<?php
class Employee_model extends CI_Model{
 
    function employee_list($id, $orgid){
        $req = $this->db->select('*')
        ->from('users')
        ->join('orgainzations', 'orgainzations.userid=users.userid')
        ->join('employee', 'employee.orgId=orgainzations.orgId')
        ->where('users.userid', $id)
        ->where('orgainzations.orgId', $orgid)
        ->get();

        return $req->result_array();
    }
 
    function save_employee($data){
        
        $result=$this->db->insert('employee',$data);

        return $result;
    }
 
    function update_employee($data){
        $this->db->set('firstname', $data['firstname']);
        $this->db->set('lastname', $data['lastname']);
        $this->db->set('email', $data['email']);
        $this->db->set('title', $data['title']);
        $this->db->set('department', $data['department']);
        $this->db->where('orgId', $data['orgId']);
        $this->db->where('employeeid', $data['employeeid']);
        $result=$this->db->update('employee');
        return $result;
    }
 
    function delete_employee($empid){
        $this->db->where('employeeid', $empid);
        $result=$this->db->delete('employee');
        return $result;
    }
     
}