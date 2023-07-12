<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Masuk_model");
        cek_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'View Data Surat',
            'surat' => $this->Masuk_model->getAll(),
            'content' => 'admin/surat_masuk/add_form'
        );

        $this->load->view('admin/template/main',$data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Surat Masuk',
            'content' => 'admin/surat_masuk/add_form'
        );

        $this->load->view('admin/template/main',$data);
    }

    public function save()
    {
        $this->Masuk_model->Save();

        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata("success","Data surat_masuk berhasil disimpan");
        }

        redirect('admin/surat_masuk');
    }

    public function getEdit($id)
    {
        $data = array(
            'title' => 'Update Data Surat Masuk',
            'surat_masuk' => $this->Masuk_model->getById($id),
            'content' => 'admin/surat_masuk/edit_form'
        );

        $this->load->view('admin/template/main',$data);
    }

    public function edit()
    {
        $this->User_model->editData();

        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata("success","Data surat masuk berhasil diupdate");
        }

        redirect('admin/surat_masuk');
    }

    public function delete($id)
    {
        $this->Masuk_model->delete($id);
        redirect('admin/surat_masuk');
    }
}