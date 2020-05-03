<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('template/auth/header_auth', $data);
		$this->load->view('auth/login');
		$this->load->view('template/auth/footer_auth');
		
	}

	public function register()
	{
		$data['title'] = 'Register';
		$this->load->view('template/auth/header_auth', $data);
		$this->load->view('auth/register');
		$this->load->view('template/auth/footer_auth');
		
	}
}