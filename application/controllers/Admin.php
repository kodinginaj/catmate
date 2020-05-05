<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$data['title'] = 'Dashboard';
    	$this->load->view('template/admin/header_admin', $data);
        $this->load->view('template/admin/sidebar_admin', $data);
        $this->load->view('template/admin/topbar_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/admin/footer_admin');
    }

    public function ras(){
        $data['title'] = 'Ras';
        $this->load->view('template/admin/header_admin', $data);
        $this->load->view('template/admin/sidebar_admin', $data);
        $this->load->view('template/admin/topbar_admin', $data);
        $this->load->view('admin/ras', $data);
        $this->load->view('template/admin/footer_admin');
    }

}