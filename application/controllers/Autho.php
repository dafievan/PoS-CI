<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autho extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_operator');
	}

	function login(){
		//proses login
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->m_operator->login($username,$password);
			//manggil method login pada model
			if ($hasil==1) {
				//update utk last login
				$this->db->where('username', $username);
				$this->db->update('operator',array('login_terakhir'=>date('Y-m-d')));
				//update utk last login
				$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
				redirect('dashboard');
			}
			else{

				redirect('autho/login');
			}
		}
		else{
			//$this->load->view('f_login');		
			check_session_login();
			$this->template->load('template_login','f_login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('autho/login');
	}

}

/* End of file Autho.php */
/* Location: ./application/controllers/Autho.php */