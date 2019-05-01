<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('Show_model');
	$this->Show_model->setIDAkuisisi();
}
	public function index()
	{
		
		redirect('data_akuisisi');
	}
	public function data_akuisisi()
	{
		$id = $this->session->userdata('id_akuisisi');
		$data = [
			'd_ak' => $this->Show_model->GetData(array('id_akuisisi' => $id),'akuisisi'),
			'main_view'=>'dataakuisisi'
		];
		$this->load->view('template', $data);
	}
	public function data_neraca()
	{
		$id = $this->session->userdata('id_akuisisi');
		$data = [
			'd_ak' => $this->Show_model->GetData(array('id_akuisisi' => $id),'akuisisi'),
			'nb_induk' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_induk','tipe_nilai'=>'nilai_buku'),'neraca1'),
			'np_induk' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_induk','tipe_nilai'=>'nilai_pasar'),'neraca1'),

			'nb_anak' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_anak','tipe_nilai'=>'nilai_buku'),'neraca1'),
			'np_anak' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_anak','tipe_nilai'=>'nilai_pasar'),'neraca1'),
			'main_view'=>'dataneraca'
		];
		$this->load->view('template', $data);
	}
	public function distribusi_excess()
	{
		$id = $this->session->userdata('id_akuisisi');
		
		$data = [
			'd_ak' => $this->Show_model->GetData(array('id_akuisisi' => $id),'akuisisi'),
			'nb_induk' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_induk','tipe_nilai'=>'nilai_buku'),'neraca1'),
			'np_induk' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_induk','tipe_nilai'=>'nilai_pasar'),'neraca1'),


			'nb_anak' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_anak','tipe_nilai'=>'nilai_buku'),'neraca1'),
			'np_anak' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_anak','tipe_nilai'=>'nilai_pasar'),'neraca1'),

			'main_view'=>'distribusiexcess'
		];
		$this->load->view('template', $data);
	}
	public function neraca_konsolidasi()
	{
		$id = $this->session->userdata('id_akuisisi');

		$data = [
			'd_ak' => $this->Show_model->GetData(array('id_akuisisi' => $id),'akuisisi'),
			'nb_induk' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_induk','tipe_nilai'=>'nilai_buku'),'neraca1'),
			'np_induk' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_induk','tipe_nilai'=>'nilai_pasar'),'neraca1'),

			'nb_anak' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_anak','tipe_nilai'=>'nilai_buku'),'neraca1'),
			'np_anak' => $this->Show_model->GetData(array('id_akuisisi' => $id,'tipe_pt' => 'pt_anak','tipe_nilai'=>'nilai_pasar'),'neraca1'),

			'main_view'=>'neracakonsolidasi'
		];
		$this->load->view('template', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */