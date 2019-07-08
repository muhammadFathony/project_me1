<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_produk');
        $this->load->model('M_Kelola_Permintaan');
        $this->load->model('M_Kelola_Stok');
        $this->load->model('M_trend');
        $this->load->model('M_Chart');
		if (!$this->session->userdata('log_in')) {
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['cek_stok'] = $this->M_Chart->stok_habis();
		$data['top_rate_out'] = $this->M_Chart->top_rate_out();
		$data['top_rate_in'] = $this->M_Chart->top_rate_in();
		$data['data'] = $this->M_Chart->list_barang();
		$data['transaksi'] = $this->M_Chart->list_permintaan();
		$data['chart_out'] = $this->M_Chart->chart_out();
		$data['chart_in'] = $this->M_Chart->chart_in();
		$data['each_month'] = $this->M_Chart->each_month();
		$this->template->load('M_used','content/C_chart', $data);	
	}

	function cek_stok()
	{
		$data['cek_stok'] = $this->M_Chart->stok_habis();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
}
