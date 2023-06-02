<?php 

class Model_common extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
    public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('consumer_record', $data);
			return $this->db->insert_id();
		}
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
			$sql = 'SELECT * FROM `point_table` WHERE code = ?';
			$query = $this->db->query($sql, array($code));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
    }
    public function add_point($data)
    {
        if($data) {
			$insert = $this->db->insert('point_table', $data);
			return ($insert == true) ? true : false;
		}
    }
    public function getPoint($code) 
	{
		if($code) {
			$sql = 'SELECT `point` FROM `unique_code` WHERE code = ?';
			$query = $this->db->query($sql, array($code));
			$result = $query->row();
			return $result->point;
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
	
	public function getOtp($email) 
	{
		if($email) {
			$sql = "SELECT * FROM otp WHERE email = ? order by id desc limit 1";
			$query = $this->db->query($sql, array($email));
		   return $query->row();
		
		}

		return false;
	}
	
    public function update_uniqueCode($data,$code)
    {
        if($data) {
            $this->db->where('code',$code);
			$update = $this->db->update('unique_code', $data);
			return ($update == true) ? true : false;
		}
    }
    public function removeOtp($email)
    {
        if($email) {
            $this->db->where('email',$email);
			$update = $this->db->delete('otp');
			return ($update == true) ? true : false;
		}
    }
    public function get_consumer($consumer_id)
    {
        $this->db->where('id', $consumer_id);
        $query = $this->db->get('consumer_record');
        return $query->row();
    }
        public function updateUser($consumer_id,$data)
    {
        $this->db->where('id', $consumer_id);
      	$update = $this->db->update('consumer_record', $data);
		return ($update == true) ? true : false;
    }
    public function updatePassword($password,$email)
    {
        $this->db->where('email', $email);
      	$update = $this->db->update('consumer_record', array('password'=>$password));
		return ($update == true) ? true : false;
    }
}
?>