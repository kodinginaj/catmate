<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  function tambahKucing(){

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

    $this->db->insert('kucing', $data);
  }
}
