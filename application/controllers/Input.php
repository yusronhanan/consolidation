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
	//akuisisi function
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
	
		//neraca function
		
		public function editNeraca(){
			$this->form_validation->set_rules('id_neraca1', 'ID Tipe Nilai', 'required');
			$this->form_validation->set_rules('tipe_nilai', 'Tipe Nilai', 'required');

               $this->form_validation->set_rules('piutang_n1', 'Piutang - net', 'required');
               $this->form_validation->set_rules('persediaan_n1', 'Persediaan', 'required');
               $this->form_validation->set_rules('perlengkapan_n1', 'Perlengkapan Akuisisi', 'required');
               $this->form_validation->set_rules('bangunan_n1', 'Bangunan', 'required');
               $this->form_validation->set_rules('tanah_n1', 'Tanah', 'required');
               $this->form_validation->set_rules('hutang_dagang_n1', 'Hutang Dagang', 'required');
               $this->form_validation->set_rules('hutang_obligasi_n1', 'Hutang Obligasi', 'required');
               
            if($this->input->post('tipe_nilai') == "nilai_buku"){
				$this->form_validation->set_rules('kas_n1', 'Kas', 'required');


               $this->form_validation->set_rules('saham_n1', 'Saham', 'required');
               $this->form_validation->set_rules('agio_saham_n1', 'Agio Saham', 'required');
               $this->form_validation->set_rules('laba_ditahan_n1', 'Laba Ditahan', 'required');
            }
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->Show_model->editNeraca() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil mengedit data');
                        redirect('data_neraca');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit data. Coba lagi');
                        redirect('data_neraca');

                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', 'Ada inputan kosong / kesalahan inputan');

                        redirect('data_neraca');
                  
                }
		}

}

/* End of file Input.php */
/* Location: ./application/controllers/Input.php */