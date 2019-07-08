<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require ( dirname(__dir__, 2).'/vendor/autoload.php');

//FITUR LIHAT SUPLIER DONE
class Suplier extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('M_Suplier');
         if (!$this->session->userdata('log_in')) {
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
			redirect('login');
		}
    }

	public function index()
	{

		$this->template->load('M_addtional', 'content/C_Suplier');
	}

	public function pusherku(){
		 $options = array(
		    'cluster' => 'ap1',
		    'useTLS' => true
		  );
		  $pusher = new Pusher\Pusher(
		    'cd4a5f4ea7dbfce33aab',
		    'e26d3c536a90b8a0b0f8',
		    '769618',
		    $options
		  );

		  $data['message'] = 'hello toni';
		 $ok =  $pusher->trigger('my-channel', 'my-event', $data);
		$this->load->view('welcome_message');
	}

	function TambahSuplier()
	{

		$this->form_validation->set_rules('nama_supplier', 'Suplier', 'trim|required|alpha');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required' , array('required'=>'%s Harus di isi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
		} else {
			$data = $this->M_Suplier->tambahsuplier();
			echo json_encode($data);
		}
		
	}

	function LihatSuplier()
	{
		// $data['suplier'] = $this->M_Suplier->daftarsuplier();
		$this->template->load('trend', 'content/C_ListSup');
	}

	function update_suplier()
	{
		$data = $this->M_Suplier->ubah_suplier();
		echo json_encode($data);
	}

	function listsuplier()
	{
		$data = $this->M_Suplier->daftarsuplier();
		echo json_encode($data);
	}

	function listkategori()
	{
		$data = $this->M_Suplier->listkategori();
		echo json_encode($data);
	}

	function autofill_suplier()
	{
		$nama_supplier = $this->input->post('nama_supplier');
		$data = $this->M_Suplier->autofill($nama_supplier);
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode(array('Data'=>$data));
		}
		
		
	}

	function hapus()
	{
		$data = $this->M_Suplier->deletesuplier();
		echo json_encode($data);
	}

	function hapus_kategori()
	{
		$data = $this->M_Suplier->deletekategori();
		echo json_encode($data);
	}

	function tambah_kategori()
	{
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['rusak'=>$errors]);
		} else {
			$kategori = $this->input->post('kategori');
			$data = $this->M_Suplier->add_kategori($kategori);
			echo json_encode($data);
		}
		
	}
}

/* End of file Suplier.php */
/* Location: ./application/controllers/Suplier.php */