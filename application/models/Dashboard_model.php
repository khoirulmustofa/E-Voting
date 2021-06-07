<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all_dpt()
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        return $this->db->count_all_results();
    }

    public function get_dpt_osis($gender)
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('akses_vote_osis', 'Y');
        $this->db->where('jenis_kelamin', $gender);
        return $this->db->count_all_results();
    }

    public function get_dpt_scout($gender)
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('akses_vote_scout', 'Y');
        $this->db->where('jenis_kelamin', $gender);
        return $this->db->count_all_results();
    }

    public function get_dpt_saintek($gender)
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('akses_vote_saintek', 'Y');
        $this->db->where('jenis_kelamin', $gender);
        return $this->db->count_all_results();
    }
    

    public function get_dpt_sport($gender)
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('akses_vote_sport', 'Y');
        $this->db->where('jenis_kelamin', $gender);
        return $this->db->count_all_results();
    }
    
}
