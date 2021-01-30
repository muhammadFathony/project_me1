<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	exit;
}
class Penyakit extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyakit');
        $this->load->model('M_gejala');
        
    }
    
    public function index()
    {
        $this->template->load('layout/V_layout', 'content/V_penyakit');
    }

    public function tambah_penyakit()
    {
        $this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'trim|required', array('required' => 'Kode Penyakit harus di isi'));
        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'trim|required', array('required' => 'Nama Penyakit harus di isi'));
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', array('required' => 'Deskripsi harus di isi'));
       
        $obj = array('kode_penyakit' => $this->input->post('kode_penyakit'),
                     'nama_penyakit' => $this->input->post('nama_penyakit'),
                     'deskripsi' => $this->input->post('deskripsi'),
        );

        if ($this->form_validation->run() == FALSE) {
            $error['error'] = validation_errors();
            $this->output->set_content_type('application/json')->set_output(json_encode($error));
            
        } else {
            $nmfile 					= 'penyakit'.$obj['nama_penyakit']. "_" .time();
			$config['file_name'] 		= $nmfile; 
			$config['upload_path'] = "./assets/img";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			//$config['encrypt_name']	= TRUE;
			$config['max_size'] = 10000;
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload("gambar") == "") {
				$error['error'] = 'Gambar harap di isi';
				$this->output->set_content_type('application/json')->set_output(json_encode($error));
			} else {
				$filefoto = $this->upload->do_upload("gambar");
				$data = $this->upload->data();
				$foto = $data['file_name'];

				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/'.$data['file_name'];
				$config['width'] = 1920;
				$config['height'] = 871;
				$config['quality'] = '50%';
				$config['new_image'] = './assets/thumb/'.$data['file_name'];

				$this->load->library('image_lib', $config);
                $this->image_lib->resize();
                
                $data = $this->M_penyakit->tambah_penyakit($obj, $foto);
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }

        }
    }

    public function delete_penyakit(){
        $id_penyakit = $this->input->post('id_penyakit');
        $table = 'penyakit';
        $key = 'id';
        if($id_penyakit == ""){
            $error['error'] = 'Kode Penyakit kosong';
            $this->output->set_content_type('application/json')->set_output(json_encode($error));
        }else{
            $data = $this->M_gejala->_delete($id_penyakit, $key, $table);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function get_penyakit(){
        $data = $this->db->get('penyakit')->result();

        $hasil = array();
        $result = array();
        $nomor = 0;
        foreach ($data as $penyakit) {
            $nomor ++;
            $hasil[] = array(
                        'nomor' => $nomor,
                        'kode_penyakit' => $penyakit->kode_penyakit,
                        'nama_penyakit' => $penyakit->nama_penyakit,
                        'deskripsi' => $penyakit->deskripsi,
                        'action' => '<button class="btn btn-primary btn-xs" id="btn_edit"
                                     data-id_penyakit="'.$penyakit->id.'"
                                     data-kode_penyakit="'.$penyakit->kode_penyakit.'"
                                     data-nama_penyakit="'.$penyakit->nama_penyakit.'"
                                     data-deskripsi="'.$penyakit->deskripsi.'"
                                     data-gambar="'.$penyakit->gambar .'"
                                    ><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs" id="btn_delete"
                                     data-id_penyakit="'.$penyakit->id.'"><i class="fa fa-trash"></i></button>'
            );
        }

        $result = array('aaData' => $hasil);
        echo json_encode($result);
    }

    public function edit_penyakit(){
        $this->form_validation->set_rules('edt_nama_penyakit', 'Nama Penyakit', 'trim|required', array('required' => 'Nama penyakit harus di isi'));
        $this->form_validation->set_rules('edt_deskripsi', 'Deskripsi', 'trim|required', array('required' => 'Deskripsi harus di isi'));
        
        $obj = array(
                     'nama_penyakit' => $this->input->post('edt_nama_penyakit'),
                     'deskripsi' => $this->input->post('edt_deskripsi'),
                     'id_penyakit' => $this->input->post('id_penyakit')
        );

        if ($this->form_validation->run() == FALSE) {
            $error['error'] = validation_errors();
            $this->output->set_content_type('application/json')->set_output(json_encode($error));
            
        } else {
            $nmfile 					= 'penyakit'.$obj['nama_penyakit']. "_" .time();
			$config['file_name'] 		= $nmfile; 
			$config['upload_path'] = "./assets/img";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			//$config['encrypt_name']	= TRUE;
			$config['max_size'] = 10000;
			$this->load->library('upload', $config);
		
			$filefoto = $this->upload->do_upload("edt_gambar");
			$data = $this->upload->data();
			$foto = $data['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/'.$data['file_name'];
			$config['width'] = 1920;
			$config['height'] = 871;
			$config['quality'] = '50%';
			$config['new_image'] = './assets/thumb/'.$data['file_name'];

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
            $data = $this->M_penyakit->edit_penyakit($obj, $filefoto, $foto);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function Api_get_penyakit()
    {
        $response= array('error' => true,
						 'Message' => 'Penyakit Kosong');
        $check = $this->db->get('penyakit');
        $data = $check->result();
        $hasil = array();
        foreach ($data as $penyakit) {
            $kode_penyakit = $penyakit->kode_penyakit;
            $nama_penyakit = $penyakit->nama_penyakit;
            $deskripsi = $penyakit->deskripsi;
            $gambar = $penyakit->gambar;
            $gejala = $this->db->select('g.nilai_bobot, g.nama_gejala, pd.*')->from('pivot_diagnosis pd')
                ->join('gejala g', 'pd.kode_gejala = g.kode_gejala', 'inner')->where('pd.kode_penyakit', $kode_penyakit)->get()->result();
            $ass_gejala = array();
            foreach ($gejala as $gejala) {
                $ass_gejala[] = array('id' => $gejala->id,'kode_gejala' => $gejala->kode_gejala, 'nama_gejala' => $gejala->nama_gejala, 'nilai_bobot' => floatval($gejala->nilai_bobot));
            }
            $penyebab = $this->db->select('id, nama_penyebab')->where('kode_penyakit', $kode_penyakit)->get('penyebab')->result();
            $solusi = $this->db->select('id, nama_saran')->where('kode_penyakit', $kode_penyakit)->get('saran')->result();
            $hasil[] = array('kode_penyakit' => $kode_penyakit,
                             'nama_penyakit' => $nama_penyakit,
                             'deskripsi' => $deskripsi,
                             'gambar' => $gambar,
                             'gejala' => $ass_gejala,
                             'penyebab' => $penyebab,
                             'solusi' => $solusi
            );
        }
        if ($check->num_rows() > 0 ) {
			$response = array('error' => FALSE, 'dataPenyakit' => $hasil, );
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$response['error'] = TRUE;
			$response['Message'] = 'Silahkan masukan data penyakit';
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
    }

    public function Api_get_penyakitbykode()
    {
        $response= array('error' => true,
                        'Message' => 'Penyakit Kosong');
        $kode = $this->input->post('kode');
        $check = $this->M_penyakit->api_get_bykode($kode);
        $data = $check->result();
        if($check->num_rows() >  0){
            $response['error'] = FALSE;
			$response['Message'] = 'Berhasil';
			$response['dataPenyakit'] = $data;
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
			$response['error'] = TRUE;
			$response['Message'] = 'Silahkan masukan data penyakit';
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
    }
}