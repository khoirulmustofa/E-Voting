<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == true) {
            $this->session->set_flashdata('msg', msg_sukses('Selamat Menggunakan E-VOTING NFBS BOGOR'));
            redirect(site_url('dashboard'));
        }
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Login';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['username'] = set_value('username');
        $data['password'] = set_value('password');
        $data['remember'] = set_value('remember');

        $this->load->view('login/login_index', $data);
    }

    public function login_action()
    {
        $remember = $this->input->post('remember', true);

        $this->form_validation->set_rules('username', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $row_user = $this->Login_model->get_pengguna_by_username($username)->row();
            if ($row_user) {
                if (password_verify($password, $row_user->password)) {

                    $session = array(
                        'pengguna_id' => $row_user->pengguna_id,
                        'nama_lengkap' => $row_user->nama_lengkap,
                        'jenis_kelamin' => $row_user->jenis_kelamin,
                        'pengguna_level' => $row_user->pengguna_level,
                        'password_update' => $row_user->password_update,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($session);
                    $this->session->set_flashdata('msg', msg_sukses('Selamat Menggunakan E-VOTING NFBS BOGOR'));
                    redirect(site_url('dashboard'));
                } else {
                    $this->session->set_flashdata('msg', msg_error('Password yang anda masukan salah ...'));
                    redirect(site_url('login'));
                }
            } else {
                $this->session->set_flashdata('msg', msg_error('Username tidak terdaftar dalam sistem ...'));
                redirect(site_url('login'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg', msg_sukses('Thank you for using E-Voting.'));
        redirect(site_url('login'));
    }
}
