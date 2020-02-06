<?php

class M_siswa extends CI_Model{

    public function generate_nis()
	{
		date_default_timezone_set('Asia/Jakarta');
		$b = date("Ym");
    	 $this->db->select('RIGHT(nis,4) as kode', FALSE);
		  $this->db->order_by('nomor','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('siswa');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "NIS-".$b."-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

    public function registrasi_siswa($obj)
    {
        $data = $this->db->insert('siswa', $obj);

        return $data;
        
	}
	
	public function edit_siswa($obj)
	{
		$nis = $this->input->post('nis');
		$data = $this->db->where('nis', $nis)->db->update('siswa', $obj);
		
		return $data;
	}
}