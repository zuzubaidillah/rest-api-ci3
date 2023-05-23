<?php
defined('BASEPATH') or exit('No direct script access allowed');


class JsonPage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		header("Content-Type: application/json");
	}
	
	public function index()
	{
		header("Accept: application/json");
		http_response_code(404);
		$res = json_encode([
			"error" => "route not found",
			"message" => "route not found"
		]);
		echo $res;
	}

	public function index2()
	{
		header("Accept: application/json");
		http_response_code(404);
		$res = json_encode([
			"error" => "route not found",
			"message" => "route not found"
		]);
		echo $res;
	}
}
