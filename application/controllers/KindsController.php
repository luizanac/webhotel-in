<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KindsController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['kinds'] = $this->KindRoomModel->getKinds($this->session->userdata('id_user'));
		$data['user'] = $this->session->userdata();
		$this->template->load('template/template','kindRooms/kindRoomsView.php',$data);
	}

	public function newKind(){
		$this->form_validation->set_rules('nameKind', 'fieldlabel', 'trim|required');

		if($this->form_validation->run()){

			var_dump($this->input->post('tariffs[]'));
			$filesCount = count($_FILES['userfiles']['name']);
			$images = [];
			if($id_room_kind = $this->KindRoomModel->insertKind(
				array(
					'id_user' => $this->session->userdata('id_user'),
					'name_room_kind' => $this->input->post('nameKind')
					),$this->input->post('features[]'),$this->input->post('tariffs[]')
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
							$images[$i]['kind_image_route'] = $fileData['file_name'];
							$images[$i]['id_room_kind'] = $id_room_kind->id_room_kind;
						}
					}
				}
				
				if($this->KindRoomModel->insertImage($images)){
					echo "Formulário enviado!";
				}else{
					echo "Falha ao enviar imagens!";
				}				
			}else{
				echo "Falha ao enviar formulário!";
			}
		}else{
			$data['features'] = $this->FeatureRoomModel->getFeatures($this->session->userdata('id_user'));
			$data['tariffs'] = $this->TariffModel->getTariffs($this->session->userdata('id_user'));
			$data['user'] = $this->session->userdata();
			$this->template->load('template/template','kindRooms/newKindRoomsView',$data);
		}
	}

	public function update($id){
		$this->form_validation->set_rules('nameKind', 'fieldlabel', 'trim|required');

		if($this->form_validation->run()){

			var_dump($this->input->post('tariffs[]'));
			$filesCount = count($_FILES['userfiles']['name']);
			$images = [];
			if($id_room_kind = $this->KindRoomModel->insertKind(
				array(
					'id_user' => $this->session->userdata('id_user'),
					'name_room_kind' => $this->input->post('nameKind')
					),$this->input->post('features[]'),$this->input->post('tariffs[]')
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
							$images[$i]['kind_image_route'] = $fileData['file_name'];
							$images[$i]['id_room_kind'] = $id_room_kind->id_room_kind;
						}
					}
				}
				
				if($this->KindRoomModel->insertImage($images)){
					echo "Formulário enviado!";
				}else{
					echo "Falha ao enviar imagens!";
				}				
			}else{
				echo "Falha ao enviar formulário!";
			}
		}else{
			$data['features'] = $this->FeatureRoomModel->getFeatures($this->session->userdata('id_user'));
			$data['tariffs'] = $this->TariffModel->getTariffs($this->session->userdata('id_user'));
			$data['kinds'] = $this->KindRoomModel->getById($id);
			$data['user'] = $this->session->userdata();
			$this->template->load('template/template','kindRooms/updateKindRoomsView',$data);
		}
	}
}

/* End of file KindRoomController.php */
/* Location: ./application/controllers/KindRoomController.php */