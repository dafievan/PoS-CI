<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_kategori');
		check_session();
	}

	public function index(){	//bagian untuk pagination
		$this->load->library('pagination');
        $config['base_url'] = base_url().'/kategori/index/';
        $config['total_rows'] = $this->m_kategori->tampil_data()->num_rows();
        $config['per_page'] = 2; 
        $this->pagination->initialize($config); 
        $data['paging']     = $this->pagination->create_links();
        $halaman            = $this->uri->segment(3);
        $halaman            = $halaman==''?0:$halaman;
		//bagian untuk pagination
		$data['record'] = $this->m_kategori->tampil_data_pagination($halaman,$config['per_page']);
		//$this->load->view('kategori/v_kategori',$data);
		$this->template->load('template','kategori/v_kategori',$data);
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
		//$this->load->view('kategori/f_inkategori');
		$this->template->load('template','kategori/f_inkategori');
		}
	}

	function edit($id){
		//$id=$this->uri->segment(3);
		if ($this->input->post('submit')) {
			//proses add kategori
			$id = $this->input->post('id');
			$object = array(
					'nama_kategori'=>$this->input->post('n_kategori')
					); 
			$this->m_kategori->edit($id,$object);
			redirect('kategori');
		}
		else{
		//proses ambil value
			$data['editdata'] = $this->m_kategori->get_one($id)->row_array();
			// $data['editdata'] = $this->db->get_where('kategori_barang', array('id_kategori'=>$id))->row_array();
			//$this->load->view('kategori/f_edkategori',$data);
			$this->template->load('template','kategori/f_edkategori',$data);

		}
	}

	function hapus($id){
		$this->m_kategori->delete($id);
		redirect('kategori');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */