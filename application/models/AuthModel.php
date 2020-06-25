<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class AuthModel extends CI_Model 
{

    private $_table = 'admin';
    // function check user
    public function check_user($username)
    {
        $result = $this->db->get_where($this->_table, ['username' => $username]);
        return $result->row_array();
    }

    // func untuk check users atau peserta
    public function check_users($email)
    {
        $result = $this->db->get_where('member', ['email' => $email]);
        return $result->row_array();
    }

    // func insert data register
    public function insertData($data)
    {
        $this->db->insert('member', $data);
    }
}