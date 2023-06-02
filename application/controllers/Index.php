<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->library('SendMail');
        $this->load->helper('string');
        $this->load->model(['model_common','model_ip_block','model_winner']);	
    
	}
	public function index()
	{
	   $this->load->view('frontend/home');
	}
	public function registration()
	{
	   $this->load->view('frontend/registration');
	}
	public function registration_submit($id)
	{
	    $this->session->unset_userdata('error');
        $this->session->unset_userdata('success'); 
        $ip = $this->input->ip_address();

        //get current time
        date_default_timezone_set('Asia/Kolkata');
        $now = date('Y-m-d H:i:s');

        //check for block
        $check=$this->model_ip_block->check_for_blockedip($ip);
        if($check== true){
			$this->session->set_flashdata('error', 'Too many failed attempts occured !! please try after sometime');
                redirect('index/registration', 'refresh');
		}
        $code = $this->input->post('code');
        // validate code      
        $codeCheck = $this->model_common->codeCheck($code);
        if ($codeCheck == true) {
           // check code alreay registerd
           $codeRegisterd = $this->model_common->codeRegisterd($code);
           if ($codeRegisterd == true) 
           {
                $this->block_ip($ip);
                $this->session->set_flashdata('error', 'This code already registerd');
                redirect('index/registration', 'refresh');               
           }
           else
           {
             $code_point = $this->model_common->getPoint($code);
             
           }
        }
        else
        {   
            $this->block_ip($ip);        
            $this->session->set_flashdata('error', 'Invalid Code');
            redirect('index/registration', 'refresh');           
        }

        $this->form_validation->set_rules('code', 'Code', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('national_id', 'National ID Number', 'trim|required');
		$this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[consumer_record.email]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already have an account'
        ));
        
       

        $this->form_validation->set_error_delimiters('<div class="server-error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
        
        
        //validation of form
        if ($this->form_validation->run() == TRUE) {

            $language = $this->uri->segment(3);
            
            //get device
            if ($this->agent->is_mobile())
            {
                    $agent = $this->agent->mobile();
            }
            else
            {
                    $agent = 'Desktop';
            }

        //push to session 
            $data = array(
                'name' => $this->input->post('name'),
                'country' => $this->input->post('country'),
                'national_id' => $this->input->post('national_id'),
                'mobile' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'language' => $language,
                'code' => $code,
                'point' => $code_point,
                'ip' => $ip,
                'device' => $agent,
            );
            
            
            $this->session->set_userdata($data);
            
            //generate and sent otp
            $six_digit_random_number = random_int(100000, 999999);
            $otpData = array(
                'email' => $this->input->post('email'),
                'otp' => $six_digit_random_number,
                'time'    => $now
            );
        
            $insert_code = $this->model_common->addOtp($otpData);
            
            $emailStatus = $this->sendmail->send_registration_email($data['name'],$data['email'],$six_digit_random_number);
            
            //redirect on success
            if($emailStatus == TRUE)
            {
                if($language == 'en')
                {
                    redirect('index/otp', 'refresh');
                }
                else{
                    redirect('index/otp', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Please check your Email and try again later');
                redirect('index/registration', 'refresh');
            }
        	
          
        }
        else
        {           
            $this->load->view('frontend/registration');
        }
	}
	public function otp()
	{
	    $this->load->view('frontend/otp');
	}
	public function verify_otp()
	{
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $otp = $this->input->post('otp');
            $email = $this->session->userdata('email');
            $name = $this->session->userdata('name');
            
            $otp_confirmation = $this->model_common->getOtp($email);
            if(!$otp_confirmation){
                $this->session->set_flashdata('error', 'Otp is invalid or expired try using new otp');
                redirect('index/otp', 'refresh');
                exit;
            }
            if($otp == $otp_confirmation->otp){
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
                //generate user passord
                $password = substr(str_shuffle('0123456789ABCDEFGHJKLMNPQRSTUVWXYZ'),1,8);
                //$passwordEncripted = password_hash($password, PASSWORD_DEFAULT);
                
                $insertStatus = $this->insertUSer($password);
                
                if($insertStatus){
                    
                    $this->sendmail->welcome_email($name,$email,$password);
                    redirect('scratchcard/index', 'refresh');
                    exit;  
                }
                $this->session->set_flashdata('error', 'internal server error occured please try again');
                redirect('index/otp', 'refresh');
                exit;
            }
            
            $this->session->set_flashdata('error', 'Otp is invalid');
            redirect('index/otp', 'refresh');
            exit;
            
        }
        $this->load->view('frontend/otp');
    }
    private function insertUSer($password){
    
        $language = $this->uri->segment(3);
        if ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Desktop';
        }
            $data = array(
                'name' => $this->session->userdata('name'),
                'country' =>$this->session->userdata('country'),
                'national_id' => $this->session->userdata('national_id'),
                'mobile' =>$this->session->userdata('mobile'),
                'email' => $this->session->userdata('email'),
                'language' =>$this->session->userdata('language'),
                'password' =>password_hash($password, PASSWORD_DEFAULT),
            );
        $this->db->trans_begin();
        $user = $this->model_common->create($data);
        $point_data = array(
            'user_id' => $user,
            'code' => $this->session->userdata('code'),
            'point' => $this->session->userdata('point'),
            'ip' =>$this->input->ip_address(),
            'device' => $agent,
        
            );
         $point = $this->model_common->add_point($point_data);
         $code = $this->model_common->update_uniqueCode(array('status'=>1),$point_data['code']);
         $otp = $this->model_common->removeOtp($data['email']);
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }
        else
        {
                $this->db->trans_commit();
                return true;
        }
         return true;
    }
    
    public function thankyou()
    {
        $this->load->view('frontend/thankyou');
    }
    
    public function test()
    {
        $this->sendmail->welcome_email($name,$email,$password);
        echo $password;
        
    }
    
    
    
    
    
	public function check_code()
    {             

        $code = $this->input->post('code');
        
        $response = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        date_default_timezone_set('Asia/Kolkata'); 
        $now = date('Y-m-d H:i:s');
        $ip = $this->input->ip_address();
        $check=$this->model_ip_block->check_for_blockedip($ip);
        // echo $this->db->last_query();
        // exit;
        if($check== true){		
            $response['success'] = false;
            $response['messages'] = 'Too many failed attempts occured !! please try after sometime';
            $response['messages_ar'] = 'تمت محاولات فاشلة كثيرة!! حاول مرة أخرى بعد مرور بعض الوقت';
            echo json_encode($response);
            exit();
		}  

        // validate code
        $codeCheck = $this->model_common->codeCheck($code);
        // echo $this->db->last_query();
        // echo $codeCheck;
        // exit();
        if ($codeCheck == true) {
           // check code alreay registerd
           $codeRegisterd = $this->model_common->codeRegisterd($code);
           if ($codeRegisterd == true) 
           {
                $this->block_ip($ip);
                $response['success'] = false;
                $response['messages'] = 'This code already registerd';
                $response['messages_ar'] = 'الرمز مسجل مسبقاً';               
           }
           else
           {
                
                $response['success'] = true;
                $response['messages'] = 'Valid Code';
                $response['messages_ar'] = 'كود صالح';
           }           
        }
        else
        {   
            $this->block_ip($ip);       
            $response['success'] = false;
        	$response['messages'] = 'Invalid Code..';
            $response['messages_ar'] = 'الرمز غير صحيح';           
        }
        echo json_encode($response);
    }
    
    
    
    public function winners()
    {
        
        $data['winner'] = $this->model_winner->getAllWinners();
        // echo "<pre>";
        // echo $this->db->last_query();
        // print_r($data['winner']);
        // exit();
        $this->load->view('frontend/winners',$data);
    }
