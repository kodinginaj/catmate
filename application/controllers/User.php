<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model("UserModel");
		$this->load->model("RasModel");
		$this->load->model("KucingModel");
    }

	public function index()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$data['kucing'] = $this->KucingModel->getAllCats();

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('template/user/jumbotron_user');
		$this->load->view('template/user/searchengine');
		$this->load->view('user/index', $data);
		$this->load->view('template/user/footer_user');
	}

	public function mycats()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$kucing = $this->KucingModel->getMyCats($this->session->userdata('id'));
		$datakucing['kucing'] = $kucing;

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/mycats',$datakucing);
		$this->load->view('template/user/footer_user');
	}


	public function tambahKucingProses(){
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('ras_id', 'Ras', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
			$this->form_validation->set_rules('biodata', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('sosial_media', 'Sosial media', 'required|trim');
			$this->form_validation->set_rules('foto', 'Foto', 'required|trim');

			$this->form_validation->set_message('required', '%s harus diisi');

			if ($this->form_validation->run() == false) {
				$this->tambahKucing();
        	} else {

				$foto = $_FILES['foto']['name'];

				$config = array();
				$config['allowed_types'] = 'jpg|png|pdf|doc';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img_kucing';

				$this->load->library('upload', $config, 'fotokucing');
				$this->fotokucing->initialize($config);
				$this->fotokucing->do_upload('foto');

				$data = [
					"user_id" => $this->input->post("user_id"),
					"ras_id" => $this->input->post("ras_id"),
					"nama" => $this->input->post("nama"),
					"jk" => $this->input->post("jk"),
					"tanggal_lahir" => $this->input->post("tanggal_lahir"),
					"foto" => '/assets/img_kucing/'.$foto,
					"biodata" => $this->input->post("biodata"),
					"sosial_media" => $this->input->post("sosial_media"),
				];

				$result = $this->UserModel->tambahKucing($data);

				if ($result) {
					$this->session->set_flashdata('message', 'Kucing berhasil ditambah');
					redirect('user/mycats');
				}else{
					$this->session->set_flashdata('message', 'Ada kesalahan');
					redirect('user/tambahKucing');
				}
			}




	}

	public  function detailkucing($id)
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$data['kucing'] = $this->KucingModel->getDetailCats($id);
		$data['kucinglainnya'] = $this->KucingModel->getKucingLainnya();

		// var_dump($data);

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/detailkucing', $data);
		$this->load->view('template/user/footer_user');
	}


	public function tambahkucing()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$dataras['ras'] = $this->RasModel->getRas();


		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/tambahkucing', $dataras);
		$this->load->view('template/user/footer_user');
	}


	public function carikucing(){
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('template/user/searchengine');
		$this->load->view('user/carikucing');
		$this->load->view('template/user/footer_user');
	}


}
