<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KucingModel extends CI_Model
{
    public function getMyCats($id)
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('kucing a');
        // $this->db->where('a.user_id', $id);
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }

    public function countCats($id){
        $query = $this->db->query('SELECT * FROM kucing');
        return $query->num_rows();
    }

    public function getRas()
    {
		$query = $this->db->query('SELECT ras.id, ras.nama, ras_id, COUNT( * ) as total FROM kucing
				JOIN ras ON ras.id = kucing.ras_id
                 GROUP BY ras_id
				');
		return $query->result_array();
    }
}
