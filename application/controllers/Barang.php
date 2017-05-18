<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}

	public function index()
	{
		$data['record'] = $this->m_kategori->tampil_data();
		$this->load->view('kategori/v_kategori',$data);		
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */