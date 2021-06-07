
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all_pengguna()
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->order_by('kelas,nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_pengguna_by_id($pengguna_id)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('pengguna_id', $pengguna_id);
        $query = $this->db->get();
        return $query;
    }

    public function insert_pengguna($data)
    {
        $this->db->insert('pengguna', $data);
    }

    public function update_pengguna($pengguna_id, $data)
    {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->update('pengguna', $data);
    }

    public function delete_pengguna($pengguna_id)
    {
        $this->db->where('pengguna_id', $pengguna_id);
        $this->db->delete('pengguna');
    }
}
