<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        
    }
    
    public function index()
    {
        $data['nis'] = $this->M_siswa->generate_nis();
        $this->template->load('M_addtional', 'content/V_penilaian', $data); 
    }

}

/* End of file Penilaian.php */
