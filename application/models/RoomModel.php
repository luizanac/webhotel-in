<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomModel extends CI_Model {

	private $rooms = "rooms";
	private $image = "room_image";

	public function insertRoom($room){
		$this->db->trans_begin();
		if($this->db->insert($this->rooms,$room) > 0){
			$this->db->limit('1');
			$this->db->select('id_room');
			$this->db->order_by('id_room','desc');
			return $id = $this->db->get($this->rooms)->row();
		}else{
			return false;
		}
	}

	public function insertImage($images){
		$this->db->insert($this->image,$images);
		if(!$this->db->trans_status() === FALSE){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	public function getRooms($user){
		$this->db->select('*');
		$this->db->join('room_image','room_image.id_room = rooms.id_room');
		$this->db->join('users','rooms.id_user = users.id_user');
		$this->db->where('rooms.id_user ='.$user);

		return $this->db->get($this->rooms)->result_array();
	}
}

/* End of file RoomModel.php */
/* Location: ./application/models/RoomModel.php */