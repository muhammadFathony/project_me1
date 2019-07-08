<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Chart extends CI_Model {

	function stok_habis()
	{
		$this->db->select('*');
		$this->db->from('master_barang');
		$this->db->join('supplier', 'master_barang.id_supplier = supplier.id_supplier', 'inner');
		$this->db->where('stok < min_stok');
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}

	function list_barang()
	{
		$this->db->select('*');
		$this->db->from('master_barang');
		$this->db->join('kategori', 'kategori.id_kategori = master_barang.id_kategori', 'inner');
		$this->db->join('supplier', 'master_barang.id_supplier = supplier.id_supplier', 'inner');
		$this->db->limit(8);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key) {
				$hasil[] = $key;
			}
			return $hasil;
		}
	}

	function list_permintaan()
	{
		$this->db->select('*');
		$this->db->from('transaksikeluar_detail');
		$this->db->join('transaksikeluar', 'transaksikeluar.id_tkeluar = transaksikeluar_detail.id_tkeluar', 'left');
		$this->db->order_by('transaksikeluar.tanggal', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key) {
				$hasil[] = $key;
			}
			return $hasil;
		}

// 		$this->db->query("SELECT *, DATE_FORMAT(tanggal, '%M-%Y') as bulan, COUNT(id_tkeluar) as jumlah FROM transaksikeluar GROUP BY DATE_FORMAT(tanggal, '%M-%Y') ORDER BY `transaksikeluar`.`tanggal` DESC");
	}

	function top_rate_out()
	{
		$query = $this->db->query("SELECT *, DATE_FORMAT(transaksikeluar.tanggal, '%M-%Y') as tanggal, COUNT(transaksikeluar_detail.nm_barang) as bnyak_nama FROM transaksikeluar_detail INNER JOIN master_barang ON transaksikeluar_detail.kd_barang = master_barang.kd_barang INNER JOIN supplier ON master_barang.id_supplier = supplier.id_supplier INNER JOIN transaksikeluar ON transaksikeluar_detail.id_tkeluar = transaksikeluar.id_tkeluar GROUP BY transaksikeluar_detail.nm_barang ORDER BY bnyak_nama DESC LIMIT 5");
		return $query->result();
	}

	function top_rate_in()
	{
		$query = $this->db->query("SELECT *, COUNT(transaksimasuk_detail1.nm_barang) as bnyak_nama FROM transaksimasuk_detail1 INNER JOIN master_barang ON transaksimasuk_detail1.kd_barang = master_barang.kd_barang INNER JOIN supplier ON master_barang.id_supplier = supplier.id_supplier GROUP BY transaksimasuk_detail1.nm_barang ORDER BY bnyak_nama DESC LIMIT 5");
		return $query->result();
	}

	function chart_out()
	{
		$query = $this->db->query("SELECT DATE_FORMAT(tanggal,'%M') as bulan, COUNT(id_tkeluar) as total FROM transaksikeluar WHERE DATE_FORMAT(tanggal,'%m') BETWEEN 1 AND 12 GROUP BY MONTH(tanggal)");
		return $query->result();
	}

	function chart_in()
	{
		$query = $this->db->query("SELECT DATE_FORMAT(tanggal,'%M') as bulan, COUNT(id_tmasuk) as total FROM transaksimasuk1 WHERE DATE_FORMAT(tanggal,'%m') BETWEEN 1 AND 12 GROUP BY MONTH(tanggal)");
		return $query->result();
	}

	function each_month()
	{
		$query = $this->db->query("SELECT *, DATE_FORMAT(tanggal, '%M') as bulan1, COUNT(transaksikeluar.id_tkeluar) as jumlah1 FROM transaksikeluar INNER JOIN transaksikeluar_detail ON transaksikeluar.id_tkeluar = transaksikeluar_detail.id_tkeluar INNER JOIN master_barang ON transaksikeluar_detail.kd_barang = master_barang.kd_barang GROUP BY DATE_FORMAT(tanggal, '%M-%Y')  
ORDER BY tanggal DESC LIMIT 5");
		return $query->result();
	}


}

/* End of file M_Chart.php */
/* Location: ./application/models/M_Chart.php */