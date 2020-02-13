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

	public function get_siswa()
	{
		$data = $this->db->select('*, DATE_FORMAT(ttl, "%d-%m-%Y") as tanggal_lahir')->from('siswa')->get()->result();
		
		return $data;
	}
 
    public function registrasi_siswa($obj)
    {
        $data = $this->db->insert('siswa', $obj);

        return $data;
        
	}
	
	public function update_siswa($obj)
	{
		$nis = $obj['nis'];

		$field = array('nama_lengkap' => $obj['nama_lengkap'],
					   'kelas' => $obj['kelas'],
					   'jenis_kelamin' => $obj['jenis_kelamin'],
					   'ttl' => $obj['ttl']
		);

		$data = $this->db->where('nis', $nis)->update('siswa', $field);
		
		return $data;
	}

	public function delete_siswa($nis)
	{
		$data = $this->db->where('nis', $nis)->delete('siswa');
		
		return $data;
	}
}