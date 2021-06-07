<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kandidat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kandidat_model');
        // is_login();
        is_admin();
    }

    public function index()
    {
        $data['menu'] = 'menu_kandidat';
        $data['page'] = '';
        $data['title'] = 'List Candidat';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['kandidat_result'] = $this->Kandidat_model->get_kandidat_kategori_pilihan()->result();

        $this->template->load('_template/main_template', 'kandidat/view_index', $data);
    }

    public function create()
    {
        $data['menu'] = 'menu_kandidat';
        $data['page'] = '';
        $data['title'] = 'Add Candidat';
        $data['load_css'] = '';
        $data['load_js'] = 'kandidat/js_create';
        $data['kandidat_nama'] = set_value('kandidat_nama');
        $data['kandidat_visi'] = set_value('kandidat_visi');
        $data['kandidat_misi'] = set_value('kandidat_misi');
        $data['kandidat_program'] = set_value('kandidat_program');
        $data['kandidat_video'] = set_value('kandidat_video');
        $data['kandidat_lain'] = set_value('kandidat_lain');
        $data['kandidat_id'] = set_value('kandidat_id');
        $data['kategori_pilihan'] = set_value('kategori_pilihan');
        $data['kandidat_urutan'] = set_value('kandidat_urutan');
        $data['jenis_kelamin_pemilih'] = set_value('jenis_kelamin_pemilih');
        $data['kategori_pilihan_result'] = $this->Kandidat_model->get_kategori_pilihan_active()->result();

        $this->template->load('_template/main_template', 'kandidat/view_create', $data);
    }

    public function create_action()
    {
        $this->form_validation->set_rules('kandidat_nama', 'Candidat Name', 'trim|required');
        $this->form_validation->set_rules('kandidat_visi', 'Vision', 'trim|required');
        $this->form_validation->set_rules('kandidat_misi', 'Mission', 'trim|required');
        $this->form_validation->set_rules('kandidat_program', 'Program ', 'trim|required');
        $this->form_validation->set_rules('kandidat_video', 'Video ', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan', 'Vote Category', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin_pemilih', 'Gender Voter', 'trim|required');
        $this->form_validation->set_rules('kandidat_urutan', 'Order', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kandidat_id' => insert_uuid(),
                'kandidat_nama' => $this->input->post('kandidat_nama', TRUE),
                'kandidat_visi' => $this->input->post('kandidat_visi', TRUE),
                'kandidat_misi' => $this->input->post('kandidat_misi', TRUE),
                'kandidat_program' => $this->input->post('kandidat_program', TRUE),
                'kandidat_video' => $this->input->post('kandidat_video', TRUE),
                'kandidat_lain' => $this->input->post('kandidat_lain', TRUE),
                'kategori_pilihan' => $this->input->post('kategori_pilihan', TRUE),
                'kandidat_urutan' => $this->input->post('kandidat_urutan', TRUE),
                'jenis_kelamin_pemilih' => $this->input->post('jenis_kelamin_pemilih', TRUE),
                'kandidat_status' => 'Y'
            );

            $this->Kandidat_model->insert_kandidat($data);
            $this->session->set_flashdata('msg', msg_sukses('Create Record Success'));
            redirect(site_url('kandidat'));
        }
    }

    public function update($kandidat_id)
    {
        $kandidat_row = $this->Kandidat_model->get_kandidat_by_id($kandidat_id)->row();
        if ($kandidat_row) {
            $data['menu'] = 'menu_kandidat';
            $data['page'] = '';
            $data['title'] = 'Update Candidate';
            $data['load_css'] = '';
            $data['load_js'] = 'kandidat/js_create';
            $data['kandidat_id'] = set_value('kandidat_id', $kandidat_row->kandidat_id);
            $data['kandidat_nama'] = set_value('kandidat_nama', $kandidat_row->kandidat_nama);
            $data['kandidat_visi'] = set_value('kandidat_visi', $kandidat_row->kandidat_visi);
            $data['kandidat_misi'] = set_value('kandidat_misi', $kandidat_row->kandidat_misi);
            $data['kandidat_program'] = set_value('kandidat_program', $kandidat_row->kandidat_program);
            $data['kandidat_video'] = set_value('kandidat_video', $kandidat_row->kandidat_video);
            $data['kandidat_lain'] = set_value('kandidat_lain', $kandidat_row->kandidat_lain);
            $data['kategori_pilihan'] = set_value('kategori_pilihan', $kandidat_row->kategori_pilihan);
            $data['kandidat_urutan'] = set_value('kandidat_urutan', $kandidat_row->kandidat_urutan);
            $data['kandidat_status'] = set_value('kandidat_status', $kandidat_row->kandidat_status);
            $data['jenis_kelamin_pemilih'] = set_value('jenis_kelamin_pemilih', $kandidat_row->jenis_kelamin_pemilih);

            $this->template->load('_template/main_template', 'kandidat/view_update', $data);
        } else {
            show_404();
        }
    }

    public function update_action()
    {
        $this->form_validation->set_rules('kandidat_nama', 'Candidat Name', 'trim|required');
        $this->form_validation->set_rules('kandidat_visi', 'Vision', 'trim|required');
        $this->form_validation->set_rules('kandidat_misi', 'Mission', 'trim|required');
        $this->form_validation->set_rules('kandidat_program', 'Program ', 'trim|required');
        $this->form_validation->set_rules('kandidat_video', 'Video ', 'trim|required');
        $this->form_validation->set_rules('kandidat_id', 'Vote Category', 'trim|required');
        $this->form_validation->set_rules('kandidat_urutan', 'Order', 'trim|required');
        $this->form_validation->set_rules('kandidat_status', 'Candidat Status', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin_pemilih', 'Gender Voter', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $kandidat_id =  $this->input->post('kandidat_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($kandidat_id);
        } else {
            $data = array(
                'kandidat_nama' => $this->input->post('kandidat_nama', TRUE),
                'kandidat_visi' => $this->input->post('kandidat_visi', TRUE),
                'kandidat_misi' => $this->input->post('kandidat_misi', TRUE),
                'kandidat_program' => $this->input->post('kandidat_program', TRUE),
                'kandidat_video' => $this->input->post('kandidat_video', TRUE),
                'kandidat_lain' => $this->input->post('kandidat_lain', TRUE),
                'kategori_pilihan' => $this->input->post('kategori_pilihan', TRUE),
                'kandidat_urutan' => $this->input->post('kandidat_urutan', TRUE),
                'kandidat_status' => $this->input->post('kandidat_status', TRUE),
                'jenis_kelamin_pemilih' => $this->input->post('jenis_kelamin_pemilih', TRUE),
            );

            $this->Kandidat_model->update_kandidat($kandidat_id, $data);
            $this->session->set_flashdata('msg', msg_sukses('Update Record Success'));
            redirect(site_url('kandidat'));
        }
    }

    public function upload_photo($kandidat_id)
    {
        $kandidat_row = $this->Kandidat_model->get_kandidat_by_id($kandidat_id)->row();
        if ($kandidat_row) {
            $data['menu'] = 'menu_kandidat';
            $data['page'] = '';
            $data['title'] = 'Upload Photo Candidate';
            $data['load_css'] = '';
            $data['load_js'] = 'kandidat/js_create';
            $data['kandidat_row'] = $kandidat_row;
            $data['kandidat_photo'] = set_value('kandidat_photo', $kandidat_row->kandidat_photo);

            $this->template->load('_template/main_template', 'kandidat/view_upload_photo', $data);
        } else {
            show_404();
        }
    }

    public function upload_photo_action()
    {
        $kandidat_id =  $this->input->post('kandidat_id', TRUE);
        $photo_lama =  $this->input->post('photo_lama', TRUE);

        if (empty($_FILES['kandidat_photo']['name'])) {
            $this->form_validation->set_rules('kandidat_photo', 'Photo', 'trim|required');
        } else {
            $config['upload_path'] = './public/kandidat/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('kandidat_photo')) {
                $result =  $this->upload->data();

                $data = array(
                    'kandidat_photo' => $result['file_name']
                );
                $this->Kandidat_model->update_kandidat($kandidat_id, $data);
                if ($photo_lama != '') {
                    unlink('./public/kandidat/' . $photo_lama);
                }
                $this->session->set_flashdata('msg', msg_sukses('Upload Photo Success'));
                redirect(site_url('kandidat'));
            }
        }
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->upload_photo($kandidat_id);
        }
    }

    public function delete($kandidat_id)
    {
        $kandidat_row = $this->Kandidat_model->get_kandidat_by_id($kandidat_id)->row();
        if ($kandidat_row) {
            $this->Kandidat_model->delete_kandidat($kandidat_id);
            $this->session->set_flashdata('msg', msg_sukses('Delete Record Success'));
            redirect(site_url('kandidat'));
        } else {
            show_404();
        }
    }
}
