<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	function __construct(){
	        parent::__construct();
		   $this->load->model('M_penilaian');   
	 }

	public function index()
	{
		$this->template->load('M_addtional', 'content/V_pertanyaan');
	}

	public function test()
	{
		echo "ok";
	}

	public function simpanSoal()
	{
		$soal = $this->input->post('soal');
		$simpan = $this->M_penilaian->simpanSoal($soal);
		
		$this->output->set_content_type('application/json')->set_output(json_encode($simpan));	
	}

	public function getPertanyaan()
	{
		$data = $this->db->get('pertanyaan')->result();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
	}

}

/* End of file Mused.php */
/* Location: ./application/controllers/Mused.php */