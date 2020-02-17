<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function index()
    {
        $this->template->load('M_addtional', 'content/V_penilaian'); 
    }

}

/* End of file Penilaian.php */
