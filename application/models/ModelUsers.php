<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUsers extends CI_Model
{
	public $data = 0;

	public function cekId($load, $id, $username)
	{
//		$sql = "select aks.*, lev.nama as nama_level from akses aks inner join level lev on aks.id_level=lev.id WHERE aks.id='$id' AND aks.username='$username' order by nama asc;";
		$sql = "select * from akses  WHERE id='$id' AND username='$username' order by nama asc;";
		$que = $this->db->query($sql);
		$this->data = $que->row_array();
//		remove key di array
		unset($this->data['password']);
		if(isset($load['_level']) && $load['_level']){
			$this->relasiToLevel();
		}
//		return $this->data;
		// ada datanya [...ada isininya...]
		// data kosong return []
	}

	public function relasiToLevel()
	{
		$idLevel = $this->data['id_level'];
		$sql = "select * from level WHERE id='$idLevel'";
		$que = $this->db->query($sql);
		$this->data['regional'] = $que->row_array();
//		return $this->data;
		// ada datanya [...ada isininya...]
		// data kosong return []
	}
}
