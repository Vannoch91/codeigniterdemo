<?php
class Register_model extends CI_Model{
	function insertData($data)
	{
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}
}
?>