<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_pilihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_pilihan_model');
    }

    public function index()
    {
        $data['menu'] = 'menu_kategori_pilihan';
        $data['page'] = '';
        $data['title'] = 'List Vote Category';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['kategori_pilihan_result'] = $this->Kategori_pilihan_model->get_all_kategori_pilihan()->result();

        $this->template->load('_template/main_template', 'kategori_pilihan/view_index', $data);
    }

    public function create()
    {
        $data['menu'] = 'menu_kategori_pilihan';
        $data['page'] = '';
        $data['title'] = 'Add Category';
        $data['load_css'] = '';
        $data['load_js'] = '';
        $data['kategori_pilihan_nama'] = set_value('kategori_pilihan_nama');
        $data['kategori_pilihan_gender'] = set_value('kategori_pilihan_gender');
        $data['kategori_pilihan_keterangan'] = set_value('kategori_pilihan_keterangan');
        $data['kategori_pilihan_status'] = set_value('kategori_pilihan_status');
        $data['kategori_pilihan_urutan'] = set_value('kategori_pilihan_urutan');
        $this->template->load('_template/main_template', 'kategori_pilihan/view_create', $data);
    }

    public function create_action()
    {
        $this->form_validation->set_rules('kategori_pilihan_nama', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_gender', 'Category For Gender', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_urutan', 'Order', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_status', 'Status Category', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kategori_pilihan_id' => insert_uuid(),
                'kategori_pilihan_nama' => $this->input->post('kategori_pilihan_nama', TRUE),
                'kategori_pilihan_gender' => $this->input->post('kategori_pilihan_gender', TRUE),
                'kategori_pilihan_keterangan' => $this->input->post('kategori_pilihan_keterangan', TRUE),
                'kategori_pilihan_status' => $this->input->post('kategori_pilihan_status', TRUE),
                'kategori_pilihan_urutan' => $this->input->post('kategori_pilihan_urutan', TRUE)
            );

            $this->Kategori_pilihan_model->insert_kategori_pilihan( $data);
            $this->session->set_flashdata('msg', msg_sukses('Create Record Success'));
            redirect(site_url('kategori_pilihan'));
        }
    }

    public function update($kategori_pilihan_id)
    {
        $kategori_pilihan_row = $this->Kategori_pilihan_model->get_kategori_pilihan_by_id($kategori_pilihan_id)->row();
        if ($kategori_pilihan_row) {
            $data['menu'] = 'menu_kategori_pilihan';
            $data['page'] = '';
            $data['title'] = 'Update Category';
            $data['load_css'] = '';
            $data['load_js'] = '';
            $data['kategori_pilihan_id'] = set_value('kategori_pilihan_id', $kategori_pilihan_row->kategori_pilihan_id);
            $data['kategori_pilihan_nama'] = set_value('kategori_pilihan_nama', $kategori_pilihan_row->kategori_pilihan_nama);
            $data['kategori_pilihan_gender'] = set_value('kategori_pilihan_gender', $kategori_pilihan_row->kategori_pilihan_gender);
            $data['kategori_pilihan_keterangan'] = set_value('kategori_pilihan_keterangan', $kategori_pilihan_row->kategori_pilihan_keterangan);
            $data['kategori_pilihan_status'] = set_value('kategori_pilihan_status', $kategori_pilihan_row->kategori_pilihan_status);
            $data['kategori_pilihan_urutan'] = set_value('kategori_pilihan_urutan', $kategori_pilihan_row->kategori_pilihan_urutan);
            $this->template->load('_template/main_template', 'kategori_pilihan/view_update', $data);
        } else {
            show_404();
        }
    }

    public function update_action()
    {
        $this->form_validation->set_rules('kategori_pilihan_nama', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_gender', 'Category For Gender', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_urutan', 'Order', 'trim|required');
        $this->form_validation->set_rules('kategori_pilihan_status', 'Status Category', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $kategori_pilihan_id =  $this->input->post('kategori_pilihan_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($kategori_pilihan_id);
        } else {
            $data = array(
                'kategori_pilihan_nama' => $this->input->post('kategori_pilihan_nama', TRUE),
                'kategori_pilihan_gender' => $this->input->post('kategori_pilihan_gender', TRUE),
                'kategori_pilihan_keterangan' => $this->input->post('kategori_pilihan_keterangan', TRUE),
                'kategori_pilihan_status' => $this->input->post('kategori_pilihan_status', TRUE),
                'kategori_pilihan_urutan' => $this->input->post('kategori_pilihan_urutan', TRUE)
            );

            $this->Kategori_pilihan_model->update_kategori_pilihan($kategori_pilihan_id, $data);
            $this->session->set_flashdata('msg', msg_sukses('Update Record Success'));
            redirect(site_url('kategori_pilihan'));
        }
    }

    public function delete($kategori_pilihan_id)
    {
        $kategori_pilihan_row = $this->Kategori_pilihan_model->get_kategori_pilihan_by_id($kategori_pilihan_id)->row();
        if ($kategori_pilihan_row) {
            $this->Kategori_pilihan_model->delete_kategori_pilihan($kategori_pilihan_id);
            $this->session->set_flashdata('msg', msg_sukses('Delete Record Success'));
            redirect(site_url('kategori_pilihan'));
        } else {
            show_404();
        }
    }
}
