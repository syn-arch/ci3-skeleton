<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_m','am');
	}

	public function index()
	{
		$data['judul'] = "Profil Saya";
		$data['profile'] = $this->am->get_profile();

		$this->load->view('template/header', $data, FALSE);		
		$this->load->view('auth/index', $data, FALSE);		
		$this->load->view('template/footer', $data, FALSE);		
	}

	public function ubah()
	{
		$data['judul'] = "Ubah Profil";
		$data['profile'] = $this->am->get_profile();
		
		$this->load->view('template/header', $data, FALSE);		
		$this->load->view('auth/ubah', $data, FALSE);		
		$this->load->view('template/footer', $data, FALSE);		
	}

	public function ubah_password()
	{
		$data['judul'] = "Ubah Password";

		$valid = $this->form_validation;

		$valid->set_rules('password_lama', 'Password Lama', 'required');
		$valid->set_rules('password_baru', 'Password Baru', 'required');
		$valid->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required');

		if ($valid->run()) {
			$this->am->change_password();
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('profil/ubah_password','refresh');
		}
		
		$this->load->view('template/header', $data, FALSE);		
		$this->load->view('auth/ubah_password', $data, FALSE);		
		$this->load->view('template/footer', $data, FALSE);		
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */ ?>