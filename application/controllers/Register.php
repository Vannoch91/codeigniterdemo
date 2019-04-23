<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

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
	
		$this->data["title"] =" Register Form";
		$this->data["result"] = "This is the Register Form";
		$this->page = "backend/register";
		$this->layout();
	}
	public function validation()
	{
		$this->form_validation->set_rules('email','Email Address','required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm','Confirm Password','required|matches[password]');
		if($this->form_validation->run())
		{
			$verification_key = md5(rand());
			$email = $this->input->post('email');
			$password=md5($this->input->post('password'));
			$created_at=Date("Y-m-d H:i:s");
			$data=array(
					'email' => $email,
					'password'=>$password,
					'created_at' => $created_at,
					'email_confirmationcode' => $verification_key
				);
			// $id=$this->RegisterModel->insertData($data);
			$id=99;
			if($id>0)
			{
			
				$message ="This is the message to verify for user email:".$email;
				$config = array(
					'protocol' => 'ssmtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 587,
					'smtp_user' => 'v.vannochit@gmail.com',
					'smtp_pass' => 'vannoch093789150',
					'wordwrap' => true
					);

				// $this->load->library('email',$config);
				$this->email->initialize($config);
				$this->email->from('info@bongnoch.com','sender_name');
				$this->email->to($email);
				$this->email->subject("Verify email to login");
				$this->email->message($message);
				$this->email->send();
				var_dump($this->email);
				
				// if($this->email->send())
				// {	
						
				// 	$this->session->set_flashdata('message','pls check your email inbox');
				// 	redirect('register');
				// }
			}
		}else
		{
			$this->index();
		}
	}
}
