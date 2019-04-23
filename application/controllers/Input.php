<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Show_model');
	}
	public function index()
	{
		redirect('data_akuisisi');
	}

	public function editAkuisisi1(){
			$this->form_validation->set_rules('pt_induk', 'PT Induk', 'required');
               $this->form_validation->set_rules('pt_anak', 'PT Anak', 'required');
               $this->form_validation->set_rules('tgl_akuisisi', 'Tanggal Akuisisi', 'required');
               $this->form_validation->set_rules('persen_akuisisi', 'Persentase Akuisisi', 'required');
               
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->Show_model->editAkuisisi1() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil mengedit data');
                        redirect('data_akuisisi');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit data. Coba lagi');
                        redirect('data_akuisisi');

                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', 'Ada inputan kosong / kesalahan inputan');

                        redirect('data_akuisisi');
                  
                }
		}
	public function editAkuisisi2(){
			$this->form_validation->set_rules('kas_metode', 'Kas', 'required');
               $this->form_validation->set_rules('lembar_saham', 'Lembar Saham', 'required');
               $this->form_validation->set_rules('nilai_par', 'Nilai Par/Lembar', 'required');
               $this->form_validation->set_rules('nilai_pasar', 'Nilai Pasar/Lembar', 'required');
               
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->Show_model->editAkuisisi2() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil mengedit data');
                        redirect('data_akuisisi');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit data. Coba lagi');
                        redirect('data_akuisisi');

                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', 'Ada inputan kosong / kesalahan inputan');

                        redirect('data_akuisisi');
                  
                }
		}
		public function editAkuisisi3(){
			$this->form_validation->set_rules('beban_invest', 'Beban Investasi', 'required');
               $this->form_validation->set_rules('agio_saham', 'Agio Saham', 'required');

                if ($this->form_validation->run() == TRUE ) {
                    if ($this->Show_model->editAkuisisi3() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil mengedit data');
                        redirect('data_akuisisi');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit data. Coba lagi');
                        redirect('data_akuisisi');

                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', 'Ada inputan kosong / kesalahan inputan');
                        redirect('data_akuisisi');
                  
                }
		}
	

}

/* End of file Input.php */
/* Location: ./application/controllers/Input.php */