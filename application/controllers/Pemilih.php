<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemilih extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Daftar Pemilih';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $this->template->load('_template/main_template', 'pemilih/pemilih_index', $data);
    }
}
