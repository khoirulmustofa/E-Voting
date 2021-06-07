<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Voting_model');
        // is_login();
    }

    public function index()
    {
        $pengguna_id = $this->session->userdata('pengguna_id');
        $data['menu'] = 'menu_voting';
        $data['page'] = '';
        $data['title'] = 'Voting';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $pengguna_row = $this->Voting_model->get_pengguna_data_voting_by_id($pengguna_id)->row();

        $data['pengguna_row'] = $pengguna_row;
        if ($this->session->userdata('password_update') == 'N') {
            $data['pesan'] = "Please update your password for your security in using this application .";
            $this->template->load('_template/main_template', 'voting/view_index_hold', $data);
        } else {
            if ($pengguna_row->ijin_voting == 'N') {
                $data['pesan'] = "Sorry you can't vote, Wait for your voting schedule.";
            $this->template->load('_template/main_template', 'voting/view_index_hold', $data);
            } else {
                $this->template->load('_template/main_template', 'voting/view_index', $data);
            }
        }
    }

    public function voting_osis($kandidat_id)
    {
        $pengguna_id = $this->session->userdata('pengguna_id');
        $data = array(
            'who_vote_osis' => $kandidat_id
        );
        $this->Voting_model->update_data_voting_by_pengguna($pengguna_id, $data);
        $this->session->set_flashdata('msg', msg_sukses('Thank you for voting OSIS'));
        redirect(site_url('voting'));
        
    }

    public function voting_scout($kandidat_id)
    {
        $pengguna_id = $this->session->userdata('pengguna_id');
        $data = array(
            'who_vote_scout' => $kandidat_id
        );
        $this->Voting_model->update_data_voting_by_pengguna($pengguna_id, $data);
        $this->session->set_flashdata('msg', msg_sukses('Thank you for voting OSIS'));
        redirect(site_url('voting'));
    }

    public function voting_saintek($kandidat_id)
    {
        $pengguna_id = $this->session->userdata('pengguna_id');
        $data = array(
            'who_vote_saintek' => $kandidat_id
        );
        $this->Voting_model->update_data_voting_by_pengguna($pengguna_id, $data);
        $this->session->set_flashdata('msg', msg_sukses('Thank you for voting OSIS'));
        redirect(site_url('voting'));
    }
}
