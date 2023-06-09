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
        $this->load->library('CustomHashing');
        $this->load->library('encryption');
        $this->load->model(['model_common','model_ip_block']);	
		$this->load->model('model_consumer_auth');
		$this->load->helper('security');
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
        $redirect='dashboard/login';
        
        if ($this->form_validation->run()) {
            // true case
            $email = $this->security->xss_clean( $this->input->post('email'));
            $password = $this->security->xss_clean( $this->input->post('password'));
           	$username_exists = $this->model_consumer_auth->check_username();
           	
           	if($username_exists ) {
           		$login = $this->model_consumer_auth->login($email, $password);
              
           		if($login) {
           			$logged_in_sess = array(
           				'user_id' => $login['id'],
				        'email'     => $login['email'],
				        'logged_in' => TRUE
					);
                    
					$this->session->set_userdata($logged_in_sess);
	
           			redirect('dashboard', 'refresh');
           			exit();
           		}
           	
           		else {
           			$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view( $redirect, $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = 'User name does not exists';

           		$this->load->view( $redirect, $this->data);
           	}	
        }
        else {

            $this->session->sess_destroy();
            $this->load->view($redirect);
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
        $redirect_url = 'dashboard/resetpassword';
        if ($this->form_validation->run()) {
            // true case
            $email = $this->security->xss_clean( $this->input->post('email'));
           	$username = $this->model_consumer_auth->getUserName($email);
         
           	if($username =="") {
           	           	    
           	    $this->data['email']= "";
           		$this->data['errors'] = 'User name does not exists';
           		$this->load->view('dashboard/resetpassword',$this->data);
           		exit;
           	}
           	    $username  = $this->encryption->decrypt($username);
           	    $otp = $this->security->xss_clean($this->input->post('otp'));
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
                        $provided_time = new DateTime($otp_confirmation->time);
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
                            $this->data['email'] = $email;
               	            $this->data['success'] = 'New Password sent to your Email id';
               	            $this->load->view( $redirect_url,$this->data);
                        }
                        
                    }
                    else
                    {
                        $this->data['email'] = $email;
               	        $this->data['errors_otp'] = 'Invalid OTP';
               	        $this->load->view( $redirect_url,$this->data);
       
                    }
           	    }
           	    else
           	    {
           	    
           	    
               	    $now = date('Y-m-d H:i:s');
               	    $six_digit_random_number = random_int(100000, 999999);
               	    $otpData = array(
                        'email' =>$this->customhashing->hashData($email),
                        'otp' => $six_digit_random_number,
                        'time'    => $now
                    );
        
                    $this->model_common->addOtp($otpData);
                
                    $emailStatus = $this->sendmail->send_registration_email($username,$email,$six_digit_random_number);
           	       $this->data['email'] =$email;
               	    if($emailStatus)
               	    {
               	        
               	     
               	        $this->data['success'] = 'Otp sent to the email ID';
               	        $this->load->view( $redirect_url,$this->data);
               	    }
               	    else
               	    {
               	        $this->data['errors'] = 'Please check your email';
               	        $this->load->view( $redirect_url,$this->data);
               	    }
           	    }

        }
        else {
            $this->data['email'] = '';
            $this->load->view( $redirect_url,$this->data);
        }
	}

}
