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
		foreach($images as $image){
			$this->db->insert($this->image,$image);	
		}
		
		if(!$this->db->trans_status() === FALSE){
			$this->db->trans_commit();
			return true;
		}else{
			foreach($images as $image){
				unlink('./assets/img/uploads/'.$image['route_image']);
			}
			
			$this->db->trans_rollback();
			return false;
		}
	}

	public function getRooms($user){
		return $this->db->query("SELECT r.id_room,
							 	r.number_room,
							 	r.description_room,
							 	r.double_bed_room,
							 	r.single_bed_room,
							 	r.bunk_bed_room,
							 	ri.route_image,
							 	rk.name_room_kind,
							 	ki.kind_image_route	
								FROM rooms r
									inner join room_kinds rk on
										rk.id_room_kind = r.id_room_kind
									left join kind_images ki on
										ki.id_room_kind = rk.id_room_kind
									left join room_image ri on
										ri.id_room = r.id_room
								WHERE r.id_user = ".$user."
								GROUP BY r.id_room")->result_array();
	}
}

/* End of file RoomModel.php */
/* Location: ./application/models/RoomModel.php */