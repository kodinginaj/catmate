<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RasModel extends CI_Model
{
    public function getRas()
    {
        $data = $this->db->get_where('ras')->result_array();
        return $data;
    }
}
