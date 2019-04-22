<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	protected $data = array();
	public function layout() {
		$this->template['header'] = $this->load->view('backend/templates/header',$this->data,TRUE);
		$this->template['footer'] = $this->load->view('backend/templates/footer',$this->data,TRUE);
		$this->template['sidebar'] = $this->load->view('backend/templates/sidebar',$this->data,TRUE);
		$this->template['page'] = $this->load->view($this->page,$this->data,TRUE);
		$this->load->view($this->page,$this->template);
	}

}