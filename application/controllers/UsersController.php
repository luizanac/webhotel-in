<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends MY_Controller {

	public function index()
	{	
		$data['user'] = $this->session->userdata();
		$this->template->load('template/template','reserve/reserveView.php',$data);
	}
}
/* End of file AdmController.php */
/* Location: ./application/controllers/AdmController.php */