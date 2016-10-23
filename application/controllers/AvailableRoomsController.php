<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AvailableRoomsController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AvailableRoomsModel');
	}

	public function index(){
		$data['rooms'] = $this->getAvailableRomms();
		$this->load->view('teste', $data);
	}

	public function getAvailableRomms(){
		if($this->AvailableRoomsModel->getAvailableRomms()){
			return $this->AvailableRoomsModel->getAvailableRomms();
		}else{
			echo "Ocorreu algum erro para recuperar os quartos disponíveis.";
		}
	}

	public function teste(){
		$id = $this->input->post('id');
		$data['a'] =  $this->AvailableRoomsModel->getAvailableRommOne($id);
		$data['c'] =  $this->AvailableRoomsModel->getAvailableRommOneImage($id);
		$this->load->view('detalhe', $data);
	}
}
/* End of file AvailableRoomsController.php */
/* Location: ./application/controllers/AvailableRoomsController.php */
