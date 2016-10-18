<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KindsController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['kinds'] = $this->KindRoomModel->getKinds();
		$data['user'] = $this->session->userdata();
		$this->template->load('template/template','kindRooms/kindRoomsView.php',$data);
	}

	public function newKind(){
		$this->form_validation->set_rules('nameKind', 'fieldlabel', 'trim|required');

		if($this->form_validation->run()){

			$filesCount = count($_FILES['userfiles']['name']);
			var_dump($filesCount);

			if($id_room_kind = $this->KindRoomModel->insertKind(
				array(
					'id_user' => $this->session->userdata('id_user'),
					'name_room_kind' => $this->input->post('nameKind')
					),$this->input->post('features[]')
				)){
				if(!empty($filesCount)){
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
							$images['kind_image_route'] = $fileData['file_name'];
							$images['id_room_kind'] = $id_room_kind->id_room_kind;
							$this->KindRoomModel->insertImage($images);
						}
					}
				}

				echo "Formulário enviado!";
			}else{
				echo "Falha ao enviar formulário!";
			}
		}else{
			$data['features'] = $this->FeatureRoomModel->getFeatures($this->session->userdata('id_user'));
			$data['user'] = $this->session->userdata();
			$this->template->load('template/template','kindRooms/newKindRoomsView',$data);
		}
	}
}

/* End of file KindRoomController.php */
/* Location: ./application/controllers/KindRoomController.php */