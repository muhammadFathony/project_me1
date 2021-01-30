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
        $this->template->load('M_addtional', 'content/V_penilaian'); 
    }
    
    public function getSiswaByNis()
    {
        $nis = $this->input->get('nis');
        $data = $this->M_penilaian->getSiswaByNis($nis);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


}

/* End of file Penilaian.php */
