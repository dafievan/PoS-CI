<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	function simpan_barang($data)
    {
        $this->db->insert('transaksi_detail',$data);
    }

	function tampilkan_detail_transaksi(){ //menampilkan data dari db
		$query = "SELECT td.id_trans_detail, td.qty, td.harga, b.nama_barang 
				FROM transaksi_detail as td, barang as b 
				WHERE td.id_barang = b.id_barang and td.status='0'";

		return $this->db->query($query);//menyimpan variable
	}

	function deleteitem($param){
		return $this->db->delete('transaksi_detail',array('id_trans_detail'=>$param));
	}

	function selesai_belanja($object){
		$this->db->insert('transaksi', $object);//insert data selesai belanja pada tabel transaksi.
		$last_id = $this->db->query("SELECT id_transaksi FROM transaksi order by id_transaksi desc")->row_array();
		$this->db->query("update transaksi_detail set transaksi_id='".$last_id['transaksi_id']."' where status='0'");
		$this->db->query("UPDATE transaksi_detail SET status='1' WHERE status='0'");//update status pd tabel transaksi_detail
	}

	function laporan_transaksi(){
		$query = "SELECT t.tgl_transaksi, o.nama_lengkap, sum(td.harga*td.qty) as total 
			FROM transaksi as t, transaksi_detail as td, operator as o 
			WHERE td.id_transaksi = t.id_transaksi and o.id_operator=t.id_operator group by t.id_transaksi";
		return $this->db->query($query);
	}

	function laporan_periode($tanggal1,$tanggal2){
		$query = "SELECT t.tgl_transaksi, o.nama_lengkap, sum(td.harga*td.qty) as total
				FROM transaksi as t, transaksi_detail as td, operator as o 
				WHERE td.id_transaksi = t.id_transaksi and o.id_operator=t.id_operator and t.tgl_transaksi between '$tanggal1' and '$tanggal2'
				group by t.id_transaksi";

		return $this->db->query($query);
	}

}

/* End of file m_transaksi.php */
/* Location: ./application/models/m_transaksi.php */