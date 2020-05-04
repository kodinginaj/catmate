<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
				$this->load->model("UserModel");
    }

	public function index()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$this->db->select("*");
		$this->db->from("kucing");
		$data['kucing'] = $this->db->get()->result_array();

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('template/user/jumbotron_user');
		$this->load->view('user/index', $data);
		$this->load->view('template/user/footer_user');
	}

	public function mycats()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/mycats');
		$this->load->view('template/user/footer_user');
	}

	public function tambahKucing(){
			$data = $this->UserModel->tambahKucing();
	}
}
