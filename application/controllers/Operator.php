<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_operator');
		check_session()
	}

	public function index()
	{	//menampilkan v_barang dg template
		$data['record'] = $this->m_operator->tampil_data();
		$this->template->load('template','operator/v_operator',$data);
	}

	function add(){
		if ($this->input->post('submit')) {
			//proses add kategori
			$password = $this->input->post('password');
			$object = array( //dari form ke db
						'nama_lengkap'=>$this->input->post('n_lengkap'),
						'username'=>$this->input->post('n_user'),
						'password'=>md5($password)
				);
			$this->m_operator->add($object); //manggil model method add
			redirect('operator');
		}
		else{//proses menampilkan form add
			$this->template->load('template','operator/f_inoperator');
		}
	}

	function edit($id){
		//proses update
		if ($this->input->post('submit')) {
			$id = $this->input->post('id');
			$object = array(
					'nama_lengkap'=>$this->input->post('n_lengkap'),
					'username'=>$this->input->post('n_user'),
					'password'=>md5($password)
			);
			$this->m_operator->edit($id,$object);//manggil model method edit
			redirect('operator');
		}
		else{ //menampilkan f_edbarang + valuenya
			$data['editdata'] = $this->m_operator->get_one($id)->row_array();
			$this->template->load('template','operator/f_edoperator',$data);
		}
	}

	function hapus($id){ //menghapus data
		$this->m_operator->delete($id);
		redirect('operator');
	}

}

/* End of file Operator.php */
/* Location: ./application/controllers/Operator.php */