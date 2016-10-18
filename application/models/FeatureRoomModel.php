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

	public function deleteFeature($id_feature){
		if($this->db->get($this->room_features,$id_feature) > 0){
			return false;
		}else{
			if($this->db->delete($this->table, $id_feature) > 0){
				return true;
			}
		}
	}

}

/* End of file FeatureRoomModel.php */
/* Location: ./application/models/FeatureRoomModel.php */