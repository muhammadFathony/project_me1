<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        $this->load->model('M_penilaian');
    }

    public function index()
    {
        $this->template->load('M_addtional', 'content/V_penilaian');
    }

    public function getSiswaByNis()
    {
        $nis = $this->input->get('nis');
        $data = $this->M_penilaian->getSiswaByNis($nis);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function simpanNilai()
    {
        $obj = array(
            'nis' => $this->input->post('nis'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'kelas' => $this->input->post('kelas'),
            'nilai' => $this->input->post('nilai'),
            'guru_penilai' => $this->session->userdata('nama_user')
        );

        $insert = $this->db->insert('penilaian', $obj);

        $this->output->set_content_type('application/json')->set_output(json_encode($insert));
    }
}

/* End of file Penilaian.php */
