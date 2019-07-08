<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trend extends CI_Model {

	public function Ambilbahan()
	{
		// $data = $this->db->query("SELECT * FROM `bahantrendmoment` WHERE `kd_barang`='bk0001' AND `id_tkeluar`='TK00001'");
		$this->db->select('*');
		$this->db->from('bahanTrendMoment');
		$this->db->where('kd_barang', 'bk0001');
		$this->db->where('id_tkeluar', 'TK00001');
		$data = $this->db->get();

		return $data->result();
	}

	function getbulan()
	{
		$data = $this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal,'%m') AS bulan, DATE_FORMAT(tanggal,'%M') AS bulan1 FROM bahantrendmoment");
		return $data;
	}

	function gettahun()
	{
		$data = $this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal,'%Y') AS tahun  FROM bahantrendmoment");
		return $data;
	}
	function bahan($awal, $akhir, $kd_barang)
    {
        $data = $this->db->query("SELECT nm_barang, kd_barang, jumlah, DATE_FORMAT(tanggal, '%M %Y') AS Bulan FROM bahantrendmoment WHERE kd_barang='$kd_barang' AND tanggal BETWEEN STR_TO_DATE('$awal','%d-%m-%Y') AND STR_TO_DATE('$akhir','%d-%m-%Y') ORDER BY bahantrendmoment.tanggal  ASC ");

        return $data->result_array();
    }

    function onchange($kd_barang)
    {
    	$this->db->select('*');
    	$this->db->from('master_barang');
    	$this->db->join('supplier', 'master_barang.id_supplier = supplier.id_supplier', 'inner');
    	$this->db->where('kd_barang', $kd_barang);
    	$data = $this->db->get();
    	if ($data->num_rows()>0) {
    		foreach ($data->result() as $key ) {
    			$object = array('kd_barang' => $key->kd_barang ,
    							'id_supplier' => $key->id_supplier 
    						);
    			return $object;
    		}
    	}
    	
    }

    function save()
    {
    	$akhir = $this->input->post('akhir');
    	$kd_barang = $this->input->post('kd_barang');
    	$hasil = $this->input->post('Trend');
    	$id_supplier = $this->input->post('id_supplier');

    	$data = array('tanggal' => date('Y-m-d', strtotime($akhir)) ,
    				'kd_barang' => $kd_barang,
    				'jumlah' => $hasil,
    				'id_supplier' => $id_supplier 
    			);
    	$result = $this->db->insert('PO', $data);
        if ($result) {
            $this->db->set('min_stok', $hasil);
            $this->db->where('kd_barang', $kd_barang);
            $query = $this->db->update('master_barang');

            return $query;
        }
    	return $result;
    }

    function list_PO()
    {
        $this->db->select('po.PO, master_barang.kd_barang, master_barang.nm_barang, supplier.nama_supplier, po.tanggal, po.jumlah');
        $this->db->from('po');
        $this->db->join('master_barang', 'po.kd_barang = master_barang.kd_barang', 'inner');
        $this->db->join('supplier', 'po.id_supplier = supplier.id_supplier', 'inner');
        $this->db->order_by('po.PO', 'desc');
        $data = $this->db->get();
        return $data->result();
    }
}

/* End of file M_trend.php */
/* Location: ./application/models/M_trend.php */