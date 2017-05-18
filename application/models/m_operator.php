<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operator extends CI_Model {

	function login(){
		$check = $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));
		if ($check->num_rows()>0) {
			return 1;
		}
		else{
			return 0;
		}
	}	

}

/* End of file m_operator.php */
/* Location: ./application/models/m_operator.php */