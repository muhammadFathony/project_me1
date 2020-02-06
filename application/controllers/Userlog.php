<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//FITUR SELESAI SEMUA
class Userlog extends CI_Controller {
	function __construct(){

            parent:: __construct();
            $this->load->model('M_userlog');
            if (!$this->session->userdata('log_in')) {
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Jangan Lupa Login !!!</div>');
			redirect('login');
		}
   	}

	public function index()
	{
		// $this->load->view('Userlog');
		$this->template->load('Userlog', 'content/C_userlog');
	}

	function list_user()
	{
		$data =$this->M_userlog->GetUserlog();
		echo json_encode($data);
	}

	function daftar(){
		$this->form_validation->set_rules('nama', 'Username', 'trim|required|min_length[5]', array('required' => 'Username, harus di isi (min 5 huruf)', 'min_length' => 'Username, panjang karakter min 5 huruf'));
		$this->form_validation->set_rules('pasword', 'Password', 'trim|required|min_length[5]', array('required' => 'Password harus di isi'));
		$this->form_validation->set_rules('ulang', 'Repeat Password', 'required|matches[pasword]', array('matches' => 'Repeat Password harus sama'));
		$this->form_validation->set_rules('akses', 'Level', 'required', array('required' => 'Hak akses harus di isi')); 
		if ($this->form_validation->run() == FALSE) {
			$error = validation_errors();
			echo json_encode(['eror'=> $error]);
		} else {
			$username = $this->input->post('nama');
			$password = $this->input->post('pasword');
			$level = $this->input->post('akses');
			$exec = $this->M_userlog->GetResgister($username, $password, $level);
			echo json_encode($exec);
		}
	}
	

	function edit(){
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
		$this->form_validation->set_rules('level', 'Hak Akses', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
		} else {
			$password = $this->input->post('password');
			$encrypt = password_hash($password, PASSWORD_DEFAULT);
			$objcet = array('id_user' => $this->input->post('id_user'),
							'nama_user' => $this->input->post('nama_user'),
							
							'level' => $this->input->post('level')
						);
			$data = $this->M_userlog->edit($objcet, $encrypt, $password);
			echo json_encode($data);
		}
		
	}

	function hapus_user()
	{
		$id_user = $this->input->post('id_user');
		$data = $this->M_userlog->delete_user($id_user);
		echo json_encode($data);
	}
}

/* End of file Userlog.php */
/* Location: ./application/controllers/Userlog.php */