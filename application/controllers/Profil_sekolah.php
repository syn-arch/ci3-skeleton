<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil_sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_sekolah_m','psm');
		cek_login();
	}

	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_sekolah','Nama Sekolah','required');
		$valid->set_rules('visi','visi','required');
		$valid->set_rules('misi','misi','required');
		$valid->set_rules('alamat','alamat','required');
		$valid->set_rules('email','email','required');
		$valid->set_rules('telepon','telepon','required');

		if ($valid->run()) {
			$this->psm->update();
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('profil_sekolah','refresh');
		}

		$data['judul'] = "Profil Sekolah";
		$data['profil_sekolah'] = $this->psm->get_profil_sekolah();

		$this->load->view('template/header', $data);
		$this->load->view('profil_sekolah', $data);
		$this->load->view('template/footer');
	}

}
