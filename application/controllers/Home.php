<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = [
			'main_view'=>'distribusiexcess'
		];
		$this->load->view('template', $data);
	}
	public function dataakusisi()
	{
		$data = [
			'main_view'=>'dataakusisi'
		];
		$this->load->view('template', $data);
	}
	public function dataneraca()
	{
		$data = [
			'main_view'=>'dataneraca'
		];
		$this->load->view('template', $data);
	}
	public function distribusiexcess()
	{
		$data = [
			'main_view'=>'distribusiexcess'
		];
		$this->load->view('template', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */