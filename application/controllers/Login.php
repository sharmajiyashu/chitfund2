<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
	   if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
            $res = json_decode(callApi('POST','signIn',$_POST),true);
          if(!empty($res)){
            if($res['status'] == 'success'){
                $this->session->set_userdata($res['data']);
                $this->session->set_flashdata('success', 'SignIn in Successfully');
                redirect('Dashboard');
            }else{
                $this->session->set_flashdata('Failed', 'Login Failed');
                redirect("Login");
            }
          }else{
            $this->session->set_flashdata('Failed', 'Login Failed');
            redirect("Login"); 
          }
        }else{
            $this->load->view('login');
        }
    }
   
    public function Logout() {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
