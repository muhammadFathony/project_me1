<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Siswa extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        
    }
    
    public function index()
    {
        $data['nis'] = $this->M_siswa->generate_nis();
        $this->template->load('M_addtional', 'content/V_formregistrasi', $data);
    }

    public function registrasi_siswa()
    {
        $this->form_validation->set_rules('nis', 'nis', 'trim|required', array('required' => 'NIS harus di isi'));
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required', array('required' => 'Nama lengkap harus di isi'));
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required', array('required' => 'Kelas harus di isi'));
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required', array('required' => 'Jenis kelamin harus di isi'));
        $this->form_validation->set_rules('ttl', 'ttl', 'trim|required', array('required' => 'Tanggal lahir harus di isi'));
        $dateku = strtotime($this->input->post('ttl'));
        $tanggal = date('Y-m-d', $dateku);
        $obj = array('nis' => $this->M_siswa->generate_nis(),
                     'nama_lengkap' => $this->input->post('nama_lengkap'),
                     'kelas' => $this->input->post('kelas'),
                     'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                     'ttl' => $tanggal
        );

        if ($this->form_validation->run() == FALSE) {
            $error['error'] = validation_errors();
            $this->output->set_content_type('application/json')->set_output(json_encode($error));
            
        } else {
            $data = $this->M_siswa->registrasi_siswa($obj);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function daftar_siswa(){
        $this->template->load('M_addtional', 'content/V_daftar_siswa');
    }

    public function get_daftar_siswa(){
        $data = $this->db->get('siswa')->result();

        $hasil = array();
        $result = array();
        $nomor = 0;
        foreach ($data as $siswa) {
            $nomor ++;
            $hasil[] = array(
                        'nomor' => $nomor,
                        'nis' => $siswa->nis,
                        'nama_lengkap' => $siswa->nama_lengkap,
                        'kelas' => $siswa->kelas,
                        'ttl' => $siswa->ttl,
                        'jenis_kelamin' => $siswa->jenis_kelamin,
                        'action' => '<button class="btn btn-primary btn-xs" id="btn_edit"
                                     data-nis="'.$siswa->nis.'"
                                     data-nama_lengkap="'.$siswa->nama_lengkap.'"
                                     data-kelas="'.$siswa->kelas.'"
                                     data-ttl="'.$siswa->ttl.'"
                                     data-jenis_kelamin="'.$siswa->jenis_kelamin .'"
                                    ><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs" id="btn_delete"
                                     data-nis="'.$siswa->nis.'"><i class="fa fa-trash"></i></button>'
            );
        }

        $result = array('aaData' => $hasil);
        echo json_encode($result);
    }

    public function update_siswa(){
        $this->form_validation->set_rules('nis', 'nis', 'trim|required', array('required' => 'NIS harus di isi'));
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required', array('required' => 'Nama lengkap harus di isi'));
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required', array('required' => 'Kelas harus di isi'));
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required', array('required' => 'Jenis kelamin harus di isi'));
        $this->form_validation->set_rules('ttl', 'ttl', 'trim|required', array('required' => 'Tanggal lahir harus di isi'));
        $dateku = strtotime($this->input->post('ttl'));
        $tanggal = date('Y-m-d', $dateku);
        $obj = array(
                     'nama_lengkap' => $this->input->post('nama_lengkap'),
                     'kelas' => $this->input->post('kelas'),
                     'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                     'ttl' => $tanggal
        );

        if ($this->form_validation->run() == FALSE) {
            $error['error'] = validation_errors();
            $this->output->set_content_type('application/json')->set_output(json_encode($error));
            
        } else {
            $data = $this->M_siswa->registrasi_siswa($obj);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
}