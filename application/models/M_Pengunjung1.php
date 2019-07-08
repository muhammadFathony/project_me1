<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengunjung extends CI_Model {

	public function set_pengunjung($user_ip)
	{
		$query=$this->db->query("INSERT INTO pengunjung (ip_pengunjung) VALUES ('$user_ip')");
		return $query;
	}
	
	function statistik_pengunjung()
	{
		$code = $this->db->query("SELECT DATE_FORMAT(tanggal_berkunjung,'%d') AS tanggal, COUNT(ip_pengunjung) AS jumlah_pengunjung FROM pengunjung WHERE MONTH(tanggal_berkunjung)=MONTH(CURDATE()) GROUP BY DATE (tanggal_berkunjung) ");
		if ($code->num_rows() > 0 ) {
			foreach ($code->result() as $key) {
				$hasil[] = $key;
			}
			return $hasil;
		}
	}

	function save_UserAgent($user_ip, $agent)
	{
		$query = $this->db->query("INSERT INTO pengunjung (ip_pengunjung, media_pengunjung) VALUES ('$user_ip','$agent')");
		return $query;
	}

	function cek_ip($user_ip)
	{
		$query = $this->db->query("SELECT pengunjung WHERE ip_pengunjung= '$user_ip' AND DATE (tanggal_berkunjung)=CURDATE()");
		return $query;
	}

	function count_visitor()
	{
		$user_ip=$_SERVER['REMOTE_ADDR'];
		if ($this->agent->is_browser()){
            $agent = $this->agent->browser();
        }elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot(); 
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent='Other';
        }
        $cek_ip = $this->db->query("SELECT * FROM pengunjung WHERE ip_pengunjung='$user_ip' AND DATE (tanggal_berkunjung)=CURDATE()");
        if ($cek_ip->num_rows() <= 0 ) {
        	$query = $this->db->query("INSERT INTO pengunjung (ip_pengunjung, media_pengunjung) VALUES ('$user_ip', '$agent')");
        	return $query;
        }

	}
}

/* End of file m_pengunjung.php */
/* Location: ./application/models/m_pengunjung.php */