<?php
class Model_ip_block extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
  
    public function check_list($ip){
        $this->db->where('ip',$ip);
        $query=$this->db->get('block_list');
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else{
            return false;
        }
    }
    public function create($data){
        if($data) {
			$insert = $this->db->insert('block_list', $data);
			return ($insert == true) ? true : false;
		}
        else
        return false;
    }
    public function update($data,$id){
        if($data && $id) {
            $this->db->where('id',$id);
			$update = $this->db->update('block_list', $data);
			return ($update == true) ? true : false;
		}
        else
        return false;
    }
    public function check_for_blockedip($ip){
         date_default_timezone_set('Asia/Kolkata'); 
        $now = date('Y-m-d H:i:s');
        $sql='select *
        from block_list
        where ip=? and status=1 and( time > date_sub(?, interval 30 minute)) ;';
        
        $query = $this->db->query($sql, array($ip,$now));
       
        if($query->num_rows() > 0)
        {
            return true;
        }
        else{
            return false;
        }

       // return ($result == 1) ? true : false;
    }
   
}
?>