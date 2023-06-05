<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		$this->load->model('model_registration');		
		$this->load->model('model_winner');		
		
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{		
 		$this->data['total_code_used'] = $this->model_registration->totalCodeUsed();
		
		$this->data['total_code'] = $this->model_registration->totalCode();
		$this->data['most_points'] =$this->model_registration->mostPoints();

		$this->render_template('dashboard/admin/dashboard', $this->data);
	}
	public function getUsers(){
	  $country =  $this->input->get('country');
	  $this->data['users'] = $this->model_registration->getUsers($country);
	  $this->render_template('dashboard/admin/users', $this->data);
    
	}
	public function userCodes(){
	    
	    $id = $this->input->get('user');
	    $this->data['totalPoints'] = $this->model_registration->totalPointsByUser($id);
        $this->data['claimedPoints'] = $this->model_winner->getTotalClaimedPointByUSer($id);
	     $this->data['userCodes'] = $this->model_registration->getUserCodes($id);
	    if(! $this->data['userCodes']){
	        $this->session->set_flashdata('error', 'user not found!!');
	        redirect('admin/dashboard/getUsers');
	        exit;
	    }
	    $this->render_template('dashboard/admin/userCodes', $this->data);
	    
	}
	public function winnersList(){
	    $data['page_title'] = 'Admin Dashbaord';
	    $item =  $this->input->get('item');
	    $data['winners'] = $this->model_winner->getAllWinnersByItem($item);
	   // echo $this->db->last_query();
	   // exit;
	    $this->render_template('dashboard/admin/winners',$data);
	}
}