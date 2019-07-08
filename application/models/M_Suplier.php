<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Suplier extends CI_Model {

	function daftarsuplier()
	{
		$this->db->select('*');
		$this->db->from('supplier');
		$this->db->order_by('id_supplier', 'desc');
		$data = $this->db->get();
		return $data->result_array();
	}

	function listkategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		//$this->db->order_by('id_kategori', 'desc');
		$data = $this->db->get();
		return $data->result();
	}

	function tambahsuplier()
	{
		$object = array('nama_supplier' => $_POST['nama_supplier'],
						'fax' => $_POST['fax'],
						'email' => $_POST['email'],
						'id_kategori' => $_POST['id_kategori'],
						'telepon' => $_POST['telepon'],
						'alamat' => $_POST['alamat'] );
		return $this->db->insert('supplier', $object);
	}

	function autofill($nama_supplier)
	{	
		
		$query = $this->db->select('*')
						->from('supplier')
						->where('nama_supplier', $nama_supplier)
						->get();
		if ($query->num_rows()>0 ) {
			foreach ($query->result() as $coba) {
			$data = array('nama_supplier' => $coba->nama_supplier,
							'alamat' => $coba->alamat,
							'id_kategori' => $coba->id_kategori,
							'email' => $coba->email,
							'telepon' => $coba->telepon,
							'fax' => $coba->fax 
						);
			return $data;
			}
		}
	}

	function ubah_suplier()
	{
		$nama_supplier= $this->input->post('nama_supplier');
		$alamat= $this->input->post('alamat');
		$kategori= $this->input->post('kategori');
		$email= $this->input->post('email');
		$telepon= $this->input->post('telepon');
		$fax= $this->input->post('fax');
		$id_supplier = $this->input->post('id_supplier');

		$this->db->set('nama_supplier', $nama_supplier);
		$this->db->set('alamat', $alamat);
		$this->db->set('id_kategori', $kategori);
		$this->db->set('email', $email);
		$this->db->set('telepon', $telepon);
		$this->db->set('fax', $fax);
		$this->db->where('id_supplier', $id_supplier);
		$result = $this->db->update('supplier');
		return $result;
	}

	function deletesuplier()
	{
		$id_supplier = $this->input->post('id_supplier');
		$this->db->where('id_supplier', $id_supplier);
		$result = $this->db->delete('supplier');
		return $result;
	}

	function deletekategori()
	{
		$id_kategori = $_POST['id_kategori'];
		$this->db->where('id_kategori', $id_kategori);
		$result = $this->db->delete('kategori');
		return $result;
	}	

	function add_kategori($kategori)
	{
		//$query = $this->db->query("INSERT INTO `kategori` (`kategori`) VALUES ('$kategori')");
		$this->db->set('kategori', $kategori);
		$query = $this->db->insert('kategori');
		return $query;
	}

	function report_suplier()
	{
		$this->db->select('*');
		$this->db->from('supplier');
		$this->db->join('kategori', 'kategori.id_kategori = supplier.id_kategori', 'inner');
		$query = $this->db->get();

		return $query->result();
	}

}

/* End of file suplier.php */
/* Location: ./application/models/suplier.php */