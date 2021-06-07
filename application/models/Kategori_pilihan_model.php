<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_pilihan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_all_kategori_pilihan()
    {
        $this->db->select('*');
        $this->db->from('kategori_pilihan');
        $this->db->order_by('kategori_pilihan_urutan,kategori_pilihan_nama', 'ASC');
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

    public function insert_kategori_pilihan( $data)
    {
        $this->db->insert('kategori_pilihan', $data);
    }

    public function update_kategori_pilihan($kategori_pilihan_id, $data)
    {
        $this->db->where('kategori_pilihan_id', $kategori_pilihan_id);
        $this->db->update('kategori_pilihan', $data);
    }

    public function delete_kategori_pilihan($kategori_pilihan_id)
    {
        $this->db->where('kategori_pilihan_id', $kategori_pilihan_id);
        $this->db->delete('kategori_pilihan');
    }
}
