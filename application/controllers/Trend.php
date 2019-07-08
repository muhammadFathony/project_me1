<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trend extends CI_Controller {
function __construct(){

    parent:: __construct();
    $this->load->model('M_trend');
    $this->load->model('M_produk');
    if (!$this->session->userdata('log_in')) {
	$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
	redirect('login');
	}
		
}

	public function index()
	{
		$data['bulan1'] = $this->M_trend->getbulan();
		$data['tahun'] = $this->M_trend->gettahun();
		$data['tahun1'] = $this->M_trend->gettahun();
		$data['cek'] = $this->M_produk->list_barang();
		$this->template->load('M_addtional','content/C_Trend', $data);
	}

	function listbahan()
	{
		$data = $this->M_trend->Ambilbahan();
		echo json_encode($data);
	}

	function ambilwaktu()
	{
		$data = $this->M_trend->getbulan();
		echo json_encode($data);
	}

	function analis()
	{
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		$kd_barang = $this->input->post('kd_barang');
		$data = $this->M_trend->bahan($awal, $akhir, $kd_barang);
		echo json_encode($data);
	}

	function onchange()
	{
		$kd_barang = $this->input->post('kd_barang');
		$data = $this->M_trend->onchange($kd_barang);
		echo json_encode($data);
	}

	function save()
	{
		$this->form_validation->set_rules('akhir', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'trim|required');
		$this->form_validation->set_rules('id_supplier', 'Suplier', 'trim|required');
		$this->form_validation->set_rules('Trend', 'Hasil', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['eror'=>$errors]);
		} else {
			$data = $this->M_trend->save();
			echo json_encode($data);
		}

	}

	function lihat_pemesanan()
	{
		$this->template->load('Trend','content/C_Lihat_Pemesanan');
	}

	function list_PO()
	{
		$data = $this->M_trend->list_PO();
		echo json_encode($data);
	}

}

/* End of file Trend.php */
/* Location: ./application/controllers/Trend.php */