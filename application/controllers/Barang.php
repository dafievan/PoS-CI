<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_barang'); //load m_barang
		check_session();
	}

	public function index()
	{	//menampilkan v_barang dg template
		$data['record'] = $this->m_barang->tampil_data();
		$this->template->load('template','barang/v_barang',$data);		
	}

	function add(){
		if ($this->input->post('submit')) {
			//proses add kategori
			$object = array( //dari form ke db
						'nama_barang'=>$this->input->post('n_barang'),
						'id_kategori'=>$this->input->post('n_kategori'),
						'harga'=>$this->input->post('n_harga')
				);
			$this->m_barang->add($object); //manggil model method add
			redirect('barang');
		}
		else{//proses menampilkan form add
			$this->load->model('m_kategori');//load m_kategori
			$data['kategori'] = $this->m_kategori->tampil_data();
			$this->template->load('template','barang/f_inbarang',$data);
		}
	}

	function edit($id){
		//proses update
		if ($this->input->post('submit')) {
			$id = $this->input->post('id');
			$object = array(
					'nama_barang'=>$this->input->post('n_barang'),
					'id_kategori'=>$this->input->post('n_kategori'),
					'harga'=>$this->input->post('n_harga')
			);
			$this->m_barang->edit($id,$object);//manggil model method edit
			redirect('barang');
		}
		else{ //menampilkan f_edbarang + valuenya
			$this->load->model('m_kategori');
			$data['kategori'] = $this->m_kategori->tampil_data();
			$data['editdata'] = $this->m_barang->get_one($id)->row_array();
			$this->template->load('template','barang/f_edbarang',$data);
		}
	}

	function hapus($id){ //menghapus data
		$this->m_barang->delete($id);
		redirect('barang');
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */