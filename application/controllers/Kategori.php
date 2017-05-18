<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_kategori');
	}

	public function index()
	{
		$data['record'] = $this->m_kategori->tampil_data();
		$this->load->view('kategori/v_kategori',$data);
	}

	function add(){
		if (isset($_POST['submit'])) {
			//proses add kategori
		$object = array(
					'nama_kategori'=>$this->input->post('n_kategori')
			);
		$this->m_kategori->add($object);
		redirect('kategori');
		}
		else{		
		$this->load->view('kategori/f_inkategori');
		}
	}

	function edit($id){
		if (isset($_POST['submit'])) {
			//proses add kategori
		$object = array(
				'nama_kategori'=>$this->input->post('n_kategori')
				);
		$this->m_kategori->edit($id,$object);
		redirect('kategori');
		}
		else{
		//proses ambil value
		//$data['editdata'] = $this->m_kategori->get_one($id)->row_array();
		$data['editdata'] = $this->db->get_where('kategori_barang', array('id_kategori'=>$id))->row(); 
		$this->load->view('kategori/f_edkategori',$data);
		}
	}

	function hapus($id){
		$this->m_kategori->delete($id);
		redirect('kategori');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */