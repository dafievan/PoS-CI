<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	function tampil_data(){ //menampilkan dari db
		$query = "SELECT b.id_barang, b.nama_barang, b.harga, kb.nama_kategori 
		FROM barang as b, kategori_barang as kb 
		WHERE b.id_kategori = kb.id_kategori";

		return $this->db->query($query);
	}

	function add($object){ //menambah data ke db
		$this->db->insert('barang', $object);
	}

	function get_one($id){ //mendapatkan value
		return $this->db->get_where('barang',array('id_barang'=>$id));
	}
	
	function edit($id,$object){ //bagian untuk mengupdate
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $object);
	}

	function delete($param){ //menghapus data
		return $this->db->delete('barang',array('id_barang'=>$param));
	}

}

/* End of file m_barang.php */
/* Location: ./application/models/m_barang.php */