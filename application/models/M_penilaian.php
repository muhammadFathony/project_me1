<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

    public function get_pertanyaan(){
        
        $data = $this->db->select('*')->from('pertanyaan')->get()->result();

        return $data;
    }

}

/* End of file M_penilaian.php */
