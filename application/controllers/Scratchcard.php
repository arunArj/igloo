<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scratchcard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->model(['model_points']);
        $this->load->library('SendMail');
        $this->load->helper('security');
	}
	public function index()
	{
	   $data['point'] = $this->session->userdata('point');
	   //$data['point'] = 100;
	    $code = $this->session->userdata('code');
	    $data['code'] = $code;
	   
	    $data['checkPointAdded']  = $this->model_points->pointAddedCheck($code);
	   
	    if($data['point'] == NULL)
	    {
	        return redirect('/');
	    }
	    else
	    {
	        $this->load->view('frontend/scratchcard',$data);
	    }
	 
	   
	}
	public function registration()
	{
	    $code = $this->session->userdata('code');
	    $point = $this->session->userdata('point');
	    $cardPoint = $this->input->post('cardPoint');
	    $email =$this->session->userdata('email');
	    
	    //check the point is already added
	    $checkPoint = $this->model_points->pointAddedCheck($code);
	    
        if ($checkPoint == true){
            
            $this->session->set_flashdata('error', 'The Point is already added');
            redirect('scratchcard/index', 'refresh'); 
        }
	    else{
	        
            $data = array(
    	        'status' => 1
    	    );
    	    
    	    $status =  $this->model_points->update($code,$data);
    	    if($status == true)
    	    {
    	        $this->sendmail->success_email($email,$point);
                return redirect('index/thankyou');
    	    }
	   
	        return redirect('index/thankyou');
	    }
	}
    
}