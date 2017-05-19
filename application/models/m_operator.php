<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operator extends CI_Model {

	function login($username,$password){
		$check = $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));
		if ($check->num_rows()>0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	function tampil_data(){
		return $this->db->get('operator');
	}	

	function add($object){
		$this->db->insert('operator', $object);
	}

	function get_one($id){ //mendapatkan value
		return $this->db->get_where('operator',array('id_operator'=>$id));
	}
	
	function edit($id,$object){ //bagian untuk mengupdate
		$this->db->where('id_operator', $id);
		$this->db->update('operator', $object);
	}

	function delete($param){ //menghapus data
		return $this->db->delete('operator',array('id_operator'=>$param));
	}

}

/* End of file m_operator.php */
/* Location: ./application/models/m_operator.php */