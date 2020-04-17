<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Konten_m','km');
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
			$this->km->update();
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('Konten','refresh');
		}

		$data['judul'] = "Konten Web";
		$data['Konten'] = $this->km->get_Konten();

		$this->load->view('template/header', $data);
		$this->load->view('konten/Konten', $data);
		$this->load->view('template/footer');
	}

}
