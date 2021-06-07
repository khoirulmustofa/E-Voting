<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Update_password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
    }

    public function index()
    {
        $this->load->model('Pengguna_model');
        $pengguna_id = $this->session->userdata('pengguna_id');

        $data['menu'] = 'menu_update_password';
        $data['page'] = '';
        $data['title'] = 'Update Password';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['pengguna_row'] =  $this->Pengguna_model->get_pengguna_by_id($pengguna_id)->row();

        $this->template->load('_template/main_template', 'pengguna/view_update_password', $data);
    }

    public function update_password_action()
    {
        $this->load->model('Pengguna_model');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirmation New Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $pengguna_id =  $this->input->post('pengguna_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $password = $this->input->post('password', TRUE);
            $options = array("cost" => 10);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            $data['password'] = $hashPassword;
            $data['password_update'] = 'Y';
            $this->Pengguna_model->update_pengguna($pengguna_id, $data);
            $session = array(
                'password_update' => 'Y',
            );
            $this->session->set_userdata($session);
            $this->session->set_flashdata('msg', msg_sukses('Update Password Success'));
            redirect(site_url('dashboard'));
        }
    }
}
