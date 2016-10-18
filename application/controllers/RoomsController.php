<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomsController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['rooms'] = $this->RoomModel->getRooms($this->session->userdata('id_user'));
		$data['user'] = $this->session->userdata();
		$this->template->load('template/template','rooms/roomView',$data);
	}

	public function newRoom(){
		$this->form_validation->set_rules('number_room', 'fieldlabel', 'required');
		$this->form_validation->set_rules('single_bed_room', 'fieldlabel', 'required');
		$this->form_validation->set_rules('double_bed_room', 'fieldlabel', 'required');
		$this->form_validation->set_rules('bunk_bed_room', 'fieldlabel', 'required');
		$this->form_validation->set_rules('description_room', 'fieldlabel', 'required');

		if($this->form_validation->run()){
			$room = array(
				'number_room' => $this->input->post('number_room'),
				'single_bed_room' => $this->input->post('single_bed_room'),
				'double_bed_room' => $this->input->post('double_bed_room'),
				'bunk_bed_room' => $this->input->post('bunk_bed_room'),
				'description_room' => $this->input->post('description_room'),
				'id_user' => $this->session->userdata('id_user'),
				'id_room_kind' => $this->input->post('kind')
			);

			$id = $this->RoomModel->insertRoom($room);
			if($id != FALSE){
				if(!empty($_FILES['userfiles']['name'])){

					$filesCount = count($_FILES['userfiles']['name']);

					for($i = 0; $i < $filesCount; $i++){
						$_FILES['userfile']['name'] = $_FILES['userfiles']['name'][$i];
						$_FILES['userfile']['type'] = $_FILES['userfiles']['type'][$i];
						$_FILES['userfile']['tmp_name'] = $_FILES['userfiles']['tmp_name'][$i];
						$_FILES['userfile']['error'] = $_FILES['userfiles']['error'][$i];
						$_FILES['userfile']['size'] = $_FILES['userfiles']['size'][$i];

						$config['upload_path'] = './assets/img/uploads';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['encrypt_name'] = TRUE;
						$config['max_size']  = '10000';


						$this->upload->initialize($config);		

						if($this->upload->do_upload('userfile')){
							$fileData = $this->upload->data();
							$images['route_image'] = $fileData['file_name'];
							$images['id_room'] = $id->id_room;
							$this->RoomModel->insertImage($images);
						}
					}
				}

				echo "Enviado com sucesso!";

			}else{
				echo "Falha ao enviar!";
			}
		}else{
			$data['kinds'] = $this->KindRoomModel->getKinds($this->session->userdata('id_user'));
			$data['user'] = $this->session->userdata();
			$this->template->load('template/template','rooms/newRoomView',$data);
		}
	}
}
/* End of file RoomAdmController.php */
/* Location: ./application/controllers/RoomAdmController.php */