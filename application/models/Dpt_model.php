<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dpt_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all_dpt()
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('data_voting', 'data_voting.pengguna_id = pengguna.pengguna_id');
        $this->db->order_by('kelas,nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_pengguna_punya_hak()
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('akses_vote', 'Y');
        $this->db->where('status_pengguna', 'Y');
        $this->db->order_by('kelas,nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_dpt_belum_milih()
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('data_voting', 'data_voting.pengguna_id = pengguna.pengguna_id');
        $this->db->where('data_voting.ijin_voting', 'N');
        $this->db->where('pengguna.akses_vote', 'Y');
        $this->db->order_by('kelas,nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_dpt_sudah_milih()
    {
        $this->db->select('pengguna.*,data_voting.*');
        $this->db->select('kandidat_osis.kandidat_nama as nama_osis');
        $this->db->select('kandidat_scout.kandidat_nama as nama_scout');
        $this->db->select('kandidat_saintek.kandidat_nama as nama_sain');
        $this->db->from('pengguna');
        $this->db->join('data_voting', 'data_voting.pengguna_id = pengguna.pengguna_id');
        $this->db->join('kandidat as kandidat_osis', 'kandidat_osis.kandidat_id = data_voting.who_vote_osis','left');
        $this->db->join('kandidat as kandidat_scout', 'kandidat_scout.kandidat_id = data_voting.who_vote_scout','left');
        $this->db->join('kandidat as kandidat_saintek', 'kandidat_saintek.kandidat_id = data_voting.who_vote_saintek','left');
        $this->db->where('data_voting.ijin_voting', 'Y');
        $this->db->order_by('kelas,nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function insert_data_voting($data)
    {
        $this->db->insert('data_voting', $data);
    }

    public function delete_data_voting()
    {
        $this->db->from('data_voting');
        $this->db->truncate();
    }

    public function update_bluk_data_voting($data_voting_id, $data)
    {
        $this->db->where_in('data_voting_id', $data_voting_id);
        $this->db->update('data_voting', $data);
    }

}
