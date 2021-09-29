<?php
class Report_model extends CI_Model{
 
    function report_list(){
        $hasil=$this->db->get('report');
        return $hasil->result_array();
    }

    function report_per_org($data){
        $req = $this->db->select('')
        ->from('users')
        ->join('orgainzations', 'orgainzations.userid=users.userid')
        ->join('employee', 'employee.orgId=orgainzations.orgId')
        ->join('equipments', 'equipments.employeeid=employee.employeeid')
        ->join('report', 'report.equipmentid=equipments.equipmentid')
        ->where('orgainzations.orgId', $data['orgId'])
        ->where('users.userid', $data['userid'])
        ->where('report.day', date('d-m-Y'))
        ->get();

        return $req->result_array();
    }
 
    function save_report($data){
        
        $result=$this->db->insert('report', $data);

        return $result;
    }

    function report_exist($data){

        $req = $this->db->select('*')
        ->from('report')
        ->where('report.equipmentid', $data['equipmentid'])
        ->where('report.day', $data['day'])
        ->get();

        return $req->result_array();
    }
 
    function update_report($data, $id){
        return $this->db->update('report', $data, array('equipmentid'=>$id));
    }
 
    function delete_report($id){
        return $this->db->delete('report', array('id'=>$id));
    }
     
}