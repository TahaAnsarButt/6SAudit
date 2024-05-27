<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel', 'L');
	}
	public function index()
	{
		
		$this->load->view('index');
	}

	public function authenticate()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->L->login($username, $password);

	}


}
