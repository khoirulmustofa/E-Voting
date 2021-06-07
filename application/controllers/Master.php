<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
    }

    public function pengguna()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'List Users';
        $data['load_css'] = 'master/css_master_pengguna';
        $data['load_js'] = 'master/js_master_pengguna';
        $data['pengguna_result'] =  $this->Master_model->get_all_pengguna()->result();

        $this->template->load('_template/main_template', 'master/master_pengguna', $data);
    }

    public function pengguna_create()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Tambah Pengguna';
        $data['load_css'] = 'master/css_master_pengguna';
        $data['load_js'] = 'master/js_master_pengguna';
        $data['pengguna_id'] = set_value('pengguna_id');
        $data['username'] = set_value('username');
        $data['password'] = set_value('password');
        $data['nama_lengkap'] = set_value('nama_lengkap');
        $data['jenis_kelamin'] = set_value('jenis_kelamin');
        $data['pengguna_level'] = set_value('pengguna_level');
        $data['password_update'] = set_value('password_update');
        $data['status_pengguna'] = set_value('status_pengguna');

        $this->template->load('_template/main_template', 'master/master_pengguna_create', $data);
    }

    public function pengguna_upload()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Upload Users';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['upload_file'] = set_value('upload_file');

        $this->template->load('_template/main_template', 'master/master_pengguna_upload', $data);
    }

    public function pengguna_upload_action()
    {
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
                $password = $row[2];
                $options = array("cost" => 10);
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                $data_pengguna = array(
                    'pengguna_id' => insert_uuid(),
                    'username' => $row[1],
                    'password' => $hashPassword,
                    'nama_lengkap' => $row[3],
                    'kelas' => $row[4],
                    'jenis_kelamin' => $row[5],
                    'akses_vote' => $row[6],
                    'pengguna_level' => $row[7],
                    'password_update' => $row[8],
                    'status_pengguna' => $row[9]
                );
                $this->Master_model->insert_pengguna($data_pengguna);
            }
            $this->db->trans_complete();
            $this->session->set_flashdata('msg', msg_sukses('The uploaded file is success'));
            redirect(site_url('master/pengguna'));
        } else {
            $this->session->set_flashdata('msg', msg_error('The uploaded file is missing'));
            redirect(site_url('master/pengguna_upload'));
        }
    }

    public function dpt()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'List DPT';
        $data['load_css'] = 'master/css_master_pengguna';
        $data['load_js'] = 'master/js_master_pengguna';
        $data['dpt_result'] =  $this->Master_model->get_all_dpt()->result();

        $this->template->load('_template/main_template', 'master/master_dpt', $data);
    }

    public function kandidat()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'LIST OF CANDIDATES';
        $data['load_css'] = 'master/css_master_kategori_pilihan';
        $data['load_js'] = 'master/js_master_kategori_pilihan';
        $data['kandidat_result'] = $this->Master_model->get_kandidat_kategori_pilihan()->result();

        $this->template->load('_template/main_template', 'master/master_kandidat', $data);
    }

    public function kandidat_create()
    {
        if ($this->session->userdata('pengguna_level') == 'Candidat' || $this->session->userdata('pengguna_level') == 'Admin') {
            $data['menu'] = '';
            $data['page'] = '';
            $data['title'] = 'Add Candidate';
            $data['load_css'] = 'master/css_master_kandidat_create';
            $data['load_js'] = 'master/js_master_kandidat_create';
            $data['kandidat_nama'] = set_value('kandidat_nama');
            $data['kandidat_photo'] = set_value('kandidat_photo');
            $data['kandidat_visi'] = set_value('kandidat_visi');
            $data['kandidat_misi'] = set_value('kandidat_misi');
            $data['kandidat_program'] = set_value('kandidat_program');
            $data['kandidat_video'] = set_value('kandidat_video');
            $data['kandidat_lain'] = set_value('kandidat_lain');
            $data['kategori_pilihan_id'] = set_value('kategori_pilihan_id');
            $data['kandidat_urutan'] = set_value('kandidat_urutan');
            $data['kategori_pilihan_result'] = $this->Master_model->get_all_kategori_pilihan()->result();

            $this->template->load('_template/main_template', 'master/master_kandidat_create', $data);
        } else {
            $this->session->set_flashdata('msg', msg_error("sorry you don't have access to this menu"));
            redirect(site_url('master/kandidat'));
        }
    }

    public function upload_photo_kandidat()
    {
        if (empty($_FILES['kandidat_photo']['name'])) {
            $this->form_validation->set_rules('kandidat_photo', 'Photo', 'trim|required');
        } else {
            $config['upload_path'] = './public/kandidat/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('kandidat_photo');
            if ($this->upload->do_upload('kandidat_photo')) {
                $result =  $this->upload->data();
            }
        }
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->kandidat_create();
        }
    }

    public function tambah_kandidat_action()
    {
        // $this->form_validation->set_rules('kandidat_nama', 'Nama Kandidat', 'trim|required');
        // $this->form_validation->set_rules('kategori_pilihan_id', 'Kategori Pilihan', 'trim|required');
        // $this->form_validation->set_rules('kandidat_visi', 'Visi', 'trim|required');
        // $this->form_validation->set_rules('kandidat_misi', 'Misi', 'trim|required');
        // $this->form_validation->set_rules('kandidat_program', 'Program', 'trim|required');
        // $this->form_validation->set_rules('kandidat_lain', 'Lain-lain', 'trim|required');
        if (empty($_FILES['kandidat_photo']['name'])) {
            $this->form_validation->set_rules('kandidat_photo', 'Photo', 'trim|required');
        }
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kandidat();
        } else {

            if (!empty($_FILES['kandidat_photo']['name'])) {
                $config['upload_path'] = './public/kandidat/';
                $config['allowed_types'] = 'jpg|png';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload('kandidat_photo');
                $result1 = $this->upload->data();
                echo print_r($result1);
            }

            // $data = array(
            //     'kategori_pilihan_id'] = uniqid(),
            //     'kategori_pilihan_nama'] = $this->input->post('kategori_pilihan_nama', TRUE),
            //     'kategori_pilihan_keterangan'] = $this->input->post('kategori_pilihan_keterangan', TRUE),
            //     'kategori_pilihan_status'] = $this->input->post('kategori_pilihan_status', TRUE),
            //     'kategori_pilihan_urutan'] = $this->input->post('kategori_pilihan_urutan', TRUE)
            // );

            // $this->Master_model->insert_kategori_pilihan($data);
            // $this->session->set_flashdata('msg', msg_sukses('Create Pilihan Kategori Record Success'));
            // redirect(site_url('master/kategori_pilihan'));
        }
    }

    public function kategori_pilihan()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Choice Category';
        $data['load_css'] = 'master/css_master_kategori_pilihan';
        $data['load_js'] = 'master/js_master_kategori_pilihan';
        $data['kategori_pilihan_result'] = $this->Master_model->get_all_kategori_pilihan()->result();

        $this->template->load('_template/main_template', 'master/master_kategori_pilihan', $data);
    }

    public function tambah_kategori_pilihan()
    {
        $data['menu'] = '';
        $data['page'] = '';
        $data['title'] = 'Tambah Kategory Pilihan';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['kategori_pilihan_nama'] = set_value('kategori_pilihan_nama');
        $data['kategori_pilihan_keterangan'] = set_value('kategori_pilihan_keterangan');
        $data['kategori_pilihan_status'] = set_value('kategori_pilihan_status');
        $data['kategori_pilihan_urutan'] = set_value('kategori_pilihan_urutan');
        $this->template->load('_template/main_template', 'master/master_tambah_kategori_pilihan', $data);
    }

    public function tambah_kategori_pilihan_action()
    {
        $this->form_validation->set_rules('kategori_pilihan_nama', 'Nama Kategori Pilihan', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_urutan', 'Urutan Kategori', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kategori_pilihan();
        } else {
            $data = array(
                'kategori_pilihan_id' => uniqid(),
                'kategori_pilihan_nama' => $this->input->post('kategori_pilihan_nama', TRUE),
                'kategori_pilihan_keterangan' => $this->input->post('kategori_pilihan_keterangan', TRUE),
                'kategori_pilihan_status' => $this->input->post('kategori_pilihan_status', TRUE),
                'kategori_pilihan_urutan' => $this->input->post('kategori_pilihan_urutan', TRUE)
            );

            $this->Master_model->insert_kategori_pilihan($data);
            $this->session->set_flashdata('msg', msg_sukses('Create Pilihan Kategori Record Success'));
            redirect(site_url('master/kategori_pilihan'));
        }
    }

    public function kategori_pilihan_update($kategori_pilihan_id)
    {
        $kategori_pilihan_row = $this->Master_model->get_kategori_pilihan_by_id($kategori_pilihan_id)->row();
        if ($kategori_pilihan_row) {
            $data['menu'] = '';
            $data['page'] = '';
            $data['title'] = 'Update Category';
            $data['load_css'] = '';
            $data['load_js'] = '';
            $data['kategori_pilihan_id'] = set_value('kategori_pilihan_id', $kategori_pilihan_row->kategori_pilihan_id);
            $data['kategori_pilihan_nama'] = set_value('kategori_pilihan_nama', $kategori_pilihan_row->kategori_pilihan_nama);
            $data['kategori_pilihan_keterangan'] = set_value('kategori_pilihan_keterangan', $kategori_pilihan_row->kategori_pilihan_keterangan);
            $data['kategori_pilihan_status'] = set_value('kategori_pilihan_status', $kategori_pilihan_row->kategori_pilihan_status);
            $data['kategori_pilihan_urutan'] = set_value('kategori_pilihan_urutan', $kategori_pilihan_row->kategori_pilihan_urutan);
            $this->template->load('_template/main_template', 'master/master_kategori_pilihan_update', $data);
        } else {
            show_404();
        }
    }

    public function edit_kategori_pilihan_action()
    {
        $this->form_validation->set_rules('kategori_pilihan_nama', 'Nama Kategori Pilihan', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_urutan', 'Urutan Kategori', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $kategori_pilihan_id =  $this->input->post('kategori_pilihan_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_kategori_pilihan($kategori_pilihan_id);
        } else {
            $data = array(
                'kategori_pilihan_nama' => $this->input->post('kategori_pilihan_nama', TRUE),
                'kategori_pilihan_keterangan' => $this->input->post('kategori_pilihan_keterangan', TRUE),
                'kategori_pilihan_status' => $this->input->post('kategori_pilihan_status', TRUE),
                'kategori_pilihan_urutan' => $this->input->post('kategori_pilihan_urutan', TRUE)
            );

            $this->Master_model->update_kategori_pilihan($kategori_pilihan_id, $data);
            $this->session->set_flashdata('msg', msg_sukses('Update Pilihan Kategori Record Success'));
            redirect(site_url('master/kategori_pilihan'));
        }
    }
}
