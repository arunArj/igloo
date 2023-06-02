<?php 

class Model_registration extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function totalcode()
	{
		$query = $this->db->select("COUNT(*) as num")->get("unique_code");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
	public function totalCodeUsed()
	{
		$query = $this->db->select("COUNT(*) as num")->get("point_table");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
	
	
	public function mostPoints(){
	    $sql = 'SELECT u.id, u.name,u.email, SUM(p.point) AS total_points FROM consumer_record u JOIN point_table p ON u.id = p.user_id GROUP BY u.id, u.name ORDER BY total_points DESC LIMIT 5';
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
		
	public function totalPointsByUser($id){
	    $sql = 'SELECT SUM(p.point) AS total_points FROM consumer_record u JOIN point_table p ON u.id = p.user_id WHERE u.id = ? AND p.status = 1';
	    $query = $this->db->query($sql,array($id));
	    $result = $query->row();
        if(isset($result)) return $result->total_points;
        return 0;
	}

	
	public function getUsers($country)
	{
		if($country){
		    $sql = "SELECT * FROM `consumer_record` where country = ?";
		    $query = $this->db->query($sql,array($country));
		     
		}else{
		 $sql = "SELECT * FROM `consumer_record`";   
		 $query = $this->db->query($sql);	   
		}
	   return $query->result_array();
	}

    public function record_exists($conditions)
    {
        $t = $this->db->where($conditions)->count_all_results('consumer_record');
        return ($t > 0);
    }
    
    function getUserCodes($id)
    {
        $this->db->select('*');
        $this->db->from('consumer_record');
        $this->db->join('point_table', 'point_table.user_id = consumer_record.id', 'left');
         $this->db->where('consumer_record.id',$id);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>