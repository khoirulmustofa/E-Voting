<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_pengguna_by_username($username)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query;
    }    
}
