<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

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
		$this->load->library('email');
		$this->load->model('Register_model','RegisterModel');



	}
	public function index()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			redirect('dashboard');
		}
		$this->data["title"] =" Login Form";
		$this->data["result"] = "This is the Login Form";
		$this->page = "backend/login";
		$this->layout();
	}
	public function validation()
	{
		
		

		$this->form_validation->set_rules('email','Email Address','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required');
	
		if($this->form_validation->run())
		{
		
			$email = $this->input->post('email');
			$password=md5($this->input->post('password'));
			$data=array(
					'email' => $email,
					'password'=>$password
				);
			$result=$this->RegisterModel->login($data);
			if($result==TRUE){
				$email = $this->input->post('email');
				$result = $this->RegisterModel->read_user_information($email);
				if ($result != false) {
					$session_data = array(
					'id' => $result[0]->id,
					'email' => $result[0]->email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					redirect('dashboard');
					

				
				} 
				else
				{
					$data = array(
					'error_message' => 'Invalid Username or Password'
					);
					$this->load->view('backend/login', $data);
				}
			}else{
				$this->session->set_flashdata('login_message','Email & Password is invalid! Thanks');
				$this->index();
			}
		
			
		}else
		{
			$this->index();
		}
	}

	// Logout from admin page
	public function logout() {
	// Removing session data
		$sess_array = array(
		'email' => '',
		'id' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('login/index');
	}
}
