<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kandidat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_kandidat_kategori_pilihan()
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->order_by('kategori_pilihan,kandidat_urutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_kategori_pilihan_active()
    {
        $this->db->select('*');
        $this->db->from('kategori_pilihan');
        $this->db->order_by('kategori_pilihan_urutan,kategori_pilihan_nama', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_kandidat_by_id($kandidat_id)
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->where('kandidat_id', $kandidat_id);
        $query = $this->db->get();
        return $query;
    }

    public function insert_kandidat( $data)
    {
        $this->db->insert('kandidat', $data);
    }

    public function update_kandidat($kandidat_id, $data)
    {
        $this->db->where('kandidat_id', $kandidat_id);
        $this->db->update('kandidat', $data);
    }

    public function delete_kandidat($kandidat_id)
    {
        $this->db->where('kandidat_id', $kandidat_id);
        $this->db->delete('kandidat');
    }
}
