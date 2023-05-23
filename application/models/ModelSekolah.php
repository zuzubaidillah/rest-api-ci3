<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSekolah extends CI_Model
{
	public $data = 0;
	public function getData($id="")
	{
		$where = "";
		if($id!=""){
			$where = "WHERE id='$id'";
		}
		$sql = "select * from sekolah $where order by nama asc;";
		$que = $this->db->query($sql);
		$this->data = $que->result_array();
//		return $this->data;
		// ada datanya [...ada isininya...]
		// data kosong return []
	}
}
