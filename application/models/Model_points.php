<?php 

class Model_points extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
  
	public function update($code,$data)
	{

		$this->db->where('code',$code);
		$update = $this->db->update('point_table', $data);
		return ($update == true) ? true : false;
		
	}
	public function pointAddedCheck($code)
    {

        if($code) {
			$sql = 'SELECT * FROM `point_table` WHERE code = ? and status = 1';
			$query = $this->db->query($sql, array($code));

			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
    }
    
    public function getPointByUSer($id) 
	{

		if($id) {
			$sql = 'SELECT * FROM `point_table` WHERE user_id = ?';
			$query = $this->db->query($sql, array($id));
			$result = $query->result_array();
			return $result;
		}

		return false;
	}
	    
    public function getTotalPointByUSer($id) 
	{

		if($id) {
			$sql = 'SELECT SUM(point) as total FROM `point_table` WHERE user_id =? and status = 1';
			$query = $this->db->query($sql, array($id));
			$result = $query->row();
			return $result->total;
		}

		return false;
	}
	public function getPointByCodeandUser($id,$code) 
	{

		if($id) {
			$sql = 'SELECT * FROM `point_table` WHERE user_id =? and code = ? and status = 0';
			$query = $this->db->query($sql, array($id,$code));
		//	$result = $query->row();
			 return $query->row();
		}

		return false;
	}
}