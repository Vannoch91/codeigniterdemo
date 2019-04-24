<?php
class Category_model extends CI_Model{
	function insertData($data)
	{
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}
	

	// Read data from database to show data in admin page
	public function listdata() {

		 if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }
        $query = $this->db->get("categories");
        return $query->result();
	}
	 public function find_item($id)
    {
        return $this->db->get_where('categories', array('id' => $id))->row();
    }


}
?>