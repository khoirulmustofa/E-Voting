<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kandidat_model');
    }

    public function index()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Home';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['kandidat_result'] = $this->Kandidat_model->get_kandidat_kategori_pilihan()->result();
        $this->load->view('home/home_index', $data);
    }

    public function show_personal_kandidat($kandidat_id)
    {
        $data = $this->Kandidat_model->get_kandidat_by_id($kandidat_id)->row();
        echo json_encode($data);
    }
}
