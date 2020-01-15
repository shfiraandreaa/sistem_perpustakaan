<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	
	public function openForm()
	{
		$status = $this->input->get('status');
		
		if(isset($status) == false){
			$status = "";
		}
		
		$dataStatus = array(
			'status' => $status
		);

		$this->load->view('login', $dataStatus);
		
	}
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('LoginModel');
	}
	
	public function verifikasi()
	{
		$valid = false;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->LoginModel->getDataLogin($valid, $username, $password);
		
	}
	
}

?>