<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function index()
	{
		
		$this->load->view('welcome_message');
	}
	public function about()
	{
		echo 'hello worldddd';
	}
	public function authenticate()
	{
		if($this->session->has_userdata('user_email')){
			redirect('dashboard');
			exit();
		}else{
			$error = $this->session->flashdata('error');
			echo $error;
			if($error != null){
				if($error == 0){
					$data['error'] = '0';
				}else if($error == 1){
					$data['error'] = '1';
				}else if($error == 2){
					$data['error'] = '2';
				}else if($error == 3){
					$data['error'] = '3';
				} 
				
			}else{
				$data['error'] = 'nothing';
			}
			$this->load->view('authentication/authentication', $data);
		}
	}
}
