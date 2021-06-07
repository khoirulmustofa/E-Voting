<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voting_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_kategori_pilihan_by_gender($gender)
    {
        $this->db->select('*');
        $this->db->from('kategori_pilihan');
        $this->db->where('kategori_pilihan_gender', $gender);
        $this->db->where('kategori_pilihan_status', 'Y');
        $this->db->order_by('kategori_pilihan_urutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_pengguna_data_voting_by_id($pengguna_id)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('data_voting', 'data_voting.pengguna_id = pengguna.pengguna_id');
        $this->db->where('pengguna.pengguna_id', $pengguna_id);
        $query = $this->db->get();
        return $query;
    }

    public function get_kandidat_kategori_by_gender($kategori_pilihan,$jenis_kelamin)
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->where('kategori_pilihan', $kategori_pilihan);
        $this->db->where('jenis_kelamin_pemilih', $jenis_kelamin);
        $this->db->order_by('kandidat_urutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }
    
    
    public function update_data_voting_by_pengguna($pengguna_id, $data)
    {
        $this->db->where_in('pengguna_id', $pengguna_id);
        $this->db->update('data_voting', $data);
    }
}
