<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AvailableRoomsModel extends CI_Model {
	var $room = 'rooms';
	var $user = 'users';

	public function __construct() {
		parent::__construct();
	}
	public function getAvailableRomms(){
		$sql = $this->db->query("SELECT r.id_room,
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
								WHERE r.disabled_room = 0 AND r.id_user = 1
								GROUP BY r.number_room");

		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}
	public function getAvailableRommOne($id){	
		$sql = $this->db->query("SELECT r.id_room,
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
								WHERE r.disabled_room = 0 AND r.id_room = '$id'
								GROUP BY r.id_room");

		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}
	public function getAvailableRommOneImage($id){
		$sql = $this->db->query("SELECT
								ki.kind_image_route
								FROM kind_images ki
									inner join room_kinds rk
										on rk.id_room_kind = ki.id_room_kind
									inner join rooms r
										on r.id_room_kind = rk.id_room_kind
									left join room_image ri
										on ri.id_room = r.id_room
								WHERE r.id_room = '$id'");

		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}
}