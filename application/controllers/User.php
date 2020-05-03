<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$this->load->view('template/header_user', $data);
		$this->load->view('template/menu_user');
		$this->load->view('template/jumbotron_user');
		$this->load->view('user/index');
		$this->load->view('template/footer_user');
	}
}