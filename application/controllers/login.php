<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {

	function __construct(){

            parent:: __construct();
            $this->load->model('M_userlog');   
        }

	public function index()
	{
		if ($this->session->userdata('log_in')==TRUE) {
			redirect('Home');
		} else {
		$this->load->view('Signin');
		}
	}

	function register() { 
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('level', 'level', 'trim|required|min_length[1]|max_length[12]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errorMessage', '<div class="alert alert-danger"> '.validation_errors() . 'Coba Daftar Lagi </div>');
			redirect('login.html#signup');
		} else {

		$csrf['csrf'] = array(
		        'name' => $this->security->get_csrf_token_name(),
		        'hash' => $this->security->get_csrf_hash()
		);

		$nama_user = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$exec = $this->M_userlog->GetResgister($nama_user, $password, $level, $csrf);
		if ($exec) {
			$this->session->set_flashdata('successMessage', '<div class="alert alert-success">Account Created Successfully</div>');
			redirect('login');
		} else{
			$this->session->set_flashdata('errorMessage', '<div class="alert alert-danger">Opps... Something Went Wrong Please Try Again.</div>');
			redirect('login');
			}	
		}
	}
	
	function login_validation(){
		$nama_user = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errorMessage', '<div class="alert-warning">'.validation_errors().'</div>');
			
		} else {
			
			$verify_login = $this->M_userlog->login($nama_user);
			if ($verify_login) {
				$hash_password = $verify_login->password;
				$hash = password_verify($password, $hash_password);
				if ($hash) {
					$userdata = array(
						'id_user' => "$verify_login->id_user",
						'nama_user' => "$verify_login->nama_user",
						'log_in' => true,
						'level' => "$verify_login->level"
					);
					$this->session->set_userdata( $userdata );
					$this->session->set_flashdata('successMessage', '<div class="alert alert-success">Berhasil Masuk, welcome &nbsp;'.$this->session->userdata['nama_user'].'</div>');
					if ($this->session->userdata('level') == "admin") {
						redirect('Userlog','refresh');
					} else if ($this->session->userdata('level') == "guru"){
						redirect('Userlog','refresh');
					} else {
						redirect('auth', 'refresh');
					}
				} else {
					$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Ada Kesalahan username / password </div>');
					redirect('auth','refresh');					
				}
			} else {
				$this->session->set_flashdata('errorMessage', '<div class="alert alert-danger">Akun tidak di temukan.</div>');
				redirect('auth','refresh');			
			}
		} 
	}
	
	function logout(){
		$data = array('id_user','nama_user','log_in','level' );
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('successMessage', '<div class="alert alert-success">Lagout Successfully</div>');
		redirect('auth','refresh');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */