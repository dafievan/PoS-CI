<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autho extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_operator');
	}

	public function index()
	{
		
	}

	function login(){
		//proses login
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->m_operator->login($username,$password);
			if ($hasil==1) {
				$this->session->set_userdata(array('status_login'=>'oke'));
				redirect('dashboard');
			}
			else{
				redirect('autho/login');
			}
		}
		$this->load->view('f_login');		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('autho/login');
	}

}

/* End of file Autho.php */
/* Location: ./application/controllers/Autho.php */