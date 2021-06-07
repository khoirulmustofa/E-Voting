<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tutorial_evoting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Tutorial E-Voting';
        $data['load_css'] = '';
        $data['load_js'] = '';
        
        $this->template->load('_template/main_template', 'tutorial_evoting/tutorial_evoting_index', $data);
    }
}