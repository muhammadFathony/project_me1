<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
function __construct(){
       parent::__construct();
       $this->load->model('Notif');
       
    }
	public function index()
	{
		$query = $this->db->query("SELECT * FROM `transaksimasuk1` WHERE status=1"); 
  		$total_masuk = $query->num_rows();
  		echo json_encode($total_masuk);
	}

	function list_in()
	{
		$data = $this->Notif->list_in();
		echo json_encode($data);
	}

	function notif_out()
	{
		$query = $this->db->query("SELECT * FROM `transaksikeluar` WHERE status=1"); 
  		$total_masuk = $query->num_rows();
  		echo json_encode($total_masuk);
	}

	function list_out()
	{
		$data = $this->Notif->list_out();
		echo json_encode($data);
	}

	function ubah_list_in()
	{
		$relative_list = $this->input->post('list_masuk');
		$status = $this->Notif->ubah_in($relative_list);
		$this->output->set_content_type('application/json');
		echo json_encode(array('status'=> $status));
	}

	function ubah_list_out()
	{
		$relative_list = $this->input->post('list_keluar');
		$status = $this->Notif->ubah_out($relative_list);
		$this->output->set_content_type('application/json');
		echo json_encode(array('status'=> $status));
	}

	function update_each_in()
	{
		$id_tmasuk = $this->input->post('id_tmasuk');
		$data = $this->Notif->update_each_in($id_tmasuk);
		echo json_encode($data);
	}

	function update_each_out()
	{
		$id_tkeluar = $this->input->post('id_tkeluar');
		$data = $this->Notif->update_each_out($id_tkeluar);
		echo json_encode($data);
	}

}

/* End of file Notification.php */
/* Location: ./application/controllers/Notification.php */