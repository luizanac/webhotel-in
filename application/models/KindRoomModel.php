<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KindRoomModel extends CI_Model {

	private $table = "room_kinds";
	private $image = "kind_images";

	public function getKinds($user){
		$this->db->join('users', 'users.id_user=room_kinds.id_user');
		$this->db->where("room_kinds.id_user =".$user);
		$result = $this->db->get($this->table)->result_array();
		return !empty($result)?$result:false;
	}

	public function insertKind($kind,$features,$tariffs){
		$this->db->trans_begin();
		if($this->db->insert($this->table,$kind) > 0){
			$this->db->limit('1');
			$this->db->select('id_room_kind');
			$this->db->join('users','users.id_user = room_kinds.id_user');
			$this->db->where('room_kinds.id_user ='.$this->session->userdata('id_user'));
			$this->db->order_by('id_room_kind','desc');
			$id_room_kind = $this->db->get($this->table)->row();
			if(isset($id_room_kind)){

				if(!empty($features)){
					foreach ($features as $feature) {
						$room_feature = array('id_feature' => $feature, 'id_room_kind' => $id_room_kind->id_room_kind);
						$this->db->insert("room_features",$room_feature);
					}
				}

				if(!empty($tariffs)){
					foreach($tariffs as $tariff){
						$tariff_has_room_kinds = array('id_room_kind ' => $id_room_kind->id_room_kind, 'id_tariff' => $tariff);
						$this->db->insert('tariff_has_room_kinds',$tariff_has_room_kinds);
					}
				}

				return $id_room_kind;
			}else{
				return false;
			}
		}
	}

	public function insertImage($images){
		foreach ($images as $image) {
			$this->db->insert($this->image,$image);
		}

		if(!$this->db->trans_status() === FALSE){
			$this->db->trans_commit();
			return true;
		}else{
			foreach ($images as $image){
				unlink('./assets/img/uploads/'.$image['kind_image_route']);
			}
			$this->db->trans_rollback();
			return false;
		}
	}
}

/* End of file KindRoomModel.php */
/* Location: ./application/models/KindRoomModel.php */