<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_all_kategori_pilihan()
    {
        $this->db->select('*');
        $this->db->from('kategori_pilihan');
        $this->db->order_by('kategori_pilihan_urutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_kategori_pilihan_by_id($kategori_pilihan_id)
    {
        $this->db->select('*');
        $this->db->from('kategori_pilihan');
        $this->db->where('kategori_pilihan_id', $kategori_pilihan_id);
        $query = $this->db->get();
        return $query;
    }

    public function insert_kategori_pilihan($data)
    {
        $this->db->insert('kategori_pilihan', $data);
    }

    public function update_kategori_pilihan($kategori_pilihan_id, $data)
    {
        $this->db->where('kategori_pilihan_id', $kategori_pilihan_id);
        $this->db->update('kategori_pilihan', $data);
    }

    public function get_kandidat_kategori_pilihan()
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->join('kategori_pilihan', 'kategori_pilihan.kategori_pilihan_id = kandidat.kategori_pilihan_id');
        $this->db->order_by('kategori_pilihan_urutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_all_pengguna()
    {
        $this->db->select('pengguna_id, username, nama_lengkap, kelas, jenis_kelamin, akses_vote, pengguna_level, password_update, status_pengguna');
        $this->db->from('pengguna');
        $this->db->order_by('kelas,nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function insert_pengguna($data)
    {
        $this->db->insert('pengguna', $data);
    }

    
}
