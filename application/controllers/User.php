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

	public function profile(){
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/profile', $data);
		$this->load->view('template/user/footer_user');
	}

	public function mycats()
	{
		if ($this->session->userdata('role') == "admin" || $this->session->userdata('role') == "") {
            redirect('user');
        }

		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$kucing = $this->KucingModel->getMyCats($this->session->userdata('id'));
		$datakucing['kucing'] = $kucing;

		$ras = $this->KucingModel->getRas();
		$datakucing['ras'] = $ras;

		$count = $this->KucingModel->countCats($this->session->userdata('id'));
		$datakucing['count'] = $count;

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/mycats',$datakucing);
		$this->load->view('template/user/footer_user');
	}


	public function getKategori()
	{
		$this->db->select("*");
		$this->db->from("kucing");
		$this->db->where("ras_id", $this->input->post('id'));
		$query = $this->db->get();
		$result = $query->result_array();

		echo json_encode($result);
	}

		public function getKategoriAll()
	{
		$this->db->select("*");
		$this->db->from("kucing");
		$query = $this->db->get();
		$result = $query->result_array();

		echo json_encode($result);
	}


	public function tambahKucingProses(){
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('ras_id', 'Ras', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
			$this->form_validation->set_rules('biodata', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('sosial_media', 'Sosial media', 'required|trim');
			
			if (empty($_FILES['foto']['name'])) {
				$this->form_validation->set_rules('foto', 'Foto', 'required|trim');
			}

			$this->form_validation->set_message('required', '%s harus diisi');

			if ($this->form_validation->run() == false) {
				$this->tambahKucing();
        	} else {

				$foto = $_FILES['foto']['name'];

				$belah = explode('.',$foto);
				$ekstensi = strtolower(end($belah));
				
				$namaBaru = $this->session->userdata('id');
				$namaBaru .= $belah[0];
				$namaBaruDB = $namaBaru.".".$ekstensi;
		
				$config['file_name'] = $namaBaru;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img_kucing/';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message',$error['error']);
					// $this->session->set_flashdata('message', 'Foto tidak bisa berhasil disimpan');
					redirect('user/tambahKucing');
					// $this->load->view('upload_form', $error);
				}
				else{
					
					$data = [
						"user_id" => $this->input->post("user_id"),
						"ras_id" => $this->input->post("ras_id"),
						"nama" => $this->input->post("nama"),
						"jk" => $this->input->post("jk"),
						"tanggal_lahir" => $this->input->post("tanggal_lahir"),
						"foto" => '/assets/img_kucing/'.$namaBaruDB,
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




	}

	public function ubahKucingProses(){
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('ras_id', 'Ras', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
			$this->form_validation->set_rules('biodata', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('sosial_media', 'Sosial media', 'required|trim');

			$this->form_validation->set_message('required', '%s harus diisi');

			if ($this->form_validation->run() == false) {
				$this->ubahKucing();
        	} else {

        		if (empty($_FILES['foto']['name'])){
					$foto = $this->input->post("old_foto");
        		}else{

        		unlink(FCPATH . $this->input->post("old_foto"));
				$fotoo = $_FILES['foto']['name'];
				$foto = "assets/img_kucing/".$fotoo;

				$config = array();
				$config['allowed_types'] = 'jpg|png|pdf|doc';
				$config['max_size'] = '2048';
				$config['upload_path'] = 'assets/img_kucing';

				$this->load->library('upload', $config, 'fotokucing');
				$this->fotokucing->initialize($config);
				$this->fotokucing->do_upload('foto');
				}

				$data = [
					"ras_id" => $this->input->post("ras_id"),
					"nama" => $this->input->post("nama"),
					"jk" => $this->input->post("jk"),
					"tanggal_lahir" => $this->input->post("tanggal_lahir"),
					"foto" => $foto,
					"biodata" => $this->input->post("biodata"),
					"sosial_media" => $this->input->post("sosial_media"),
				];

				$id = $this->input->post("id_kucing");
				$result = $this->UserModel->ubahKucing($data,$id);

				if ($result) {
					$this->session->set_flashdata('message', 'Kucing berhasil diubah');
					redirect('user/mycats');
				}else{
					$this->session->set_flashdata('message', 'Ada kesalahan');
					redirect('user/ubahKucing');
				}
			}




	}

	public  function detailkucing()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$id = $this->input->get('id');
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
		$data['ras'] = $this->RasModel->getRas();


		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/tambahkucing', $data);
		$this->load->view('template/user/footer_user');
	}

	public function ubahKucing()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$data['ras'] = $this->RasModel->getRas();

		$id = $this->input->get("id");

		$this->db->select("*");
		$this->db->from("kucing");
		$this->db->where('id',$id);
		$data['kucing'] = $this->db->get()->row_array();


		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/ubahKucing', $data);
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
