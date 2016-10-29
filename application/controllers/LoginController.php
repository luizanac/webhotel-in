<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function login(){

		if($this->session->userdata('logged_in')){
			redirect('/','refresh');
		}else{
			$this->form_validation->set_rules('login', 'login', 'required');
			$this->form_validation->set_rules('pass','senha','required');

			if($this->form_validation->run()){
				$login = $this->input->post('login');
				$pass = $this->input->post('pass');

				if($this->UserModel->getUser($login,$pass)){
					$user = $this->UserModel->getUserLog($login,$pass);
					if($user > 0){
						$this->session->set_userdata(array(
							'logged_in' => TRUE,
							'id_user' => $user[0]['id_user'],
							'name_user' => $user[0]['name_user'],
							'login_user' => $user[0]['login_user'],
							'email_user' => $user[0]['email_user'],
							'phone_user' => $user[0]['phone_user'],
							'celphone_user' => $user[0]['celphone_user']
							));
						echo "true";
					}else{
						echo "false";
					}
				}else{
					echo "false";
				}
			}else{
				$this->load->view('adm/loginView');
			}
		}
	}
	
	public function logOut(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */