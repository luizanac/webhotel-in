<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TariffModel extends CI_Model {

	private $table = "tariffs";

	public function getTariffs($user){
		$this->db->join('users','users.id_user=tariffs.id_user');
		$this->db->where("tariffs.id_user = $user");
		$tariffs = $this->db->get($this->table)->result_array();
		return $tariffs > 0 ? $tariffs : false;	
	}

	public function newTariff($tariff){
		return $this->db->insert($this->table, $tariff) > 0 ? TRUE : FALSE;
	}

}

/* End of file TariffModel.php */
/* Location: ./application/models/TariffModel.php */