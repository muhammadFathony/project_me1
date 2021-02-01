<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

   public function getSiswaByNis($nis)
   {
       $data = $this->db->where('nis', $nis)->get('siswa')->row();

       return $data; 
   }

   public function simpanSoal($soal)
   {
       $obj = array('soal' => $soal);
       $insert = $this->db->insert('pertanyaan', $obj);
       return $insert;
   }

}

/* End of file M_penilaian.php */
