<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	function list_barang()
	{
		$this->db->select('*');
		$this->db->from('master_barang');
		$this->db->join('kategori', 'kategori.id_kategori = master_barang.id_kategori', 'inner');
		$this->db->join('supplier', 'master_barang.id_supplier = supplier.id_supplier', 'inner');
		$this->db->order_by('nm_barang', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_kobar()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kd_barang,3)) AS kode FROM master_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "TS".$kd;
	}
	
	function tambahbarang(){
		
		$kod = $this->M_produk->get_kobar();
		$suplier = $this->input->post('suplier');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$nama = $this->input->post('nama');
		$jumlah = $this->input->post('jumlah');
		$kategori = $this->input->post('kategori');	

		$object = array('kode_barang' =>$kod,
						'suplier' =>$suplier,
						'email' =>$email,
						'alamat' =>$alamat,
						'telepon' =>$telepon,
						'nama' => $nama,
						'jumlah' =>$jumlah,
						'kategori' =>$kategori
					 );
		return $this->db->insert('barang', $object);

	}

	function tambah_data()
	{
		// $kod = $this->M_produk->get_kobar();
		$kod = $this->input->post('kd_barang');
		$min_stok = $this->input->post('min_stok');
		$tag_rfid = $this->input->post('tag_rfid');
		$nm_barang = $this->input->post('nm_barang');
		$stok = $this->input->post('stok');	
		$kategori = $this->input->post('kategori');
		$supplier = $this->input->post('supplier');

		$object = array('kd_barang' =>$kod,
						'nm_barang' => $nm_barang,
						'min_stok' =>$min_stok,
						'stok' =>$stok,
						'id_kategori' => $kategori,
						'id_supplier' => $supplier
					 );
		return $this->db->insert('master_barang', $object);
		
	}

	function updatebarang()
	{
		$kod = $this->M_produk->get_kobar();
		$min_stok = $this->input->post('min_stok');
		$id_tag = $this->input->post('id_tag');
		$nm_barang = $this->input->post('nm_barang');
		$stok = $this->input->post('stok');	
		$kd_barang = $this->input->post('kd_barang');
		$kategori = $this->input->post('kategori');

		$this->db->set('nm_barang', $nm_barang);
		$this->db->set('min_stok', $min_stok);
		$this->db->set('stok', $stok);
		$this->db->set('id_kategori', $kategori);
		$this->db->where('kd_barang', $kd_barang);
		$result = $this->db->update('master_barang');
		return $result;
	}

	function deletebarang()
	{
		$kd_barang = $this->input->post('kd_barang');
		$this->db->where('kd_barang', $kd_barang);
		$result = $this->db->delete('master_barang');
		if ($result) {
			$this->db->where('kd_barang', $kd_barang);
			$object = $this->db->delete('detail_barang');
			return $object;
		}
		return $result;
	}


	function autofill_tag($tag_rfid)
	{
		$result = $this->db->query("SELECT * FROM detail_barang, master_barang WHERE detail_barang.kd_barang = master_barang.kd_barang AND detail_barang.id_tag='$tag_rfid'");
		if ($result->num_rows()>0) {
			foreach ($result->result() as $key) {
				$data = array('id_tag' => $key->id_tag,
							  'kd_barang' => $key->kd_barang,
							  'nm_barang' => $key->nm_barang,
							  'stok' => $key->stok,
							  'min_stok' => $key->min_stok,
							  'id_kategori' => $key->id_kategori,
							  'id_supplier' => $key->id_supplier
							);
				return $data;
			}
		} else {
			$this->db->select('*');
			$this->db->from('detail_barang');
			$this->db->where('id_tag', $tag_rfid);
			$query = $this->db->get();
			if ($query->num_rows()>0) { 
			foreach ($query->result() as $x) {
				$data = array('id_tag' => $x->id_tag,
							   'kd_barang' => $x->kd_barang
							);
			return $data;
			}
		}
			
		}
	}

	function register_tag()
	{
		
		$kod = $this->M_produk->get_kobar();
		$id_tag = $this->input->post('tag');
		$kode_barang = $this->input->post('kd_brg');

		$object = array('id_tag' => $id_tag,
						'kd_barang' => $kod,
						'status_tabel' => '1' );

		return $this->db->insert('detail_barang', $object);
	}

	function register_add_tag()
	{
		
		$kod = $this->M_produk->get_kobar();
		$id_tag = $this->input->post('tag');
		$kode_barang = $this->input->post('kd_brg');

		$object = array('id_tag' => $id_tag,
						'kd_barang' => $kode_barang,
						'status_tabel' => '1' );

		return $this->db->insert('detail_barang', $object);
	}

	function listtag()
	{
		$this->db->select('*');
        $this->db->from('detail_barang');
        $this->db->where('status_tabel', 1);
        $query = $this->db->get();
        return $query->result();
	}
	function deletefrom_list()
	{
		$id_tag = $this->input->post('id_tag');
		$this->db->where('id_tag', $id_tag);
		$data = $this->db->delete('detail_barang');
		return $data;

	}

	function ubahstatustabel($relative_list)
	{
		for($x = 0; $x < count($relative_list); $x++){
            $data[] = array (
                'id_tag' => $relative_list[$x]['id_tag'],
                'kd_barang' => $relative_list[$x]['kd_barang'],
                'status_tabel' => '0'
                
            );
          }
          try {
            for($x = 0; $x<count($relative_list); $x++){
            	$this->db->where('id_tag', $relative_list[$x]['id_tag']);
                $this->db->update('detail_barang', $data[$x]);
            }
            return 'success';
          } catch(Exception $e) {
            return 'failed';
          }
	}

	function laporan_barang_orderBY()
	{
		$this->db->select('*');
		$this->db->from('master_barang');
		$this->db->join('kategori', 'kategori.id_kategori = master_barang.id_kategori', 'left');
		$this->db->order_by('kategori');
		$query = $this->db->get();
		return $query->result_array();
	}

	function list_return()
	{
		$kd_barang = $this->input->post('kd_barang');
		$this->db->select('*');
        $this->db->from('detail_barang');
        $this->db->where('kd_barang', $kd_barang);
        $this->db->where('status_keluar', 1);
        $query = $this->db->get();
        return $query->result();
	}

	function EX_return()
	{
		$id_tag = $this->input->post('id_tag');
		$this->db->set('status', 0);
		$this->db->set('status_keluar', 0);
		$this->db->where('id_tag', $id_tag);
		$data = $this->db->update('detail_barang');
		return $data;
	}

	function Ex_delete()
	{
		$id_tag = $this->input->post('id_tag');
		$this->db->where('id_tag', $id_tag);
		$query = $this->db->delete('detail_barang');
		return $query;
	}

}

/* End of file M_produk.php */
/* Location: ./application/models/M_produk.php */