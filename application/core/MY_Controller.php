<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
			
		if(!$this->session->userdata('logged_in')){
			redirect('login','refresh');
		}
	}
}

/* End of file MY_LoginController.php */
/* Location: ./application/core/MY_LoginController.php */