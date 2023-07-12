<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Templatesurat extends CI_Controlloer {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Template_model");
        cek_login();
    }

    public function index()
    {
        $data = array(
            'title' => 'View Data History',
            'userlog' => infoLogin(),
            'template' => $this->Template_model->getAll(),
            'content' => 'Template_surat/index'
        );

        $this->load->view('template_user/main',$data);
    }

    public function surat_ajuan()
    {
        $surat = $this->Template_model->getById($id);

        $nama = $surat->nama;
        $perihal = $surat->perihal;
        $date = $surat->tgl_kirim;
        $kepada = $surat->tujuan_surat;

        // Memanggil dan membaca template dokumen
        $alamat_file = base_url('assets/lap/contoh_surat.rtf');
        $document = file_get_contents($alamat_file);

        // Isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#PER", $perihal, $document);
        $document = str_replace("#SURAT_TO", $kepada, $document);
        $document = str_replace("#DATE", $date, $document);

        // Header untuk membuka file output RTF dengan Ms. Word
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=Laporan_contoh.doc");
        header("Content-length: ".strlen($document));
        echo $document;
    }
}

?>