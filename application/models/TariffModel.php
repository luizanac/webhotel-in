<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TariffModel extends CI_Model {

	public function getTariffs($user){
		$this->db->join('users','users.id_user=tariffs.id_user');
		$this->db->where("tariffs.id_user = $user");
		$tariffs = $this->db->get('tariffs')->result_array();
		return $tariffs > 0 ? $tariffs : false;	
	}

	public function new($tariff){
		return $this->db->insert($this->table, $tariff) > 0;
	}

	public function update($tariff,$id){
		$this->db->where('id_tariff',$id);
		$this->db->set($tariff);
		return  $this->db->update('tariffs') > 0;
	}

	public function delete($id){	
		$this->db->where('id_tariff', $id);
		$this->db->delete('tariffs');
		
		$error = $this->db->error();
		if ($error['code'] == 1451){
			return false;
		} 
		return true;
	}

	public function getById($id){
		$tariff = $this->db->get_where('tariffs', 'id_tariff ='.$id)->result_array();
		return $tariff > 0 ? $tariff : false;
	}

}

/* End of file TariffModel.php */
/* Location: ./application/models/TariffModel.php */