<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Category_model','CategoryModel');
		$this->checkAuth();


	}
	public function index()
	{
		
		$this->data["title"] =" Category Form";
		$this->data["result"] = $this->CategoryModel->listdata();
		$this->page = "backend/category/index";
		$this->layout();
	}
	public function show($id)
   {
      	$this->data["result"] = $this->CategoryModel->find_item($id);
		$this->page = "backend/category/show";
		$this->layout();
   }

     /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       	$this->data["result"] = $this->CategoryModel->find_item($id);
		$this->page = "backend/category/edit";
		$this->layout();
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id)
   {
        $this->form_validation->set_rules('title', 'Title', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('category/edit/'.$id));
        }else{ 
          $this->CategoryModel->update_item($id);
           $this->session->set_flashdata('updated', 'Updated Successfully...');
          redirect(base_url('category'));
        }
   }

     public function create()
   {
     $this->page = "backend/category/create";
	$this->layout();
   }


     public function store()
   {
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('category/create'));
        }else{
           $this->CategoryModel->insert_item();
           redirect(base_url('category'));
        }
    }

     /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       // $item = $this->CategoryModel->delete_item($id);
       $this->session->set_flashdata('updated', 'Deleted Successfully...');
       // redirect(base_url('category'));
       $arr=array(
       		"status" => true,
       		"msg" => "Deleted Successfully...",
       		"alert_type" => "alert alert-success"
       	);
       echo json_encode($arr);
   }

	
}
