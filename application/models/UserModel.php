<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	private $table = "users";

	public function getUser($login,$pass){
		$this->db->where('login_user',$login);
		$this->db->where('pass_user',$pass);
		if($this->db->get($this->table)->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getUserLog($login,$pass){
		$this->db->where('login_user', $login);
		$this->db->where('pass_user', $pass);
		$this->db->limit(1);
		$user = $this->db->get($this->table)->result_array();
		return $user > 0 ? $user : false;
	}	
}
/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */