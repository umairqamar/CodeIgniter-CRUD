<?php
class Users_model extends CI_Model {
	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}
	
	public function insert($data){
		$this->db->insert("users",$data);
	}
	public function update($user_id,$data){
		$this->db->where('user_id', $user_id);
		$this->db->update("users",$data);
	}
	
	public function get_users(){
		return $this->db->get('users');
	
	}
	
	public function auth_user($data){
		$this->db->select('user_id,email');
		return $this->db->get_where('users',$data,1);
	} 
	
	function get_singal_user($user_id){
		$this->db->select("*");
		$this->db->where("user_id",$user_id);
		$this->db->from("users");
		$this->db->limit(1);
		$user = $this->db->get()->result();
		
		return $user = $user[0];
		
		
	}
}

?>