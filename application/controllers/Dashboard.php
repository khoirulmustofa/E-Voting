<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        // is_login();
    }

    public function index()
    {
        $data['menu'] = 'menu_dashboard';
        $data['page'] = '';
        $data['title'] = 'Dashboard';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['count_all_dpt'] =$this->Dashboard_model->get_all_dpt();
        $data['count_osis_tb_dpt'] =$this->Dashboard_model->get_dpt_osis('L');
        $data['count_osis_tbh_dpt'] =$this->Dashboard_model->get_dpt_osis('P');
        $data['count_scout_tb_dpt'] =$this->Dashboard_model->get_dpt_scout('L');
        $data['count_scout_tbh_dpt'] =$this->Dashboard_model->get_dpt_scout('P');
        $data['count_saintek_tb_dpt'] =$this->Dashboard_model->get_dpt_saintek('L');
        $data['count_saintek_tbh_dpt'] =$this->Dashboard_model->get_dpt_saintek('P');
        $data['count_sport_tb_dpt'] =$this->Dashboard_model->get_dpt_sport('L');
        $data['count_sport_tbh_dpt'] =$this->Dashboard_model->get_dpt_sport('P');
        
        $this->template->load('_template/main_template', 'dashboard/view_index', $data);
    }
}