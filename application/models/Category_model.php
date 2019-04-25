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

     public function update_item($id) 
    {
        $data=array(
            'title' => $this->input->post('title'),
            'updated_at' => Date("Y-m-d H:i:s"),
            'creator_id' => $this->session->userdata['logged_in']['id']
        );
        if($id==0){
            return $this->db->insert('categories',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('categories',$data);
        }        
    }
    public function delete_item($id)
    {
        return $this->db->delete('categories', array('id' => $id));
    }
    public function insert_item()
    {    
        $data = array(
            'title' => $this->input->post('title'),
            'created_at' => Date("Y-m-d H:i:s"),
            'creator_id' => $this->session->userdata['logged_in']['id']
        );
        return $this->db->insert('categories', $data);
    }


}
?>