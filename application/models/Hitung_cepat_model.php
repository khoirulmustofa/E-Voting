<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hitung_cepat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_count_all_dpt()
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        return $this->db->count_all_results();
    }

    public function get_count_voted_dpt()
    {
        $this->db->from('pengguna');
        $this->db->join('data_voting', 'data_voting.pengguna_id = pengguna.pengguna_id');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('who_vote_osis !=', '');
        $this->db->where('who_vote_scout !=', '');
        $this->db->where('who_vote_saintek !=', '');
        return $this->db->count_all_results();
    }

    public function get_class_pengguan()
    {
        $this->db->select('kelas');
        $this->db->distinct();
        $this->db->from('pengguna');
        $this->db->order_by('kelas', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_total_dpt_perkelas($kelas)
    {
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('kelas', $kelas);
        $this->db->where('status_pengguna', 'Y');
        return $this->db->count_all_results();
    }

    public function get_total_voted_perkelas($kelas)
    {
        $this->db->from('pengguna');
        $this->db->join('data_voting', 'data_voting.pengguna_id = pengguna.pengguna_id');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('kelas', $kelas);
        $this->db->where('status_pengguna', 'Y');
        $this->db->where('who_vote_osis !=', '');
        $this->db->where('who_vote_scout !=', '');
        $this->db->where('who_vote_saintek !=', '');
        return $this->db->count_all_results();
    }

    public function get_kandidat($kategori, $gender)
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->where('kategori_pilihan', $kategori);
        $this->db->where('jenis_kelamin_pemilih', $gender);
        $this->db->order_by('kandidat_urutan', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function count_vote_osis($kandidat_id)
    {
        $this->db->from('data_voting');
        $this->db->where('who_vote_osis', $kandidat_id);
        return $this->db->count_all_results();    
    }

    public function count_vote_scout($kandidat_id)
    {
        $this->db->from('data_voting');
        $this->db->where('who_vote_scout', $kandidat_id);
        return $this->db->count_all_results();    
    }

    public function count_vote_saintek($kandidat_id)
    {
        $this->db->from('data_voting');
        $this->db->where('who_vote_saintek', $kandidat_id);
        return $this->db->count_all_results();   
    }

    public function count_vote_sport($kandidat_id)
    {
        $this->db->from('data_voting');
        $this->db->where('who_vote_sport', $kandidat_id);
        return $this->db->count_all_results();   
    }
}
