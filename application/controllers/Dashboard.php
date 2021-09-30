<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('organization_model');
        $this->load->model('employee_model');
        $this->load->model('equipment_model');
        $this->load->model('token_model');
        $this->load->model('report_model');
	}
	
	public function index()
	{
        if($this->session->has_userdata('user_email')){
            $notify = $this->session->flashdata('notify');
            if($notify != null){
                if($notify == "orgcreated"){
                    $data['notify'] = 'orgcreated';
                }
            }else{
                $data['notify'] = '';
            }
            $data['page_name'] = 'list_org';
            $data['list_organization'] = $this->fetch_org();
            $data['orgName'] = '';

			$this->load->view('data', $data);
            
		}else{
			redirect('authenticate');
            exit();
		}
	}

    public function organizations()
	{
        if($this->session->has_userdata('user_email')){
            $data['page_name'] = 'list_org';
            $data['list_organization'] = $this->fetch_org();

            $data['orgName'] = '';
            $data['notify'] = '';
			$this->load->view('data', $data);
            
		}else{
			redirect('authenticate');
            exit();
		}
	}


    public function fetch_org(){
        $userid = $this->session->userdata('userid');
        $user = array('userid'=> $userid);
        $list_org = $this->organization_model->organization_list($user);

        // echo '<pre>';
        // print_r($list_org);
        // echo '</pre>';
        // die();
        return $list_org;
    }

    public function save_organization(){
        if($this->session->has_userdata('user_email')){
            //check token first
            do {
                $random = $this->token(12);
                $check = $this->token_model->check($random);
            } while (count($check) > 0);

            echo $random;
            
            //save the token after the check
            $save_token = $this->token_model->save_token(array('token'=>$random));

            if($save_token==1){
                //get the token entity saved and use the id 
                $get_token = $this->token_model->check($random);
                // echo '<pre>';
                // print_r($get_token);
                // echo '</pre>';
                // die();
            }

            $userid = $this->session->userdata('userid');
            $orgData = array(
                'userid' => $userid,
                'orgName'=> $this->input->post('org_name'),
                'orgLocation' => $this->input->post('org_location'),
                'orgDomain' => $this->input->post('org_domain'),
                'tokenid' => $get_token[0]['tokenid']
            );
    
            
            $saving = $this->organization_model->save_organization($orgData);
            $this->session->set_flashdata('notify', 'orgcreated');
            redirect('dashboard');
            exit();
		}else{
			$this->load->view('authentication/authentication');
		}   
    }

    public function save_employee(){
        if($this->session->has_userdata('user_email')){
            $userid = $this->session->userdata('userid');
            $orgData = array(
                'orgId' => $this->input->post('org_id'),
                'firstname'=> $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'title' => $this->input->post('title'),
                'department' => $this->input->post('department'),
                'email' => $this->input->post('email')
            );

            $orgName = $this->input->post('org_name');
    
            
            $saving = $this->employee_model->save_employee($orgData);

            $this->session->set_flashdata('notify', 'empcreated');
            redirect("dashboard/org/$orgName");
		}else{
			$this->load->view('authentication/authentication');
		}   
    }

    public function fetch_employee($userid, $orgid){
        $res = $this->employee_model->employee_list($userid, $orgid);
        // echo '<pre>';
        // print_r($res);
        // echo '</pre>';
        // die();

        return $res;
    }

    public function list_employee($orgName){
        if($this->session->has_userdata('user_email')){
            //check the organization name from the get url
            
            $userid = $this->session->userdata('userid');
            $org = $this->organization_model->check_org($userid, $orgName);

            if(count($org)>0){
                // echo '<pre>';
                // print_r($org);
                // echo '</pre>';
                // die();

                $data['org'] = $org;
                $data['orgName'] = $orgName;
                $data['page_name'] = 'list_employee';
                $data['list_organization'] = $this->fetch_org();
                $data['list_employee'] = $this->fetch_employee($userid, $org[0]['orgId']);
                $data['list_equipment'] = $this->fetch_equipment($userid, $org[0]['orgId']);
                $data['list_reports'] = $this->fetch_reports($userid, $org[0]['orgId']);
               
                $notify = $this->session->flashdata('notify');
                if($notify != null){
                    if($notify == "empcreated"){
                        $data['notify'] = 'empcreated';
                    }else if($notify == "equipcreated"){
                        $data['notify'] = 'equipcreated';
                    } 
                }
			    $this->load->view('data', $data);
            }else{
                redirect('dashboard');
                exit();
            }
            
		}else{
			redirect('authenticate');
            exit();
		}
    }

    public function update_organization(){
        if($this->session->has_userdata('user_email')){
            $userid = $this->session->userdata('userid');
            $userData = array(
                'userid' => $userid,
                'orgid'=> $this->input->post('org_id'),
                'orgname'=> $this->input->post('org_name_edit'),
                'orglocation' => $this->input->post('org_location_edit'),
                'orgdomain' => $this->input->post('org_domain_edit')
            );
    
            
            $saving = $this->organization_model->update_organization($userData);
            
            redirect('dashboard');
            exit();
		}else{
			$this->load->view('authentication/authentication');
		}   
    }

    public function delete_organization(){
        if($this->session->has_userdata('user_email')){
			$orgid=$this->input->post('org_id_delete');
            $results = $this->organization_model->delete_organization($orgid);

            redirect('dashboard');
            exit();
		}else{
			$this->load->view('authentication/authentication');
		}
    }

    public function update_employee(){
        if($this->session->has_userdata('user_email')){
            $userid = $this->session->userdata('userid');
            $empData = array(
                'orgId' => $this->input->post('org_id'),
                'employeeid' => $this->input->post('employee_id'),
                'firstname'=> $this->input->post('firstname_edit'),
                'lastname' => $this->input->post('lastname_edit'),
                'title' => $this->input->post('title_edit'),
                'department' => $this->input->post('department_edit'),
                'email' => $this->input->post('email_edit')
            );

            $orgName = $this->input->post('org_name');
    
            
            $saving = $this->employee_model->update_employee($empData);
            // echo '<pre>';
            // print_r($empData);
            // echo '</pre>';
            // die();
            redirect("dashboard/org/$orgName");
		}else{
			$this->load->view('authentication/authentication');
		}   
    }

    public function delete_employee(){
        if($this->session->has_userdata('user_email')){
			$empid=$this->input->post('employee_id_delete');
            $orgName = $this->input->post('org_name');
            $results = $this->employee_model->delete_employee($empid);

            redirect("dashboard/org/$orgName");
            exit();
		}else{
			$this->load->view('authentication/authentication');
		}
    }

    public function save_equipment(){
        if($this->session->has_userdata('user_email')){
            $userid = $this->session->userdata('userid');
            $equipData = array(
                'employeeid' => $this->input->post('owner'),
                'macaddress'=> $this->input->post('mac_address'),
                'equipmenttype' => $this->input->post('type'),
            );

            $orgName = $this->input->post('org_name');
    
            
            $saving = $this->equipment_model->save_equipment($equipData);
            // echo '<pre>';
            // print_r($orgData);
            // echo '</pre>';
            // die();
            $this->session->set_flashdata('notify', 'equipcreated');
            redirect("dashboard/org/$orgName");
		}else{
			$this->load->view('authentication/authentication');
		}   
    }
    public function fetch_equipment($userid, $orgId){
        $data = array(
            'userid'=>$userid,
            'orgId'=>$orgId
        );
        $res = $this->equipment_model->equipment_list($data);
        // echo '<pre>';
        // print_r($res);
        // echo '</pre>';
        // die();

        return $res;
    }

    public function update_equipment(){
        if($this->session->has_userdata('user_email')){
            $userid = $this->session->userdata('userid');
            $equipData = array(
                'equipmentid' => $this->input->post('equipmentid'),
                'macaddress' => $this->input->post('mac_address_edit'),
                'type'=> $this->input->post('type_edit'),
            );

            $orgName = $this->input->post('org_name');
    
            
            $saving = $this->equipment_model->update_equipment($equipData);
            // echo '<pre>';
            // print_r($equipData);
            // echo '</pre>';
            // die();
            redirect("dashboard/org/$orgName");
		}else{
			$this->load->view('authentication/authentication');
		}   
    }

    public function delete_equipment(){
        if($this->session->has_userdata('user_email')){
			$equipid=$this->input->post('equipment_id_delete');
            $orgName = $this->input->post('org_name');
            
            $results = $this->equipment_model->delete_equipment($equipid);

            redirect("dashboard/org/$orgName");
            exit();
		}else{
			$this->load->view('authentication/authentication');
		}
    }

    //create or generate token for organizations
    public function token($length) {
        $characters = array(
            "A","B","C","D","E","F","G","H","J","K","L","M",
            "N","P","Q","R","S","T","U","V","W","X","Y","Z",
            "a","b","c","d","e","f","g","h","i","j","k","m",
            "n","o","p","q","r","s","t","u","v","w","x","y","z",
            "1","2","3","4","5","6","7","8","9");
        if ($length < 0 || $length > count($characters)) return null;
        shuffle($characters);
        return implode("", array_slice($characters, 0, $length));
    }

    //reports
    public function fetch_reports($userid, $orgId){
        $data = array(
            'userid'=>$userid,
            'orgId'=>$orgId
        );
        $res = $this->report_model->report_per_org($data);
        // echo '<pre>';
        // print_r($res);
        // echo '</pre>';
        // die();

        return $res;
    }

}
