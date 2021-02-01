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

    public function getSiswa()
    {
        $data = $this->db->get('siswa')->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
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
            'keterangan' => $this->input->post('keterangan'),
            'guru_penilai' => $this->session->userdata('nama_user')
        );

        $insert = $this->db->insert('penilaian', $obj);

        $this->output->set_content_type('application/json')->set_output(json_encode($insert));
    }

    public function getNilaiSiswa()
    {
        $data= $this->db->order_by('created_at', 'desc')->get('penilaian')->result();
        $result = array();
        $final = array();
        $nomor = 0;
        foreach ($data as $key => $value) {
            $nomor++;
            $result[] = array(
                'nomor' => $nomor,
                'nis' => $value->nis,
                'nama_lengkap' => $value->nama_lengkap,
                'kelas'=> $value->kelas,
                'nilai' => $value->nilai,
                'keterangan' => $value->keterangan,
                'action' => '<button class="btn btn-success btn-xs"
                            data-nomor="'.$value->nomor.'"
                            data-nis="'.$value->nis.'"
                            data-nama_lengkap="'.$value->nama_lengkap.'"
                            data-kelas="'.$value->kelas.'"
                            data-nilai="'.$value->nilai.'"
                            id="btn_edit"
                            >
                            <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-xs btn-danger"
                            data-nis="'.$value->nis.'"
                            data-nomor="'.$value->nomor.'"
                            id="btn_delete"
                            ><i class="fa fa-trash"></i>
                            </button>
                            '
            );
        } 
        $final = array('aaData' => $result);       
        $this->output->set_content_type('application/json')->set_output(json_encode($final));
    }

    public function deleteNilai($nomor, $nis)
    {
        $delete = $this->db->where('nomor', $nomor)->where('nis', $nis)->delete('penilaian');
        $this->output->set_content_type('application/json')->set_output(json_encode($delete));
    }

    public function editNilai()
    {
        $nis = $this->input->post('nis');
        $nomor = $this->input->post('nomor');
   
        $obj = array(
            'nilai' => $this->input->post('nilai'),
        );

        $update = $this->db->where('nis', $nis)->where('nomor', $nomor)->update('penilaian', $obj);

        $this->output->set_content_type('application/json')->set_output(json_encode($update));
    }
}

/* End of file Penilaian.php */
