<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TariffsController extends MY_Controller {

	private $error;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['tariffs'] = $this->TariffModel->getTariffs($this->session->userdata('id_user'));
		$data['user'] = $this->session->userdata();
		$data['error'] = $this->error;
		$this->template->load('template/template','tariff/tariffView',$data);
	}

	public function new(){
		$this->form_validation->set_rules('tariff[name_tariff]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[base_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[adult_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[children_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[start_date]','field','trim|required');
		$this->form_validation->set_rules('tariff[final_date]','field','trim|required');

		if ($this->form_validation->run()) {
			$tariff = $this->input->post('tariff');
			$tariff['id_user'] = $this->session->userdata('id_user');
			if($this->TariffModel->new($tariff)){
				echo "Formulário enviado!";
			}else{
				echo "Falha ao enviar form!";
			}
		} else {	
			$data['user'] = $this->session->userdata();
			$this->template->load('template/template','tariff/newTariffView',$data);
		}
	}

	public function update($id){
		$this->form_validation->set_rules('tariff[name_tariff]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[base_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[adult_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[children_price]', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('tariff[start_date]','field','trim|required');
		$this->form_validation->set_rules('tariff[final_date]','field','trim|required');

		if ($this->form_validation->run()) {
			$tariff = $this->input->post('tariff');
			if($this->TariffModel->update($tariff,$id)){
				echo "Formulário enviado!";
			}else{
				echo "Falha ao enviar form!";
			}
		} else {
			$data['user'] = $this->session->userdata();
			$data['tariff'] = $this->TariffModel->getById($id);
			$this->template->load('template/template','tariff/updateTariffView',$data);
		}
	}

	public function delete($id){
		if($this->TariffModel->delete($id)){
			redirect('tarifas','refresh');
		}else{
			$this->error = "Tarifa já está sendo utilizada!";
			$this->index();
		}
		
	}
}
/* End of file TariffRoomController.php */
/* Location: ./application/controllers/TariffRoomController.php */