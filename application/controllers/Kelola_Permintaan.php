<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_Permintaan extends CI_Controller {
//FITUR LIAT PERMINTAAN SUDAH DONE
function __construct(){
        parent::__construct();
        $this->load->model('M_Kelola_Permintaan');
        $this->load->model('M_produk');
        $this->load->model('M_trend');
        if (!$this->session->userdata('log_in')) {
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
			redirect('login');
		}
    }

	public function index()
	{
		
		$this->template->load('M_addtional', 'content/C_KelolaPermintaan');
	}

	function add_tabel_permintaan()
	{
		$this->form_validation->set_rules('id_tkeluar', 'nomor transaksi', 'trim|required');
		$this->form_validation->set_rules('id_tag', 'ID RFID', 'trim|required');
		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'trim|required');
		$this->form_validation->set_rules('nm_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'trim|required');
		


		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['problem'=>$errors]);
		} else {
			$id_tkeluar = $this->input->post('id_tkeluar');
			$id_tag = $this->input->post('id_tag');
			$read = $this->db->select('*')
							->from('detail_barang')
							->where('id_tag', $id_tag)->get()->row();
			if ($read) {
				$kd_barang = $_POST['kd_barang'];
				$cek = $this->M_Kelola_Permintaan->cekstok($kd_barang);
				if ($_POST['jumlah'] > $cek->stok) {
					echo json_encode(array('stok_kurang' => $cek));
				} else {
				$data = $this->db->where('id_tag', $id_tag)->update('detail_barang', array('status_keluar' => 1, ));
				$data = $this->M_Kelola_Permintaan->add_list_req($id_tag, $id_tkeluar);
				echo json_encode($data);
				}
			}
		}
	}

	function transaksi_permintaan()
	{
		$data =  $this->M_Kelola_Permintaan->list_transaksi();
		echo json_encode($data);
	}

	function kode_transaksi_otomatis()
	{
		//DONE
		$data = $this->M_Kelola_Permintaan->get_kode_transaksi();
		echo json_encode($data);
	}

	function delete_list_tranksaksi_permintaan()
	{
		$id_tag = $this->input->post('id_tag');
		$read = $this->db->select('*')
						->from('detail_barang')
						->where('id_tag', $id_tag)->get()->row();
		if ($read) {
			$data = $this->db->where('id_tag', $id_tag)->update('detail_barang', array('status_keluar' => 0, ));
			$data = $this->M_Kelola_Permintaan->delete_list($id_tag);
			echo json_encode($data);
		}
		
	}
	function count_total_permintaan()
	{
		$data = $this->M_Kelola_Permintaan->count_barang_permintaan();
		echo json_encode($data);
	}

	function save_count_permintaan()
	{
		$relative_list = $this->input->post('tbcount');
		$tanggal = $this->input->post('tanggal');
		$id_tkeluar = $this->input->post('id');
		$keterangan = $this->input->post('keterangan');
		$departemen = $this->input->post('departemen');
		$status = $this->M_Kelola_Permintaan->save_total($relative_list, $id_tkeluar, $departemen, $keterangan, $tanggal);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	function hapus_count_permintaan()
	{
		$delete_list = $this->input->post('tblist');
		
		$status = $this->M_Kelola_Permintaan->hapusstatus($delete_list);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	function autofilltambahbarang()
	{
		$id_tag = $this->input->post('id_tag');
		if ($data = $this->M_Kelola_Permintaan->full_auto($id_tag)) {
			echo json_encode($data);
		} else {
			echo json_encode(array('data'=>$data));
		}
		
		
	}

	function lihatpermintaan()
	{
		$data['cek'] = $this->M_produk->list_barang();
		$data['bulan1'] = $this->M_Kelola_Permintaan->getbulan();
		$this->template->load('M_addtional', 'content/C_LihatPermintaan', $data);
	}

	function list_permintaan()
	{
		$data = $this->M_Kelola_Permintaan->daftar_permintaan();
		echo json_encode($data);
	}

	function lihatledger_barang()
	{
		
		$data = $this->M_Kelola_Permintaan->ledger_keluar_tiapbarang();
		echo json_encode($data);
	}

	function rekapdata_tiapbulan()
	{
		$relative_list = $this->input->post('tb_filter');
		$status = $this->M_Kelola_Permintaan->rekap($relative_list);
		$this->output->set_content_type('application/json');
		echo json_encode(array('status'=> $status ));
	}

	function hapus_transaksi_permintaan()
	{
		$data = $this->M_Kelola_Permintaan->hapus_permintaan();
		echo json_encode($data);
	}

	function edit()
	{
		$data = $this->M_Kelola_Permintaan->edit();
		echo json_encode($data);
	}

}

/* End of file Sample.php */
/* Location: ./application/controllers/Sample.php */