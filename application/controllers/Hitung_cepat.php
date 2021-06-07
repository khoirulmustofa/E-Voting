<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hitung_cepat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hitung_cepat_model');
        // is_login();
    }

    public function index()
    {
        is_admin();
        $data['menu'] = 'menu_hitung_cepat';
        $data['page'] = '';
        $data['title'] = 'Quick Count';
        $data['load_css'] = '';
        $data['load_js'] = 'hitung_cepat/jss_view_index';       
        
        $this->template->load('_template/main_template', 'hitung_cepat/view_index', $data);
    }

    public function data_masuk()
    {
        $data['menu'] = 'menu_data_masuk';
        $data['page'] = '';
        $data['title'] = 'Data Entry';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['data_total_dpt'] = $this->Hitung_cepat_model->get_count_all_dpt();
        $data['data_voted_dpt'] = $this->Hitung_cepat_model->get_count_voted_dpt();
        $data['kelas_result'] = $this->Hitung_cepat_model->get_class_pengguan()->result();
                
        $this->template->load('_template/main_template', 'hitung_cepat/view_data_masuk', $data);
    }

    
}