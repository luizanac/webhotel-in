<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeatureRoomModel extends CI_Model {

	private $table = "features";
	private $room_features = "room_features";

	public function newFeature($feature){
		if($this->db->insert($this->table, $feature) > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getFeatures(){
		$features = $this->db->get($this->table)->result_array();
		return $features > 0 ? $features : false;
	}

	public function delete($id){
		$this->db->where('id_feature',$id);
		$this->db->delete('features');
		
		$error = $this->db->error();
		if ($error['code'] == 1451){
			return false;
		} 
		return true;

	}

}

/* End of file FeatureRoomModel.php */
/* Location: ./application/models/FeatureRoomModel.php */