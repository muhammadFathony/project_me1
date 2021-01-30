<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

   public function getSiswaByNis($nis)
   {
       $data = $this->db->where('nis', $nis)->get('siswa')->row();

       return $data; 
   }

}

/* End of file M_penilaian.php */
