<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	function tampil_data(){
		return $this->db->get('kategori_barang');
	}

	function tampil_data_pagination($halaman,$batas){
		return $this->db->query("SELECT * FROM kategori_barang limit $halaman,$batas");
	}

	function add($object){
		$this->db->insert('kategori_barang', $object);
	}

	function get_one($id){ //mengambil value dari db
		return $this->db->get_where('kategori_barang',array('id_kategori'=>$id));
	}

	function edit($id,$object){//mengupdate value baru
		//print_r($id);
		//print_r($object);
		//die;
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori_barang', $object);
	}

	function delete($param){
		return $this->db->delete('kategori_barang',array('id_kategori'=>$param));
		//id_kategori berasal dari db,$param untuk menyimpan value dari uri segment 3
	}

}

/* End of file m_kategori.php */
/* Location: ./application/models/m_kategori.php */