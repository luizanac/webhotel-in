<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TariffsController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['tariffs'] = $this->TariffModel->getTariffs($this->session->userdata('id_user'));
		$data['user'] = $this->session->userdata();
		$this->template->load('template/template','tariff/tariffView',$data);
	}

	public function newTariff(){
		$this->form_validation->set_rules('tariff[name_tariff]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[base_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[adult_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[children_price]', 'fieldlabel', 'trim|required');

		if ($this->form_validation->run()) {
			$tariff = $this->input->post('tariff');
			$tariff['id_user'] = $this->session->userdata('id_user');
			if($this->TariffModel->newTariff($tariff)){
				echo "Formulário enviado!";
			}else{
				echo "Falha ao enviar form!";
			}
		} else {	
			$data['user'] = $this->session->userdata();
			$this->template->load('template/template','tariff/newTariffView',$data);
		}
	}
}
/* End of file TariffRoomController.php */
/* Location: ./application/controllers/TariffRoomController.php */