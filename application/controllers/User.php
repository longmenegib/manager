<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user_model');
	}
	
	public function index()
	{
		
		$this->load->view('welcome_message');
	}

    public function save(){

        if(!(filter_var($this->input->post("email"), FILTER_VALIDATE_EMAIL))) {
            echo "this is not an email address";
            $this->session->set_flashdata('error', '0');
            redirect('authenticate');
            exit();
        }
        if (strlen($this->input->post('password')) < 8){
            echo "Your password is too short.";
            $this->session->set_flashdata('error', '1');
            redirect('authenticate');
            exit();
        }
        if($this->input->post('password') != $this->input->post('c_password')){
            echo "the two password are not the same";
            $this->session->set_flashdata('error', '2');
            redirect('authenticate');
            exit();
        }
       

        $userData = array(
            'user_firstname'=> $this->input->post('firstname'),
            'user_lastname' => $this->input->post('lastname'),
            'user_email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'roles' => 'owner'
        );

        $check = $this->user_model->user_exist(array('user_email' => $userData['user_email']));
    
        if(count($check)>0){
            echo 'user exist already';
            die();
        }else{
           
            $saving = $this->user_model->save_user($userData);
            echo '<pre>';
            print_r($saving);
            echo '</pre>';
            $login = array(
                'user_email' => $userData['user_email'],
                'password' => $userData['password']
            );
            $check = $this->user_model->user_exist($login);

            if(count($check)>0){
                $this->session->set_userdata($check[0]);
                redirect('dashboard');
                exit();
            }
            
        }
       
    }
    public function login(){

        $userData = array(
            'user_email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );


        $check = $this->user_model->user_exist($userData);
        if(count($check)>0){
            echo '<pre>';
            print_r($check);
            echo '</pre>';
            
            $this->session->set_userdata($check[0]);
            redirect('dashboard');
            exit();
          
            
        }else{
            $this->session->set_flashdata('error', '3');
            redirect('authenticate');
            exit();
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('authenticate');
        exit();
    }

    public function update(){

    }
    public function delete(){

    }
}
