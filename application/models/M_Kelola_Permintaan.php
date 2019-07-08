<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kelola_Permintaan extends CI_Model {

	public function add_list_req($id_tag, $id_tkeluar)
	{
		
        $kd_barang = $this->input->post('kd_barang');
        $nm_barang = $this->input->post('nm_barang');
        $jumlah = $_POST['jumlah'];
        
        $object = array('id_tag' => $id_tag,
                        'id_tkeluar' => $id_tkeluar,
                        'kd_barang' => $kd_barang,
                        'jumlah' => $jumlah,
                        'nm_barang' => $nm_barang,
                        'status' => '1'
                         );

        return $this->db->insert('tbsementara2', $object);;
        
	}

    function cekstok($kd_barang)
    {
        $this->db->select('*');
        $this->db->from('master_barang');
        $this->db->where('kd_barang', $kd_barang);
        return $this->db->get()->row();
    }

	function list_transaksi()
    {
        $this->db->select('*');
        $this->db->from('tbsementara2');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    // function get_kode_transaksi()
    // {
    //     $q = $this->db->query("SELECT MAX(RIGHT(id_tkeluar,5)) AS kode FROM transaksikeluar");
    //     $kd = "";
    //     if($q->num_rows()>0){
    //         foreach($q->result() as $k){
    //             $tmp = ((int)$k->kode)+1;
    //             $kd = sprintf("%06s", $tmp);
    //         }
    //     }else{
    //         $kd = "00001";
    //     }
    //     return "MI".$kd;
    // }

    function get_kode_transaksi()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_tkeluar,3)) AS kode FROM transaksikeluar");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "MI".$kd;
    }


    function delete_list($id_tag)
    {
        
        $this->db->where('id_tag', $id_tag);
        $result = $this->db->delete('tbsementara2');
        return $result;
    }

     function count_barang_permintaan()
    {
        $query = $this->db->query("SELECT kd_barang, nm_barang, SUM(jumlah) AS jumlah FROM tbsementara2 WHERE status='1' GROUP by kd_barang");
        return $query->result();
    }

	function save_total($relative_list, $id_tkeluar, $departemen, $keterangan, $tanggal)
    {
       $object = array('id_tkeluar' => $id_tkeluar,
                        'departemen' => $departemen,
                    	'keterangan'=> $keterangan,
                        'tanggal' => date('Y-m-d', strtotime($tanggal))
                      );
       $file = $this->db->insert('transaksikeluar', $object);
        for($x = 0; $x < count($relative_list); $x++){
            $data[] = array (
                'id_tkeluar' => $id_tkeluar,
                'kd_barang' => $relative_list[$x]['kd_barang'],
                'nm_barang' => $relative_list[$x]['nm_barang'],
                'jumlah' => $relative_list[$x]['jumlah']
            );
          }
          try {
            for($x = 0; $x<count($relative_list); $x++){
                $this->db->insert('transaksikeluar_detail', $data[$x]);
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
                $this->db->where('id_tag', $delete_list[$x]['id_tag']);
                $this->db->update('tbsementara2', $data[$x]);
            }
            return 'success';
          } catch(Exception $e) {
            return 'failed';
          }
    }

    function daftar_permintaan()
    {
        $data = $this->db->query("SELECT *, DATE_FORMAT(transaksikeluar.tanggal, '%d-%M-%Y') as tanggal FROM transaksikeluar INNER JOIN transaksikeluar_detail ON transaksikeluar.id_tkeluar = transaksikeluar_detail.id_tkeluar INNER JOIN master_barang ON transaksikeluar_detail.kd_barang = master_barang.kd_barang ORDER BY transaksikeluar.tanggal DESC");
        
        return $data->result_array();
    }

    function ledger_keluar_tiapbarang()
    {
        $bulan = $this->input->post('bulan');
        $kd_barang = $this->input->post('kd_barang');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data = $this->db->query("SELECT transaksikeluar.tanggal,transaksikeluar.id_tkeluar,transaksikeluar_detail.nm_barang, transaksikeluar_detail.kd_barang, SUM(transaksikeluar_detail.jumlah) as total, transaksikeluar.departemen FROM transaksikeluar, transaksikeluar_detail WHERE transaksikeluar.id_tkeluar = transaksikeluar_detail.id_tkeluar AND DATE_FORMAT(transaksikeluar.tanggal, '%M %Y')='$bulan' AND transaksikeluar_detail.kd_barang='$kd_barang'");

        return $data->result_array();
                   
    }

    function getbulan()
    {
    	$data = $this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal,'%M %Y') AS bulan FROM transaksikeluar ORDER BY tanggal ASC");
    	return $data;
    }
    function full_auto($id_tag)
	{
		$query = $this->db->query("SELECT * FROM detail_barang, master_barang WHERE detail_barang.kd_barang = master_barang.kd_barang AND detail_barang.status_keluar='0' AND detail_barang.id_tag='$id_tag'");
			if ($query->num_rows()>0) {
			foreach ($query->result() as $key) {
				$data = array('id_tag' => $key->id_tag,
							  'kd_barang' => $key->kd_barang,
							  'nm_barang' => $key->nm_barang,
                              'stok' => $key->stok
							  
							);
				return $data;
				}
			}
	}

    function rekap($relative_list)
    {
        $bulan = $this->input->post('bulan');
        for($x = 0; $x < count($relative_list); $x++){
            $object[] = array (
                'id_tkeluar' => $relative_list[$x]['id_tkeluar'],
                'nm_barang' => $relative_list[$x]['nm_barang'],
                'kd_barang' => $relative_list[$x]['kd_barang'],
                'departemen' => $relative_list[$x]['departemen'],
                'tanggal' => $relative_list[$x]['tanggal'],
                'jumlah' => $relative_list[$x]['jumlah'],
                
            );
          }
          try {
            for($x = 0; $x<count($relative_list); $x++){
                $this->db->select('*');
                $this->db->where('kd_barang',$relative_list[$x]['kd_barang']);
                $this->db->where('id_tkeluar', $relative_list[$x]['id_tkeluar']);
                $query = $this->db->get('bahanTrendMoment');
                if ($query->num_rows()>0) {
                    echo json_encode(array('Data sudah ada'=>$query->result()));
                } else {
                $this->db->insert('bahanTrendMoment', $object[$x]);
                }
            }
            return 'success';
          } catch(Exception $e) {
            return 'failed';
          }
    }
    function hapus_permintaan()
    {     
        $id_tkeluar = $this->input->post('id_tkeluar');
        $this->db->where('id_tkeluar', $id_tkeluar);
        $result = $this->db->delete('transaksikeluar_detail');
        if ($result) {
            $this->db->where('id_tkeluar', $id_tkeluar);
            $object = $this->db->delete('transaksikeluar');
            return $object;
        }
        return $result;
    }

    function edit()
    {
        $id_tkeluar = $this->input->post('id_tkeluar');
        $jumlah = $this->input->post('jumlah');
        $departemen = $this->input->post('departemen');

        $this->db->set('id_tkeluar', $id_tkeluar);
        $this->db->set('departemen', $departemen);
        $this->db->where('id_tkeluar', $id_tkeluar);
        $result = $this->db->update('transaksikeluar');
        if ($result) {
            $this->db->set('id_tkeluar', $id_tkeluar);
            $this->db->set('jumlah', $jumlah);
            $this->db->where('id_tkeluar', $id_tkeluar);
            $object = $this->db->update('transaksikeluar_detail');
            return $object;
        }
        return $result;
    }
}

/* End of file M_Kelola_Permintaan.php */
/* Location: ./application/models/M_Kelola_Permintaan.php */