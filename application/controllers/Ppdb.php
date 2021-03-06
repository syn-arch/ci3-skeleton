<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ppdb_m', 'pm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Pengaturan PPDB";
		$data['ppdb'] = $this->pm->get_ppdb();

		$valid = $this->form_validation;

		$valid->set_rules('tgl_dibuka','Tanggal Dibuka', 'required');
		$valid->set_rules('tgl_ditutup','Tanggal Ditutup', 'required');
		$valid->set_rules('tgl_pengumuman','Tanggal Pengumuman', 'required');
		$valid->set_rules('keterangan','Keterangan', 'required');

		if ($valid->run()) {
			$this->pm->update();
			$this->session->set_flashdata('pesan', 'Diubah');
			redirect('ppdb','refresh');
		}

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/index', $data);
		$this->load->view('template/footer');
	}

	public function proses_seleksi()
	{
		$data['judul'] = "Proses Seleksi";

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/proses', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Ppdb.php */
/* Location: ./application/controllers/Ppdb.php */ ?>