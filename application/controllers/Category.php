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

	
}
