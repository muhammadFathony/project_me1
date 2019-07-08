<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kelola_Stok extends CI_Model {

	public function addlist($id_tag, $id_tmasuk)
	{	   
        $kd_barang = $this->input->post('kd_barang');
        $nm_barang = $this->input->post('nm_barang');
        $id_kategori = $this->input->post('kategori');
        $jumlah = $_POST['jumlah'];
        
        $this->db->select('*');
        $this->db->where('id_tag', $id_tag);
        $this->db->where('id_tmasuk', $id_tmasuk);
        $query = $this->db->get('tbsementara');
        if ($query->num_rows() > 0 ) {
            echo json_encode(array('sudah_masuk' => $query->result()));
        } else {
        $this->db->select('*');
        $this->db->from('master_barang');
        $this->db->where('kd_barang', $kd_barang);
        $cek = $this->db->get()->row();
        if ($jumlah >= $cek->min_stok) {
            echo json_encode(array('over_order'=> $cek));
        } elseif ($cek->min_stok < $cek->stok) {
            echo json_encode(array('stok_available' => $cek));
        } else {
        $object = array('id_tag' => $id_tag,
                        'id_tmasuk' => $id_tmasuk,
                        'kd_barang' => $kd_barang,
                        'jumlah' => $jumlah,
                        'nm_barang' => $nm_barang,
                        'status' => '1'
                         );

        return $this->db->insert('tbsementara', $object);
        }
	   }
    }

    function delete_list_manual()
    {
        
        $this->db->where('id_tag', 111);
        $result = $this->db->delete('tbsementara');
        return $result;
    }

    public function addlist_manual($id_tmasuk)
    {      
        $kd_barang = $this->input->post('kd_barang');
        $nm_barang = $this->input->post('nm_barang');
        $id_kategori = $this->input->post('kategori');
        $jumlah = $_POST['jumlah'];
        
      
        $this->db->select('*');
        $this->db->from('master_barang');
        $this->db->where('kd_barang', $kd_barang);
        $cek = $this->db->get()->row();
        if ($jumlah >= $cek->min_stok) {
            echo json_encode(array('over_order'=> $cek));
        } elseif ($cek->min_stok < $cek->stok) {
            echo json_encode(array('stok_available' => $cek));
        } else {
        $object = array('id_tag' => 111,
                        'id_tmasuk' => $id_tmasuk,
                        'kd_barang' => $kd_barang,
                        'jumlah' => $jumlah,
                        'nm_barang' => $nm_barang,
                        'status' => 1
                         );

        return $this->db->insert('tbsementara', $object);
        }
       
    }

    function solved($kode)
    {
        $this->db->where('kd_barang', $kode);
        $data = $this->db->get('master_barang');

        return $data;
    }

    // function get_kode_transaksi()
    // {
    //     $q = $this->db->query("SELECT MAX(RIGHT(id_tmasuk,5)) AS kode FROM transaksimasuk1");
    //     $kd = "";
    //     if($q->num_rows()>0){
    //         foreach($q->result() as $k){
    //             $tmp = ((int)$k->kode)+1;
    //             $kd = sprintf("%06s", $tmp);
    //         }
    //     }else{
    //         $kd = "00001";
    //     }
    //     return "MU".$kd;
    // }

    function get_kode_transaksi()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_tmasuk,3)) AS kode FROM transaksimasuk1");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "MU".$kd;
    }

    function list_transaksi()
    {
        $this->db->select('*');
        $this->db->from('tbsementara');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function liststokmasuk()
    {
       $data = $this->db->query("SELECT *, DATE_FORMAT(transaksimasuk1.tanggal, '%d-%M-%Y') as tanggal FROM transaksimasuk1 INNER JOIN transaksimasuk_detail1 ON transaksimasuk1.id_tmasuk = transaksimasuk_detail1.id_tmasuk INNER JOIN supplier ON transaksimasuk1.id_supplier = supplier.id_supplier INNER JOIN master_barang ON transaksimasuk_detail1.kd_barang = master_barang.kd_barang  ORDER BY transaksimasuk1.tanggal DESC");
        return $data->result();
    }

    function report_stok_masuk()
    {
        $this->db->select('*');
        $this->db->from('transaksimasuk1');
        $this->db->join('transaksimasuk_detail1', 'transaksimasuk1.id_tmasuk = transaksimasuk_detail1.id_tmasuk', 'inner');
        $this->db->join('supplier', 'transaksimasuk1.id_supplier = supplier.id_supplier', 'inner');
        $this->db->order_by('transaksimasuk1.id_tmasuk', 'desc');
        $data = $this->db->get();
        return $data->result();
    }

    function delete_list($id_tag)
    {
        
        $this->db->where('id_tag', $id_tag);
        $result = $this->db->delete('tbsementara');
        return $result;
    }

    function count_barang()
    {
        $query = $this->db->query("SELECT kd_barang, nm_barang, SUM(jumlah) AS jumlah FROM tbsementara WHERE status='1' GROUP by kd_barang");
        return $query->result();
    }

	function get_id_transaksi()
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


    function sementara()
    {
        $id_tag = $this->input->post('id_tag');
        $notransaksi = $this->input->post('notransaksi');
        $idtransaksi = $this->input->post('idtransaksi');
        $jumlah = $this->input->post('qty'); 

        $object = array('id_tag' =>$id_tag,
                        'notransaksi' =>$notransaksi,
                        'idtransaksi' =>$idtransaksi,
                        'jumlah' =>$jumlah
                     );
        return $this->db->insert('tbsementara', $object);
    }

    function save($relative_list, $id_tmasuk, $suplier, $tanggal)
    {
        $object = array('id_tmasuk' => $id_tmasuk,
                        'id_supplier' => $suplier,
                        'tanggal' => date('Y-m-d', strtotime($tanggal))
                         );
        $file = $this->db->insert('transaksimasuk1', $object);
        for($x = 0; $x < count($relative_list); $x++){
            $data[] = array (
                'id_tmasuk' => $id_tmasuk,
                'kd_barang' => $relative_list[$x]['kd_barang'],
                'nm_barang' => $relative_list[$x]['nm_barang'],
                'jumlah' => $relative_list[$x]['jumlah']
            );
          }
          try {
            for($x = 0; $x<count($relative_list); $x++){
                $this->db->insert('transaksimasuk_detail1', $data[$x]);
            }
            return 'success';
          } catch(Exception $e) {
            return 'failed';
          }
          return $file;
    }

    function save_manual($relative_list, $id_tmasuk, $suplier, $tanggal)
    {
        $object = array('id_tmasuk' => $id_tmasuk,
                        'id_supplier' => $suplier,
                        'tanggal' => date('Y-m-d', strtotime($tanggal))
                         );
        $file = $this->db->insert('transaksimasuk1', $object);
        for($x = 0; $x < count($relative_list); $x++){
            $data[] = array (
                'id_tmasuk' => $id_tmasuk,
                'kd_barang' => $relative_list[$x]['kd_barang'],
                'nm_barang' => $relative_list[$x]['nm_barang'],
                'jumlah' => $relative_list[$x]['jumlah']
            );
          }
          try {
            for($x = 0; $x<count($relative_list); $x++){
                $this->db->insert('transaksimasuk_detail1', $data[$x]);
            }
            return 'success';
          } catch(Exception $e) {
            return 'failed';
          }
          return $file;
    }

    function hapusstatus($delete_list)
    {
        for($x = 0; $x < count($delete_list); $x++){
            $data[] = array (
                
                'kd_barang' => $delete_list[$x]['kd_barang'],
                'nm_barang' => $delete_list[$x]['nm_barang'],
                'jumlah' => $delete_list[$x]['jumlah'],
                'status' => '0'
            );
          }
          try {
            for($x = 0; $x<count($delete_list); $x++){
                $this->db->where('id_tag', 111);
                $this->db->update('tbsementara', $data[$x]);
            }
            return 'success';
          } catch(Exception $e) {
            return 'failed';
          }
    }

    function full_auto($id_tag, $suplier)
    {
        $query = $this->db->query("SELECT master_barang.nm_barang, master_barang.id_supplier, master_barang.id_kategori, detail_barang.id_tag, detail_barang.kd_barang, master_barang.stok, master_barang.min_stok FROM detail_barang, master_barang WHERE detail_barang.kd_barang = master_barang.kd_barang AND detail_barang.status_keluar='0' AND detail_barang.id_tag='$id_tag' AND master_barang.id_supplier='$suplier'");
            if ($query->num_rows()>0) {
            foreach ($query->result() as $key) {
                $data = array('id_tag' => $key->id_tag,
                              'kd_barang' => $key->kd_barang,
                              'nm_barang' => $key->nm_barang,
                              'id_supplier' => $key->id_supplier,
                              'id_kategori' => $key->id_kategori,
                              'stok' => $key->stok,
                              'min_stok' => $key->min_stok
                            );
                return $data;
                }
            } else {
                
            }

    }
    function full_auto_manual($kd_barang, $suplier)
    {
        $query = $this->db->query("SELECT * from master_barang JOIN supplier ON master_barang.id_supplier=supplier.id_supplier JOIN kategori ON master_barang.id_kategori=kategori.id_kategori where master_barang.kd_barang='$kd_barang' AND master_barang.id_supplier='$suplier'");
            if ($query->num_rows()>0) {
            foreach ($query->result() as $key) {
                $data = array(
                              'kd_barang' => $key->kd_barang,
                              'nm_barang' => $key->nm_barang,
                              'id_supplier' => $key->id_supplier,
                              'id_kategori' => $key->id_kategori,
                              'stok' => $key->stok,
                              'min_stok' => $key->min_stok
                            );
                return $data;
                }
            } else {
                
            }

    }

    function hapus_tr_masuk()
    {
        $id_tmasuk = $this->input->post('id_tmasuk');
        $this->db->where('id_tmasuk', $id_tmasuk);
        $result = $this->db->delete('transaksimasuk_detail1');
        return $result;

    }

    function datatable()
    {
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

    function edit()
    {
        $id_tmasuk = $this->input->post('id_tmasuk');
        $nm_barang = $this->input->post('nm_barang');
        $jumlah = $this->input->post('jumlah');
        $id_supplier = $this->input->post('id_supplier');

        $this->db->set('id_supplier', $id_supplier);
        $this->db->set('id_tmasuk', $id_tmasuk);
        $this->db->where('id_tmasuk', $id_tmasuk);
        $result = $this->db->update('transaksimasuk1');
        if ($result) {
            $this->db->set('id_tmasuk', $id_tmasuk);
            $this->db->set('nm_barang', $nm_barang);
            $this->db->set('jumlah', $jumlah);
            $this->db->where('id_tmasuk', $id_tmasuk);
            $this->db->where('nm_barang', $nm_barang);
            $data = $this->db->update('transaksimasuk_detail1');
            return $data;
        }   
        return $result;

    }


}

/* End of file M_Kelola_Stok.php */
/* Location: ./application/models/M_Kelola_Stok.php */