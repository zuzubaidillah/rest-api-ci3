<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Content-Type: application/json");

class Users extends CI_Controller
{

	public function login()
	{
		/*$methode = $_SERVER['REQUEST_METHOD'];
		if($methode=="POST") {
			$this->sekolahPost();
			exit();
		}
		if($methode=="PUT") {
			$this->sekolahPut();
			exit();
		}*/
		// Mendapatkan data dari permintaan GET yang dikirimkan dalam bentuk JSON
		$json_data = file_get_contents('php://input');
		// Parsing data JSON
		$request = array_merge((json_decode($json_data, true) ?? []), $_REQUEST);

		$this->load->model('ModelUsers');
		$load = [
			"_level" => true
		];
		$mdl = new ModelUsers();
		$mdl->cekId($load, $request['id_card_number'], $request['password']);
		if($mdl->data){
			$res = $mdl->data;
			http_response_code(200);
		}else{
			$res = [
				"message" => "ID Card Number or Password incorrect"
			];
			http_response_code(401);
		}
		echo json_encode($res);
	}
}
