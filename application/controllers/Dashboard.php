<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->library('CustomerAuth');
        $this->customerauth->not_logged_in();
        $this->load->library('sendMail');
        $this->load->model(['model_points','model_ip_block','model_common','model_winner']);	
    
	}
	public function index()
	{
	        $id = $this->session->userdata('user_id');
    	    $data['total_point'] =  $this->model_points->getTotalPointByUSer($id);
    	    $data['points'] = $this->model_points->getPointByUSer($id);
	        return $this->load->view('dashboard/user/redeem_code',$data);
	}
	public function store()
	{
	     $this->form_validation->set_rules('code', 'Code', 'trim|required');
	     $id = $this->session->userdata('user_id');

        if ($this->form_validation->run() == TRUE) {
             $ip = $this->input->ip_address();
            
            //get current time
            date_default_timezone_set('Asia/Kolkata');
            $now = date('Y-m-d H:i:s');
            $check=$this->model_ip_block->check_for_blockedip($ip);
            
            if($check== true){
                $this->session->set_flashdata('error', 'Too many failed attempts occured !! please try after sometime');
                redirect('dashboard', 'refresh');
                exit;
            }
            $code = $this->input->post('code');
            $codeCheck = $this->model_common->codeCheck($code);
            
            if(!$codeCheck){
                $this->block_ip($ip);        
                $this->session->set_flashdata('error', 'Invalid Code');
                redirect('dashboard', 'refresh');
                exit;
            }
            $codeReg = $this->model_common->codeRegisterd($code);
            if($codeReg){
                $this->session->set_flashdata('error', 'code is already registered');
                redirect('dashboard', 'refresh');
                exit;
            }
            $point = $this->model_common->getPoint($code);
            if(!$point){
                $this->session->set_flashdata('error', 'points not found for this code please try again!');
                redirect('dashboard', 'refresh');
                exit;

            }
            $agent = 'Desktop';
            if ($this->agent->is_mobile())
            {
                $agent = $this->agent->mobile();
            }
            $point_data = array(
                'user_id' => $id,
                'code' => $code,
                'point' => $point,
                'ip' =>$ip,
                'device' => $agent,
            
            );
            $point = $this->model_common->add_point($point_data);
            $this->model_common->update_uniqueCode(array('status'=>1),$code);
            if(!$point){
                $this->session->set_flashdata('error', 'Unexpected error occured please try again');
                redirect('dashboard', 'refresh');
                exit;
            }
            $this->session->set_flashdata('success', 'Code successfully added claim your points from below!!');
            redirect('dashboard', 'refresh');
            exit;
        }
        $data['total_point'] =  $this->model_points->getTotalPointByUSer($id);
        $data['points'] = $this->model_points->getPointByUSer($id);
         //return redirect('dashboard','refresh');
	    return $this->load->view('dashboard/user/redeem_code',$data);
	}
    
    public function profile(){
        $id = $this->session->userdata('user_id');
       
        $data['profile'] = $this->model_common->get_consumer($id);

        return $this->load->view('dashboard/user/profile',$data);
    }
    
    public function update_profile(){
        
        $id = $this->session->userdata('user_id');
         $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|trim');
         $this->form_validation->set_error_delimiters('<div class="validation-error">', '</div>');
        if ($this->form_validation->run() == TRUE) {
           $profile = $this->model_common->updateUser($id,array('password'=> password_hash($this->input->post('password'), PASSWORD_BCRYPT)));
            if($profile){
                $this->session->set_flashdata('success', 'Password updated successfully!!');
            }
        else{ 
            $this->session->set_flashdata('error', 'failed to update password please try again!!');
        }
           
        }
        $data['profile'] = $this->model_common->get_consumer($id);
        return $this->load->view('dashboard/user/profile',$data);
    }
    
    public function redeemItem(){
        $id = $this->session->userdata('user_id');
        $data['winner'] = $this->model_winner->getWinnerDataByUser($id);

        return $this->load->view('dashboard/user/prize',$data);
    }
    public function redeemPrize(){
        
        $id = $this->session->userdata('user_id');
        echo $id;
        exit();
        $consumer = $this->model_common->get_consumer($id);
        if(!$consumer){
            $this->session->set_flashdata('error', 'user details not found!!');
            redirect('/dashboard/redeemItem','refresh');
            exit;
        }
        $totalPoints = $this->model_points->getTotalPointByUSer($id);
        $usedpoints = $this->model_winner->getTotalClaimedPointByUSer($id);

        $balancePoints =  $totalPoints -  $usedpoints;

        $prize = $this->input->get('prize');
        switch($prize){
            case 'iphone':
                $requiredPoints = 5000;
                $p='1';
                $lim =25;
               $image = 'assets/frontend/dashboard/images/iphone-single.png';
                break;
            case 'playstation':
                $requiredPoints = 2000;
                $p='2';
                $lim =50;
                $image = 'assets/frontend/dashboard/images/playstation-single.png';
                break;
            case 'airpods':
                $requiredPoints = 1000;
                $p='3';
                $lim =100;
                $image = 'assets/frontend/dashboard/images/airpod-single.png';
                break;
            default :
                $requiredPoints = null;
        }
        if(!$requiredPoints){
            $this->session->set_flashdata('error', 'Item not found!!');
            redirect('/dashboard/redeemItem','refresh');
            exit;
        }

        if($balancePoints<$requiredPoints){
            $this->session->set_flashdata('error', 'Not enough points available!!');
            redirect('/dashboard/redeemItem');
            exit;
        }
        $winnerCount = $this->model_winner->getWinnerCount($p);

        if($winnerCount<$lim){
            $data = $this->model_winner->create(array('user_id'=>$id,'prize'=>$p,'points_spend'=>$requiredPoints));
            if($data){
                $this->session->set_flashdata('success', 'Congragualtions you successfully applied for the prize!!');
                $this->sendmail->prizeclaim($consumer->name,$consumer->email,$image,$prize);
                redirect('/dashboard/redeemItem');
                exit;
            }
        }else{
           $this->session->set_flashdata('error', 'maximum limit reached!!');
           redirect('/dashboard/redeemItem'); 
           exit;
        }
        $this->session->set_flashdata('error', 'Unexpected error occured please try again!!');
        redirect('/dashboard/redeemItem');
    }

    public function scratchcard(){
  
        $id = $this->session->userdata('user_id');
        $code = $this->input->get('code');
        $data['point']=$this->model_points->getPointByCodeandUser($id,$code);
      
        $this->load->view('dashboard/user/scratchcard',$data);
    }
    
    public function claimPrize(){
        $id = $this->session->userdata('user_id');
        $code = $this->input->post('code');
        $pointCheck = $this->model_points->getPointByCodeandUser($id,$code);

        if(!$pointCheck){
            $this->session->set_flashdata('error', 'Code doesnt exist!!');
            redirect('dashboard');
            exit;
        }
        $status =$data['point']=$this->model_points->update($code,array('status'=>1));
        if($status){
            $this->session->set_flashdata('success', 'Points successfully redeemed!!');
            redirect('dashboard/');
            exit;
        }
        $this->session->set_flashdata('error', 'unexpected error occured try again!!');
        redirect('dashboard/scratchcard?code='.$code);
    }
    
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
	
	
    
}