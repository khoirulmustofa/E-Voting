<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        // is_login();
        is_admin();
    }

    public function index()
    {
        $data['menu'] = 'menu_pengguna';
        $data['page'] = '';
        $data['title'] = 'List Users';
        $data['load_css'] = 'pengguna/css_index';
        $data['load_js'] = 'pengguna/js_index';
        $data['pengguna_result'] =  $this->Pengguna_model->get_all_pengguna()->result();

        $this->template->load('_template/main_template', 'pengguna/view_index', $data);
    }

    public function create()
    {
        $data['menu'] = 'menu_pengguna';
        $data['page'] = '';
        $data['title'] = 'Add User';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['pengguna_id'] = set_value('pengguna_id');
        $data['username'] = set_value('username');
        $data['password'] = set_value('password');
        $data['nama_lengkap'] = set_value('nama_lengkap');
        $data['kelas'] = set_value('kelas');
        $data['jenis_kelamin'] = set_value('jenis_kelamin');
        $data['akses_vote'] = set_value('akses_vote');
        $data['akses_vote_osis'] = set_value('akses_vote_osis');
        $data['akses_vote_scout'] = set_value('akses_vote_scout');
        $data['akses_vote_saintek'] = set_value('akses_vote_saintek');
        $data['akses_vote_sport'] = set_value('akses_vote_sport');
        $data['pengguna_level'] = set_value('pengguna_level');
        $data['status_pengguna'] = set_value('status_pengguna');
        $this->template->load('_template/main_template', 'pengguna/view_create', $data);
    }

    public function create_action()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('kelas', 'Class', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Gender ', 'trim|required');
        $this->form_validation->set_rules('akses_vote', 'Access Vote', 'trim|required');
        $this->form_validation->set_rules('akses_vote_osis', 'Access Vote OSIS', 'trim|required');
        $this->form_validation->set_rules('akses_vote_scout', 'Access Vote SCOUT', 'trim|required');
        $this->form_validation->set_rules('akses_vote_saintek', 'Access Vote SAINTEK', 'trim|required');
        $this->form_validation->set_rules('akses_vote_sport', 'Access Vote SPORT', 'trim|required');
        $this->form_validation->set_rules('pengguna_level', 'Level User', 'trim|required');
        $this->form_validation->set_rules('status_pengguna', 'Status User', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data['pengguna_id'] = insert_uuid();
            $data['username'] = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $options = array("cost" => 10);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            $data['password'] = $hashPassword;
            $data['nama_lengkap'] = ucfirst($this->input->post('nama_lengkap', TRUE));
            $data['kelas'] = strtoupper($this->input->post('kelas', TRUE));
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin', TRUE);
            $data['akses_vote'] = $this->input->post('akses_vote', TRUE);
            $data['akses_vote_osis'] = $this->input->post('akses_vote_osis', TRUE);
            $data['akses_vote_scout'] = $this->input->post('akses_vote_scout', TRUE);
            $data['akses_vote_saintek'] = $this->input->post('akses_vote_saintek', TRUE);
            $data['akses_vote_sport'] = $this->input->post('akses_vote_sport', TRUE);
            $data['pengguna_level'] = $this->input->post('pengguna_level', TRUE);
            $data['status_pengguna'] = $this->input->post('status_pengguna', TRUE);

            $this->Pengguna_model->insert_pengguna($data);
            $this->session->set_flashdata('msg', msg_sukses('Create Record Success'));
            redirect(site_url('pengguna'));
        }
    }

    public function update($pengguna_id)
    {
        $pengguna_row = $this->Pengguna_model->get_pengguna_by_id($pengguna_id)->row();
        if ($pengguna_row) {
            $data['menu'] = 'menu_pengguna';
            $data['page'] = '';
            $data['title'] = 'Update User';
            $data['load_css'] = '';
            $data['load_js'] = '';
            $data['pengguna_id'] = set_value('pengguna_id', $pengguna_row->pengguna_id);
            $data['username'] = set_value('username', $pengguna_row->username);
            $data['password'] = set_value('password');
            $data['nama_lengkap'] = set_value('nama_lengkap', $pengguna_row->nama_lengkap);
            $data['kelas'] = set_value('kelas', $pengguna_row->kelas);
            $data['jenis_kelamin'] = set_value('jenis_kelamin', $pengguna_row->jenis_kelamin);
            $data['akses_vote'] = set_value('akses_vote', $pengguna_row->akses_vote);
            $data['akses_vote_osis'] = set_value('akses_vote_osis', $pengguna_row->akses_vote_osis);
            $data['akses_vote_scout'] = set_value('akses_vote_scout', $pengguna_row->akses_vote_scout);
            $data['akses_vote_saintek'] = set_value('akses_vote_saintek', $pengguna_row->akses_vote_saintek);
            $data['akses_vote_sport'] = set_value('akses_vote_sport', $pengguna_row->akses_vote_sport);
            $data['pengguna_level'] = set_value('pengguna_level', $pengguna_row->pengguna_level);
            $data['status_pengguna'] = set_value('status_pengguna', $pengguna_row->status_pengguna);
            $this->template->load('_template/main_template', 'pengguna/view_update', $data);
        } else {
            show_404();
        }
    }

    public function update_action()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('kelas', 'Class', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Gender ', 'trim|required');
        $this->form_validation->set_rules('akses_vote', 'Access Vote', 'trim|required');
        $this->form_validation->set_rules('akses_vote_osis', 'Access Vote OSIS', 'trim|required');
        $this->form_validation->set_rules('akses_vote_scout', 'Access Vote SCOUT', 'trim|required');
        $this->form_validation->set_rules('akses_vote_saintek', 'Access Vote SAINTEK', 'trim|required');
        $this->form_validation->set_rules('akses_vote_sport', 'Access Vote SPORT', 'trim|required');
        $this->form_validation->set_rules('pengguna_level', 'Level User', 'trim|required');
        $this->form_validation->set_rules('status_pengguna', 'Status User', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $pengguna_id =  $this->input->post('pengguna_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($pengguna_id);
        } else {
            $data['username'] = $this->input->post('username', TRUE);
            if ($this->input->post('password', TRUE) != '') {
                $password = $this->input->post('password', TRUE);
                $options = array("cost" => 10);
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                $data['password'] = $hashPassword;
            }
            $data['nama_lengkap'] = ucfirst($this->input->post('nama_lengkap', TRUE));
            $data['kelas'] = strtoupper($this->input->post('kelas', TRUE));
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin', TRUE);
            $data['akses_vote'] = $this->input->post('akses_vote', TRUE);
            $data['akses_vote_osis'] = $this->input->post('akses_vote_osis', TRUE);
            $data['akses_vote_scout'] = $this->input->post('akses_vote_scout', TRUE);
            $data['akses_vote_saintek'] = $this->input->post('akses_vote_saintek', TRUE);
            $data['akses_vote_sport'] = $this->input->post('akses_vote_sport', TRUE);
            $data['pengguna_level'] = $this->input->post('pengguna_level', TRUE);
            $data['status_pengguna'] = $this->input->post('status_pengguna', TRUE);

            $this->Pengguna_model->update_pengguna($pengguna_id, $data);
            $this->session->set_flashdata('msg', msg_sukses('Update Record Success'));
            redirect(site_url('pengguna'));
        }
    }

    public function delete($pengguna_id)
    {
        $pengguna_row = $this->Pengguna_model->get_pengguna_by_id($pengguna_id)->row();
        if ($pengguna_row) {
            $this->Pengguna_model->delete_pengguna($pengguna_id);
            $this->session->set_flashdata('msg', msg_sukses('Delete Record Success'));
            redirect(site_url('pengguna'));
        } else {
            show_404();
        }
    }

    public function upload()
    {
        $pengguna_result = $this->Pengguna_model->get_all_pengguna()->result();
        foreach ($pengguna_result as $pengguna) {
            $password = $pengguna->username;
            $options = array("cost" => 10);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            $data = array(
                // 'pengguna_id' => insert_uuid()
                'password' => $hashPassword
            );
            $this->Pengguna_model->update_pengguna($pengguna->pengguna_id, $data);
        }
        $this->session->set_flashdata('msg', msg_sukses('The uploaded file is success'));
        redirect(site_url('pengguna'));

        // $data['menu'] = '';
        // $data['page'] = '';
        // $data['title'] = 'Upload Users';
        // $data['load_css'] = '';
        // $data['load_js'] = '';
        // $data['upload_file'] = set_value('upload_file');

        // $this->template->load('_template/main_template', 'pengguna/view_upload', $data);
    }

    public function upload_action()
    {
        ini_set('memory_limit', '-1');
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
            $extension = end($arr_file);
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            $this->db->trans_start();
            foreach (array_slice($sheetData, 1) as $key => $row) {
                // $password = $row[2];
                // $options = array("cost" => 10);
                // $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                $data_pengguna = array(
                    'pengguna_id' => insert_uuid(),
                    'username' => $row[1],
                    'password' => $row[2],
                    'nama_lengkap' => $row[3],
                    'kelas' => $row[4],
                    'jenis_kelamin' => $row[5]
                );
                $this->Pengguna_model->insert_pengguna($data_pengguna);
            }
            $this->db->trans_complete();
            $this->session->set_flashdata('msg', msg_sukses('The uploaded file is success'));
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('msg', msg_error('The uploaded file is missing'));
            redirect(site_url('pengguna/upload'));
        }
    }
}
