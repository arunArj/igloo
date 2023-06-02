<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerAuth
{

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $this->CI->load->model('Model_common');
        
        if(empty($this->CI->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->CI->session->set_userdata($session_data);
		}
		else {
			$user_id = $this->CI->session->userdata('user_id');
		}
    }
    public function logged_in()
	{	
		
		$session_data = $this->CI->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			redirect('dashboard', 'refresh');
		}
		
	}
	public function not_logged_in()
	{
		$session_data = $this->CI->session->userdata();
		if($session_data['logged_in'] == FALSE) {
			redirect('consumer_auth/login', 'refresh');
		}
	}
    

   

    

    
    
    
}
