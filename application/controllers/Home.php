<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('Show_model');
}
	public function index()
	{
		redirect('data_akuisisi');
	}
	public function data_akuisisi()
	{
		$data = [
			'd_ak' => $this->Show_model->GetData('','akuisisi'),
			'main_view'=>'dataakuisisi'
		];
		$this->load->view('template', $data);
	}
	public function data_neraca()
	{
		$data = [
			'main_view'=>'dataneraca'
		];
		$this->load->view('template', $data);
	}
	public function distribusi_excess()
	{
		$data = [
			'main_view'=>'distribusiexcess'
		];
		$this->load->view('template', $data);
	}
	public function neraca_konsolidasi()
	{
		$data = [
			'main_view'=>'neracakonsolidasi'
		];
		$this->load->view('template', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */