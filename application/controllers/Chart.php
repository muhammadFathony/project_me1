<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {
function __construct(){
	        parent::__construct();
	        $this->load->model('M_produk');
	        $this->load->model('M_Kelola_Permintaan');
	        $this->load->model('M_Kelola_Stok');
	        $this->load->model('M_trend');
	        $this->load->model('M_Chart');
	        
	 }

	public function index()
	{
		$data['cek'] = $this->M_produk->list_barang();
		$data['top_rate_out'] = $this->M_Chart->top_rate_out();
		$data['top_rate_in'] = $this->M_Chart->top_rate_in();
		$data['data'] = $this->M_Chart->list_barang();
		$data['transaksi'] = $this->M_Chart->list_permintaan();
		$data['chart_out'] = $this->M_Chart->chart_out();
		$this->template->load('M_addtional','content/C_chart', $data);		
	}

	function testing()
	{
		$data = $this->M_Chart->each_month();
		echo json_encode($data);
	}

}

/* End of file Chart.php */
/* Location: ./application/controllers/Chart.php */