<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Model {

	public function ubah_in($relative_list)
	{
		for ($i=0; $i < count($relative_list) ; $i++) { 
			$data[] = array(
				'id_tmasuk' => $relative_list[$i]['id_tmasuk'],
				'status' => '0'
			);
		}
		try {
			for ($i=0; $i < count($relative_list) ; $i++) { 
				$this->db->where('id_tmasuk', $relative_list[$i]['id_tmasuk']);
				$this->db->update('transaksimasuk1', $data[$i]);
			}
			return 'success';
		} catch (Exception $e) {
			return 'failed';
		}
	}

	function ubah_out($relative_list){
		for ($i=0; $i < count($relative_list) ; $i++) { 
			$data[] = array(
				'id_tkeluar' => $relative_list[$i]['id_tkeluar'],
				'status' => '0'
			);
		}
		try {
			for ($i=0; $i < count($relative_list) ; $i++) { 
				$this->db->where('id_tkeluar', $relative_list[$i]['id_tkeluar']);
				$this->db->update('transaksikeluar', $data[$i]);
			}
			return 'success';
		} catch (Exception $e) {
			return 'failed';
		}
	}

	function list_out()
	{
		$this->db->select('*');
		$this->db->from('transaksikeluar');
		$this->db->where('status', 1);
		$this->db->order_by('tanggal', 'desc');
		$this->db->limit(5);
		$result = $this->db->get();
		return $result->result();
	}

	function list_in()
	{
		$this->db->select('*');
		$this->db->from('transaksimasuk1');
		$this->db->join('supplier', 'transaksimasuk1.id_supplier = supplier.id_supplier', 'inner');
		$this->db->where('transaksimasuk1.status', 1);
		$this->db->order_by('transaksimasuk1.tanggal', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	function update_each_in($id_tmasuk)
	{
		$this->db->set('id_tmasuk', $id_tmasuk);
		$this->db->set('status', 0);
		$this->db->where('id_tmasuk', $id_tmasuk);
		$data = $this->db->update('transaksimasuk1');
		return $data;
	}

	function update_each_out($id_tkeluar)
	{
		$this->db->set('id_tkeluar', $id_tkeluar);
		$this->db->set('status', 0);
		$this->db->where('id_tkeluar', $id_tkeluar);
		$data = $this->db->update('transaksikeluar');
		return $data;
	}

}

/* End of file Notif.php */
/* Location: ./application/models/Notif.php */