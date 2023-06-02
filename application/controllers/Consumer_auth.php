<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consumer_auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->library('SendMail');
        $this->load->library('CustomerAuth');
        $this->load->model(['model_common','model_ip_block']);	
		$this->load->model('model_consumer_auth');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{
      
		$this->customerauth->logged_in();

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
         $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if ($this->form_validation->run() == TRUE) {
            // true case
           	$username_exists = $this->model_consumer_auth->check_username($this->input->post('email'));

           	if($username_exists == TRUE) {
           	    
           		$login = $this->model_consumer_auth->login($this->input->post('email'), $this->input->post('password'));
                
           		if($login) {
           			$logged_in_sess = array(
           				'user_id' => $login['id'],
				        'email'     => $login['email'],
				        'logged_in' => TRUE
					);
                    
					$this->session->set_userdata($logged_in_sess);
				// echo $this->session->userdata('user_id');
				// exit();	
           			redirect('dashboard', 'refresh');
           			exit();
           		}
           		else {
           			$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view('dashboard/login', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = 'User name does not exists';

           		$this->load->view('dashboard/login', $this->data);
           	}	
        }
        else {
            // false case
            $this->session->sess_destroy();
            $this->load->view('dashboard/login');
        }	
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('consumer_auth/login', 'refresh');
	}
	
	public function reset_password()
	{
	    $this->customerauth->logged_in();

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if ($this->form_validation->run() == TRUE) {
            // true case
            $email = $this->input->post('email');
           	$username = $this->model_consumer_auth->getUserName($email);
            
           	if($username != "") {
           	    $otp = $this->input->post('otp');
           	    if($otp != "")
           	    {
           	        $otp_confirmation = $this->model_common->getOtp($email);
           	        if(!$otp_confirmation){
                        $this->session->set_flashdata('error', 'Otp is invalid or expired try using new otp');
                        redirect('index/otp', 'refresh');
                        exit;
                    }
                    if($otp == $otp_confirmation->otp)
                    {
                        
                        // Set the current time
                        $current_time = new DateTime();
                        
                        // Set the provided time
                        $provided_time = new DateTime($otp_confirmation->time); // Replace with your provided time
                        
                        // Calculate the time difference
                        $time_diff = date_diff($current_time, $provided_time);
                        
                        // Get the difference in minutes
                        $diff_in_minutes = $time_diff->i;
                        
                        // Check if the difference is less than or equal to 5 minutes
                        if ($diff_in_minutes > 5) {
                            $this->session->set_flashdata('error', 'Otp is expired please use  new one');
                            redirect('index/otp', 'refresh');
                            exit;
                        }
                        $password = substr(str_shuffle('0123456789ABCDEFGHJKLMNPQRSTUVWXYZ'),1,8);
                        $passwordEncripted = password_hash($password, PASSWORD_DEFAULT);
                        $updatePassword = $this->model_common->updatePassword($passwordEncripted,$email);
                        
                        if($updatePassword){
                            
                            $this->sendmail->welcome_email($username,$email,$password);
                            $this->data['email'] = $this->input->post('email');
               	            $this->data['success'] = 'New Password sent to your Email id';
               	            $this->load->view('dashboard/resetpassword',$this->data);
                        }
                        
                    }
                    else
                    {
                        $this->data['email'] = $this->input->post('email');
               	        $this->data['errors_otp'] = 'Invalid OTP';
               	        $this->load->view('dashboard/resetpassword',$this->data);
               	        //die();
                    }
           	    }
           	    else
           	    {
           	    
           	    
               	    $now = date('Y-m-d H:i:s');
               	    $six_digit_random_number = random_int(100000, 999999);
               	    $password = substr(str_shuffle('0123456789ABCDEFGHJKLMNPQRSTUVWXYZ'),1,8);
               	    $otpData = array(
                        'email' => $this->input->post('email'),
                        'otp' => $six_digit_random_number,
                        'time'    => $now
                    );
        
                    $insert_code = $this->model_common->addOtp($otpData);
                
                    $emailStatus = $this->sendmail->send_registration_email($username,$this->input->post('email'),$six_digit_random_number);
           	    
               	    if($emailStatus)
               	    {
               	        
               	        $this->data['email'] = $this->input->post('email');
               	        $this->data['success'] = 'Otp sent to the email ID';
               	        $this->load->view('dashboard/resetpassword',$this->data);
               	    }
               	    else
               	    {
               	        
               	        $this->data['email'] = $this->input->post('email');
               	        $this->data['errors'] = 'Please check your email';
               	        $this->load->view('dashboard/resetpassword',$this->data);
               	    }
           	    }
           		
           	}
           	else {
           	    
           	    $this->data['email']= "";
           		$this->data['errors'] = 'User name does not exists';
           		$this->load->view('dashboard/resetpassword',$this->data);
           	}	
        }
        else {
            $this->data['email'] = '';
            $this->load->view('dashboard/resetpassword',$this->data);
        }
	}
	
	
	
	
	
	
	
	

}
