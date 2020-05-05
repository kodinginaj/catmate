<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function createUser($data){
        $this->db->insert('user', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    public function getDataUser($table,$email)
    {
        $data = $this->db->get_where($table, ['email' => $email])->row_array();
        return $data;
    }

    function tambahKucing($data){
        $this->db->insert('kucing', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }
}
