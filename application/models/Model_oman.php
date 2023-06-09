<?php 

class Model_oman extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
    public function codeCheck($code) 
	{
		if($code) {
		   
			$sql = 'SELECT * FROM `unique_code` WHERE code = ?';
			$query = $this->db->query($sql, array($code));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}
	public function codeRegisterd($code)
    {
        if($code) {

			$sql = 'SELECT * FROM `consumer_record_oman` WHERE code = ?';
			$query = $this->db->query($sql, array($code));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
    }
    public function addOtp($otpData)
	{
	    if($otpData) {
			$insert = $this->db->insert('otp', $otpData);
			return ($insert == true) ? true : false;
		}
	}
	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('consumer_record_oman', $data);
			return $this->db->insert_id();
		}
	}
}
?>