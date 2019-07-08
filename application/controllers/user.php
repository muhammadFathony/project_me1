<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if ($this->agent->is_mobile())
		{
		       $agent = $this->agent->mobile();
		}
		elseif ($this->agent->is_robot())
		{
		        $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_browser())
		{
		         $agent = $this->agent->browser('$browsers').' '.$this->agent->version();
		}
		else
		{
		        $agent = 'Unidentified User Agent';
		}
		$ip =  $_SERVER['REMOTE_ADDR'];
		$code = $this->db->query("INSERT INTO pengunjung (ip_pengunjung,media_pengunjung) VALUES ('$ip','$agent')");
		echo "sukses";

		// echo $agent;
		// echo " //DAN //";
		// echo $_SERVER['REMOTE_ADDR'];
		// echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */