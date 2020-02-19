<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        $this->load->model('M_penilaian');
        
    }
    
    public function index()
    {
        $data['nis'] = $this->M_siswa->generate_nis();
        $this->template->load('M_addtional', 'content/V_penilaian', $data); 
    }
    
    public function pertanyaan(){
        $this->template->load('M_addtional', 'content/V_master_pertanyaan'); 
    }

    public function get_pertanyaan(){
        $data = $this->M_penilaian->get_pertanyaan();

        $hasil = array();
        $result = array();
        $nomor = 0;
        foreach ($data as $pertanyaan) {
            $nomor ++;
            $pertanyaan->kategori_soal == "1" ? $soal = "Sulit" : $soal = "Mudah";
            $hasil[] = array(
                        'nomor' => $nomor,
                        'pertanyaan' => $pertanyaan->pertanyaan,
                        'kategori_soal' => $soal,
                        'action' => '<button class="btn btn-primary btn-xs" id="btn_edit"
                                     data-pertanyaan="'.$pertanyaan->pertanyaan.'"
                                     data-kategori_soal="'.$pertanyaan->kategori_soal .'"
                                    ><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs" id="btn_delete"
                                     data-nomor="'.$pertanyaan->nomor.'"><i class="fa fa-trash"></i></button>'
            );
        }

        $result = array('aaData' => $hasil);
        echo json_encode($result);
    }



}

/* End of file Penilaian.php */
