<?php 

class Model_winner extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getWinnerDataByUser($id)
	{
		
		$sql = "SELECT * FROM `winner` WHERE user_id = ?";
		$query = $this->db->query($sql,array($id));
	    return $query->result_array();
		
	}

	    
    public function getTotalClaimedPointByUSer($id) 
	{
		if($id) {
			$sql = 'SELECT SUM(points_spend) as total FROM `winner` WHERE user_id =?';
			$query = $this->db->query($sql, array($id));
			$result = $query->row();
			return $result->total;
		}

		return false;
	}
	
	public function getWinnerCount($prize){

	    if($prize) {
			$sql = 'SELECT COUNT(id) as total FROM `winner` WHERE prize = ? ';
			$query = $this->db->query($sql, array($prize));

			$result = $query->row();
			return $result->total;
		}

		return false;
	}
	
	
	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('winner', $data);
			return ($insert == true) ? true : false;
		}
	}
	public function getAllWinners()
	{
	    $this->db->select('*');
	    $this->db->from('winner');
	    $this->db->join('consumer_record', 'winner.user_id = consumer_record.id', 'inner');
	    $query = $this->db->get();
	    return $query->result_array();
	    
// 	    $sql = "SELECT * FROM `winner` WHERE status = '1'";
// 		$query = $this->db->query($sql);
// 		return $query->result_array();
	}
	
	public function getAllWinnersByItem($item)
	{
	    $this->db->select('*');
	    $this->db->from('winner');
	    $this->db->join('consumer_record', 'winner.user_id = consumer_record.id', 'inner');
	    if($item)
	    $this->db->where('winner.prize',$item);
	    $query = $this->db->get();
	    return $query->result_array();
	    
// 	    $sql = "SELECT * FROM `winner` WHERE status = '1'";
// 		$query = $this->db->query($sql);
// 		return $query->result_array();
	}
}
?>