<?php
class Siswa extends CI_Controller{

    public function index()
    {
        $this->template->load('M_addtional', 'content/V_formregistrasi');
    }
}