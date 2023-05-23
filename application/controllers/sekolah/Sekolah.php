<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Content-Type: application/json");

class Sekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	private function sekolahPost()
	{}
	private function sekolahPut()
	{}

	public function index()
	{
		$methode = $_SERVER['REQUEST_METHOD'];
//		if($methode=="POST") {
//			$this->sekolahPost();
//			exit();
//		}
		if($methode=="PUT") {
			$this->sekolahPut();
			exit();
		}
		// Mendapatkan data dari permintaan GET yang dikirimkan dalam bentuk JSON
		$json_data = file_get_contents('php://input');
		// Parsing data JSON
		$request = array_merge((json_decode($json_data, true) ?? []), $_REQUEST);


//		$dataSekolah = $this->ModelSekolah->getData();
//		$mdlSekolah = new ModelSekolah();
//		$mdlSekolah->getData();

//		$mdlSekolahVersi2 = new ModelSekolah();
//		$mdlSekolahVersi2->getData("5");

		$res = [
			"data" => $_FILES,
			"message" => "SEKOLH",
			"error" => "hallo",
			"meta" => [
				"total" => 20,
				"current_page" => 1,
				"limit" => 10,
			],
		];
		http_response_code(401);
		echo json_encode($res);
	}

	public function print($idSekolah)
	{
		header("Content-Type: application/json");
		$res = [
			"data" => $idSekolah,
			"message" => "PRINT",
			"error" => "hallo",
			"meta" => [
				"total" => 20,
				"current_page" => 1,
				"limit" => 10,
			],
		];
		http_response_code(401);
		echo json_encode($res);
	}
}
