<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_Stok extends CI_Controller {
//FITUR LIAT STOK MASUK SUDAH DONE
	function __construct(){
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->model('M_Kelola_Stok');
        $this->load->model('M_trend');
        if (!$this->session->userdata('log_in')) {
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
			redirect('login');
		}
    }

	public function index()
	{
		$kode = $this->uri->segment(3);
		$data['solved'] = $this->M_Kelola_Stok->solved($kode);
		$data['kd_barang'] = $this->input->get('kd_barang');
		$this->template->load('M_addtional', 'content/C_Kelola_stok', $data);
	}

	function test()
	{
		$kode = $this->uri->segment(3);
		$data['solved'] = $this->M_Kelola_Stok->solved($kode);
		$data['kd_barang'] = $this->input->get('kd_barang');
		$this->template->load('M_addtional', 'content/C_Kelola_stok_solved', $data);
	}

	function transaksi()
	{
		$data =  $this->M_Kelola_Stok->list_transaksi();
		echo json_encode($data);
	}

	function kode_transaksi_otomatis()
	{
		//DONE
		$data = $this->M_Kelola_Stok->get_kode_transaksi();
		echo json_encode($data);
	}

	function view_ledger()
	{
		$this->template->load('Trend','content/C_lihatstok_masuk');
		
	}
	function lihatstokmasuk()
	{
		$data = $this->M_Kelola_Stok->liststokmasuk();
		echo json_encode($data);
	}

	function edit()
	{
		$data = $this->M_Kelola_Stok->edit();
		echo json_encode($data);
	}
	function delete_list_tranksaksi()
	{
		$id_tag = $this->input->post('id_tag');
		$read = $this->db->select('*')
						->from('detail_barang')
						->where('id_tag', $id_tag)->get()->row();
		if ($read) {
			$data = $this->db->where('id_tag', $id_tag)->update('detail_barang', array('status' => 0, ));
			$data = $this->M_Kelola_Stok->delete_list($id_tag);
			echo json_encode($data);
		}
		
	}

	function add_tabel()
	{
		$this->form_validation->set_rules('id', 'nomor transaksi', 'trim|required');
		$this->form_validation->set_rules('id_tag', 'ID RFID', 'trim|required');
		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
		} else {
			$id_tmasuk = $this->input->post('id');
			$id_tag = $this->input->post('id_tag');
			$data = $this->db->where('id_tag', $id_tag)->update('detail_barang', array('status' => 1, ));
			$data = $this->M_Kelola_Stok->addlist($id_tag, $id_tmasuk);
			echo json_encode($data);
		}
	}

	function delete_list_tranksaksi_manual()
	{
		
			$data = $this->M_Kelola_Stok->delete_list_manual();
			echo json_encode($data);
		
	}

	function add_tabel_manual()
	{
		$this->form_validation->set_rules('id', 'nomor transaksi', 'trim|required');
		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
		} else {
			$id_tmasuk = $this->input->post('id');
			$data = $this->M_Kelola_Stok->addlist_manual( $id_tmasuk);
			echo json_encode($data);
		}
	}

	function save_count_manual()
	{
		$relative_list = $this->input->post('tbcount');
		$id_tmasuk = $this->input->post('id');
		$suplier = $this->input->post('suplier');
		$tanggal = $_POST['tanggal'];
		$status = $this->M_Kelola_Stok->save_manual($relative_list, $id_tmasuk, $suplier, $tanggal);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	function count()
	{
		$data = $this->M_Kelola_Stok->count_barang();
		echo json_encode($data);
	}

	function save_count()
	{
		$relative_list = $this->input->post('tbcount');
		$id_tmasuk = $this->input->post('id');
		$suplier = $this->input->post('suplier');
		$tanggal = $_POST['tanggal'];
		$status = $this->M_Kelola_Stok->save($relative_list, $id_tmasuk, $suplier, $tanggal);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	function hapus_count()
	{
		$delete_list = $this->input->post('tblist');
		
		$status = $this->M_Kelola_Stok->hapusstatus($delete_list);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	function autofilltambaharang()
	{
		$suplier = $this->input->post('suplier');
		$id_tag = $this->input->post('id_tag');
		if ($data = $this->M_Kelola_Stok->full_auto($id_tag, $suplier)) {
			echo json_encode($data);
		} else {
			echo json_encode(array('data'=>$data));
		}
	}

	function autofilltambaharang_manual()
	{
		$suplier = $this->input->post('suplier');
		$kd_barang = $this->input->post('kd_barang');
		if ($data = $this->M_Kelola_Stok->full_auto_manual($kd_barang, $suplier)) {
			echo json_encode($data);
		} else {
			echo json_encode(array('data'=>$data));
		}
	}

	function hapus_transaksi_masuk()
	{
		$data = $this->M_Kelola_Stok->hapus_tr_masuk();
		echo json_encode($data);
	}




}

