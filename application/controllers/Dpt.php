<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dpt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dpt_model');
        // is_login();
        is_admin();
    }

    public function index()
    {
        $data['menu'] = 'menu_dpt';
        $data['page'] = '';
        $data['title'] = 'List DPT';
        $data['load_css'] = 'dpt/css_index';
        $data['load_js'] = 'dpt/js_index';
        $data['dpt_result'] =  $this->Dpt_model->get_all_dpt()->result();

        $this->template->load('_template/main_template', 'dpt/view_index', $data);
    }

    public function generate_dpt()
    {
        $user_punya_hak = $this->Dpt_model->get_pengguna_punya_hak()->result();
        $this->db->trans_start();
        foreach ($user_punya_hak as $user) {
            $data = array(
                'data_voting_id' => insert_uuid(),
                'pengguna_id' => $user->pengguna_id,
                'who_vote_osis' => $user->akses_vote_osis == 'Y' ? '' : 'BLOCK',
                'who_vote_scout' => $user->akses_vote_scout == 'Y' ? '' : 'BLOCK',
                'who_vote_saintek' => $user->akses_vote_saintek == 'Y' ? '' : 'BLOCK',
                'who_vote_sport' => $user->akses_vote_sport == 'Y' ? '' : 'BLOCK',
                'ijin_voting' => 'N'
            );
            $this->Dpt_model->insert_data_voting($data);
        }
        $this->db->trans_complete();
        $this->session->set_flashdata('msg', msg_sukses('Create DPT Record Success'));
        redirect(site_url('dpt'));
    }

    public function delete_all_dpt()
    {
        $this->Dpt_model->delete_data_voting();
        $this->session->set_flashdata('msg', msg_sukses('Delete DPT Record Success'));
        redirect(site_url('dpt'));
    }

    public function belum_memilih()
    {
        $data['menu'] = 'menu_dpt_belum_memilih';
        $data['page'] = '';
        $data['title'] = 'List DPT Not Yet Vote';
        $data['load_css'] = 'dpt/css_index';
        $data['load_js'] = 'dpt/js_index';
        $data['dpt_result'] =  $this->Dpt_model->get_dpt_belum_milih()->result();

        $this->template->load('_template/main_template', 'dpt/view_belum_memilih', $data);
    }

    public function sudah_memilih()
    {
        $data['menu'] = 'menu_dpt_sudah_memilih';
        $data['page'] = '';
        $data['title'] = 'List DPT Alread Vote';
        $data['load_css'] = 'dpt/css_index';
        $data['load_js'] = 'dpt/js_index';
        $data['dpt_result'] =  $this->Dpt_model->get_dpt_sudah_milih()->result();

        $this->template->load('_template/main_template', 'dpt/view_sudah_memilih', $data);
    }

    public function give_permit_vote()
    {
        if (!empty($this->input->post('data_voting_id', TRUE))) {
            $data_voting_id = $this->input->post('data_voting_id', TRUE);
            $data = array(
                'ijin_voting'=>'Y'
            );
            $this->Dpt_model->update_bluk_data_voting($data_voting_id,$data);            
            $this->session->set_flashdata('msg', msg_sukses('Update Permit Vote DPT Success'));
            redirect(site_url('dpt/belum_memilih'));
        } else {
            $this->session->set_flashdata('msg', msg_error("Sorry you haven`t chosen DPT"));
            redirect(site_url('dpt/belum_memilih'));
        }
    }
}