/*********************IP blocking section************************* */
    
    private function block_ip($ip)
    {    
        date_default_timezone_set('Asia/Kolkata'); 
        $now = date('Y-m-d H:i:s');
        $data=$this->model_ip_block->check_list($ip);
        
       
        $now = date('Y-m-d H:i:s');
        
        if($data === false){
           
            $this->model_ip_block->create(array('ip'=>$ip,'status'=>0,'time'=>$now,'count'=>1,'total_attempt'=>1));
           
        }
        else
        {
            if($data['count']>=4){
                $arry=array('status'=>1,'time'=>$now,'count'=>0,'total_attempt'=>++$data['total_attempt']);
            }
            else
            {
                $now = date('Y-m-d H:i:s');
                // Declare and define two dates 
                $date1 = strtotime($data['time']);  
                $date2 = strtotime($now);  
            
                // Formulate the Difference between two dates 
                $diff = abs($date2 - $date1); 
                if($diff>1800 && $data['status']==1)
                {
                   
                    $arry=array('status'=>0,'time'=>$now,'count'=>++$data['count'],'total_attempt'=>++$data['total_attempt']);
                }
                else
                {
                    $arry=array('time'=>$now,'count'=>++$data['count'],'total_attempt'=>++$data['total_attempt']);
                }             
      
            }
            $this->model_ip_block->update($arry,$data['id']);
        }
    }

/********************* END OF IP BLOCK *******************************/ 
 
    public function resendOtp(){
       $email = $this->session->userdata('email');
        $name = $this->session->userdata('name');
       $six_digit_random_number = random_int(100000, 999999);

       if(!$email){
        $this->session->set_flashdata('error', 'cant find the email id please fill the form once again!');   
        return redirect('index/otp');
        exit;
       }
       $this->session->set_userdata('otp',$six_digit_random_number);
       $status = $this->sendmail->send_registration_email($name,$email,$six_digit_random_number);
       if(!$status){
        $this->session->set_flashdata('error', 'failed to sent mail please try again!');   
        return redirect('index/otp');
        exit;
       }
         $this->session->set_flashdata('success', 'otp is sent to your email');   
        $this->session->set_userdata('timer', date('Y-m-d H:i:s'));
        return redirect('index/otp');
    }
}