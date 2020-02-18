<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_userlog extends CI_Model {

	function GetUserlog(){
		$this->db->select("*");
		$this->db->from("user");
		$this->db->order_by("id_user", "desc");
		$query = $this->db->get();
		return $query->result();
	}	

	function List_Gallery(){
		$this->db->select("*");
		$this->db->from("gallery");
		$query = $this->db->get();
		return $query->result_array();
	}

	function edit($objcet, $encrypt, $password)
	{
		$this->db->set("id_user", $objcet['id_user']);
		$this->db->set("nama_user", $objcet['nama_user']);
		$this->db->set("level",$objcet['level']);
		if($password != ''){
			$this->db->set("password", $encrypt);
		}
		$this->db->where("id_user", $objcet['id_user']);
		$data = $this->db->update("user");
		return $data;
	}

	function delete_user($id_user)
	{
		$this->db->where("id_user", $id_user);
		$data = $this->db->delete("user");
		return $data;
	}

	function login($nama_user){

		$query = $this->db->where("nama_user", $nama_user)->get("user");
		return $row = $query->row();
	}
	
	function GetResgister($nama_user, $password, $level){
	$encrypt_password = password_hash($password,PASSWORD_DEFAULT);
	$data = array (
		"nama_user" => "$nama_user",
		"password" => "$encrypt_password",
		"level" => "$level"
	);
	return $this->db->insert("user", $data);
	}
}

/* End of file M_userlog.php */
/* Location: ./application/models/M_userlog.php */