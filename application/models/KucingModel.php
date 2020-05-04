<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KucingModel extends CI_Model
{
    public function getMyCats($id)
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('kucing a');
        $this->db->where('a.user_id', $id);
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }
}
