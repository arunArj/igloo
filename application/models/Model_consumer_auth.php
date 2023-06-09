<?php 

class Model_consumer_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('customHashing');
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_username($email) 
	{
	  
		if($email) {
		    $hashkey = $this->customhashing->hashData($email);
			$sql = 'SELECT * FROM `consumer_record` WHERE hash_key = ?';
			$query = $this->db->query($sql, array($hashkey));
			$result = $query->num_rows();

			return ($result == 1) ? true : false;
		}

		return false;
	}
	public function getUserName($email) 
	{
	   
		if($email) {
		     $hashkey = $this->customhashing->hashData($email);
			$sql = 'SELECT * FROM `consumer_record` WHERE hash_key = ?';
			$query = $this->db->query($sql, array($hashkey));
			if($query->num_rows() == 1)
			{
			    $result = $query->row_array();
			    return $result['name'];
			}
			else{
			    $result['name'] = "";
			    return $result['name'];
			}
			
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function login($email, $password) {
	    
		if($email && $password) {
		  
		    $hashkey = $this->customhashing->hashData($email);

			$sql = "SELECT * FROM `consumer_record` WHERE hash_key = ?";
			$query = $this->db->query($sql, array($hashkey));
			if($query->num_rows() == 1) {
				$result = $query->row_array();

				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}

				
			}
			else {
				return false;
			}
		}
	}
}