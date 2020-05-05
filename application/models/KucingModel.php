<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KucingModel extends CI_Model
{
    public function getMyCats($id)
    {
        $this->db->select('*'); 
        $this->db->from('kucing a');
        $this->db->where('a.user_id', $id);
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }

    public function getAllCats(){
        $this->db->select('*'); 
        $this->db->from('kucing ');
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }

    public function getDetailCats($id){
        $this->db->select('*'); 
        $this->db->from('kucing a ');
        $this->db->where('a.id', $id);
        $kucing = $this->db->get();
        $data = $kucing->row_array();

        $this->db->select('*'); 
        $this->db->from('ras a ');
        $this->db->where('a.id', $data['ras_id']);
        $ras = $this->db->get()->row_array();

        $this->db->select('*'); 
        $this->db->from('user a ');
        $this->db->where('a.id', $data['id']);
        $user = $this->db->get()->row_array();
        $data['user'] = $user;
        $data['ras'] = $ras;
        return $data;
    }

    public function getKucingLainnya(){
        $this->db->select('*'); 
        $this->db->from('kucing ');
        $this->db->order_by('id','desc');
        $this->db->limit('5','0');
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }
}
