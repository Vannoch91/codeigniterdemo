<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct() {
		parent::__construct();
	}
	 
	function index()
	{
		$this->data["title"] = "Dashboard Screen";
		$this->data["result"] = " Here is the result";
		$this->page = "backend/templates/dashboard";
		$this->layout();

	}
}
