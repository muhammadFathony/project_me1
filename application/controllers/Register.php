<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->library('datatables');
    	$this->load->model('M_Kelola_Stok');
    }


	public function index()
	{
		
		$this->load->view('M_used');
		//$this->template->load('M_addtional', 'content/C_register');		
	}

	function tampil()
	{
		header('Content-Type: application/json');
		$this->load->library('datatables');
        // $this->datatables->select('*');
        // $this->datatables->from('karyawan');
        $this->datatables->select('*');
        $this->datatables->from('transaksimasuk1');
        $this->datatables->join('transaksimasuk_detail1', 'transaksimasuk1.id_tmasuk = transaksimasuk_detail1.id_tmasuk', 'inner');
        $this->datatables->join('supplier', 'supplier.id_supplier = transaksimasuk1.id_supplier', 'inner');
        // $data = $this->db->get();
        // return $data->result();

        return print_r($this->datatables->generate());
	}

	function tambah(){

		$this->form_validation->set_rules('suplier', 'suplier', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errorMessage', '<div class="alert alert-danger"> '.validation_errors() . 'Coba Daftar Lagi </div>');
			redirect('Register');
		} else {
				if ($query = $this->M_produk->tambahbarang()) {
				echo $this->session->set_flashdata('succesMessage', '<div class="alert alert-success alert-dismissible fade in" role="alert">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	                    </button>
	                    <strong>Succes to add</strong> User added by admin.
	                  </div>');
				redirect('Register');
				} else {
					$this->session->set_flashdata('errorMessage', '<div class="alert alert-warning alert-dismissible fade in" role="alert">
		                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		                    </button>
		                    <strong>Holy guacamole!</strong> Best check yo self, youre not looking too good.
		                  </div>');
				}
		}

	}

	function getAutoComplete(){
		if (isset($_GET['term'])) {
			$result = $this->M_produk->getbarang($_GET['term']);
			if (count($result)>0) {
				foreach ($result as $row) {
					$arr_result[] = $row->nama;
					echo json_encode($arr_result);
				}
			}
		}
	}

	function tambah_suplier(){
		$data['nama_supplier'] = $this->input->post('suplier');
		$data['email'] = $this->input->post('email');
		$data['alamat'] = $this->input->post('alamat');
		$data['telepon'] = $this->input->post('telepon');

		$this->db->insert('supplier', $data);

		$data = [
			'data'=>$data
		];
		return $data;
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */