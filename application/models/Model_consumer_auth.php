<?php 

class Model_consumer_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_username($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM `consumer_record` WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}
	public function getUserName($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM `consumer_record` WHERE email = ?';
			$query = $this->db->query($sql, array($email));
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
			$sql = "SELECT * FROM `consumer_record` WHERE email = ?";
			$query = $this->db->query($sql, array($email));
            // echo $password;
            // exit();
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