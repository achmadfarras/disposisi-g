<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $_table = 'tb_surat_masuk';
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->where('is-active',1)->get($this->_table)->result();
    }

    public function save()
    {
        $data = [
            'no_surat' => $this->input->post('no_surat'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'surat_from' => $this->input->post('surat_from'),
            'surat_to' => $this->input->post('surat_to'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'perihal' => $this->input->post('perihal'),
            'keterangan' => $this->input->post('keterangan'),
            'image' => $this->uplodImage(),
            'no_surat' => '1',
        ];
        $this->db->insert($this->_table,$data);
    }
    
    public function uploadImage()
    {
        $config['upload_path']      = './assets/photo/surat_masuk/';
        $config['allowed_types']    = 'gif|jpg\png';
        $config['file_name']        = $this->input->post('no_surat');
        $config['overwrite']        = true;
        $config['max_sizes']        = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->db_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "no_image.jpg";
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $updateimage = '';
        
        if (!empty($_FILES["image"]["name"])) {
            $updateimage = $this->uploadImage();
        } else {
            $updateimage = $this->input->post('old_image');
        }
        
        $data = [
            'no_surat' => $this->input->post('no_surat'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'surat_from' => $this->input->post('surat_from'),
            'surat_to' => $this->input->post('surat_to'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'perihal' => $this->input->post('perihal'),
            'keterangan' => $this->input->post('keterangan'),
            'image' => $updateimage,
            'no_surat' => '1',
        ];

        return $this->db->set($data)->where($this->primary,$id)->update($this->_table);
    }

    public function delete($id)
    {
        $this->deleteImage($id);
        $this->db->where('id',$id)->delete($this->_table);
        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata("success","Data user berhasil dihapus");
        }
    }

    private function deleteImage($id)
    {
        $surat = $this->getById($id);

        if ($surat->image != "no_image.jpg") {
            $filename = explode(".", $surat->image)[0];
            return array_map('unlink', glob(FCPATH."assets/photo/surat_masuk/$filename.*"));
        }
    }

    public function saveAjuan()
    {
        $data = [
            'no_surat' => $this->input->post('no_surat'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'surat_from' => $this->input->post('surat_from'),
            'surat_to' => $this->input->post('surat_to'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'perihal' => $this->input->post('perihal'),
            'keterangan' => $this->input->post('keterangan'),
            'image' => $updateimage,
            'no_surat' => '1',
        ];

        $this->db->insert($this->_table,$data);
    }
}