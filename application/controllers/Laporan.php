<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
	        parent::__construct();
	        $this->load->model('M_produk');
	        $this->load->model('M_Kelola_Permintaan');
	        $this->load->model('M_Kelola_Stok');
	        $this->load->model('M_trend');
	        $this->load->model('M_Suplier');
	        $this->load->library('Config_tcpdf');
	 }

	// public function index()
	// {
	// $data['data'] = $this->M_produk->laporan_barang_orderBY();
	// $this->template->load('M_used','content/C_Laporan_Daftar_Barang', $data);	
	// //$this->load->view('content/newreport', $data);	
	// }

	Public function DaftarBarang()
	{
		$data['data'] = $this->M_produk->laporan_barang_orderBY();
		$this->load->view('report/report_daftar_barang', $data);
	}

	function Laporan_StokMasuk()
	{
		$data['data'] = $this->M_produk->laporan_barang_orderBY();
		$this->load->view('report/report_daftar_barang', $data);
	}

	function laporan_permintaan()
	{
		$data['data'] = $this->M_Kelola_Permintaan->daftar_permintaan();
		$this->load->view('report/report_permintaan', $data);
	}

	function laporan_stok_masuk()
	{
		$data['data'] = $this->M_Kelola_Stok->report_stok_masuk();
		$this->load->view('report/report_stok_masuk', $data);
		//echo json_encode($data);
	}

	function laporan_pemesanan()
	{
		$data['data'] = $this->M_trend->list_PO();
		$this->load->view('report/report_pemesanan', $data);
	}

	function laporan_suplier()
	{
		$data['data'] = $this->M_Suplier->report_suplier();
		$this->load->view('report/report_suplier', $data);
	}

}

/* End of file Mused.php */
/* Location: ./application/controllers/Mused.php */