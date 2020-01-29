<?php
class Siswa extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        
    }
    

    public function index()
    {
        $this->template->load('M_addtional', 'content/V_formregistrasi');
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
}