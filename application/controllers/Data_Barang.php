<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//SELESAI SEMUA
//FITUR LIHAT DATA BARANG SELESAI SEMUA
class Data_Barang extends CI_Controller {

	function __construct(){
       parent::__construct();
       $this->load->model('M_produk');
       $this->load->model('M_trend');
        if (!$this->session->userdata('log_in')) {
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
			redirect('login');
		}
    }

	public function index()
	{	
		//DONE
		$this->template->load('trend', 'content/C_LihatDaftarBarang');
	}

	function Barang()
	{
		//DONE
		$this->template->load('Trend', 'content/C_Data_Barang');
	}
	function daftar_barang()
	{
		//DONE JOIN
		$data = $this->M_produk->list_barang();
		echo json_encode($data);
	}

	function kodeotomatis()
	{
		//DONE
		$data = $this->M_produk->get_kobar();
		echo json_encode($data);
	}
	function tambahbarang_terbaru()
	{
		//DONE
		$this->form_validation->set_rules('tag', 'ID', 'trim|required');
		$this->form_validation->set_rules('kd_brg', 'kode barang', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['eror'=>$errors]);
		} else {
			$data = $this->M_produk->register_tag();
			echo json_encode($data);
		}
	}

	function tambahTAG_terbaru()
	{
		//DONE
		$this->form_validation->set_rules('tag', 'ID', 'trim|required');
		$this->form_validation->set_rules('kd_brg', 'kode barang', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['eror'=>$errors]);
		} else {
			$data = $this->M_produk->register_add_tag();
			echo json_encode($data);
		}
	}

	function list_tag()
	{
		//DONE
		$data =  $this->M_produk->listtag();
		echo json_encode($data);
	}

	function ubahliststatus()
	{
		//DONE
			$relative_list = $this->input->post('tblist');
			$status = $this->M_produk->ubahstatustabel($relative_list);
			$this->output->set_content_type('application/json')
			->set_output(json_encode(array('status' => $status)));
		
	}

	function delete_tag()
	{
		//DONE
		$data = $this->M_produk->deletefrom_list();
		echo json_encode($data);
	}

	function tambahbarang()
	{
		//DONE JOIN
		$this->form_validation->set_rules('tag_rfid', 'tag RFID', 'trim|required');
		$this->form_validation->set_rules('kd_barang', 'kode barang', 'trim|required');
		$this->form_validation->set_rules('nm_barang', 'nama barang', 'trim|required');
		$this->form_validation->set_rules('min_stok', 'min_stok', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('supplier', 'supplier', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['rusak'=>$errors]);
		} else {
			$data = $this->M_produk->tambah_data();
			echo json_encode($data);
		}
		
	}

	function ubahbarang()
	{
		//DONE JOIN
		$data = $this->M_produk->updatebarang();
		echo json_encode($data);
	}

	function hapusbarang()
	{
		//DONE
		$data = $this->M_produk->deletebarang();
		echo json_encode($data);
	}


	function auto_tag()
	{
		//DONE
		$tag_rfid = $this->input->post('tag_rfid');
		if ($data = $this->M_produk->autofill_tag($tag_rfid)) {
			echo json_encode($data);
		} else {
			echo json_encode(array('Data' =>$data));
		}

	}

	function list_return()
	{
		$data = $this->M_produk->list_return();
		echo json_encode($data);
	}

	function Ex_return()
	{

		$data = $this->M_produk->Ex_return();
		echo json_encode($data);
	}

	function Ex_delete()
	{
		//DONE
		$data = $this->M_produk->Ex_delete();
		echo json_encode($data);
	}

}
