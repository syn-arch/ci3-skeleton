<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuota_pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('kuota_pendaftaran_m','kpm');
		$this->load->model('Tahun_akademik_m','tam');
		$this->load->model('Jalur_pendaftaran_m','jpm');
		$this->load->model('Jurusan_m','jm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Kuota Pendaftaran";
		$data['kuota'] = $this->kpm->get_kuota_pendaftaran();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/kuota_pendaftaran/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->kpm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('ppdb/kuota_pendaftaran','refresh');
	}

	function get_kuota_pendaftaran_json() {
		header('Content-Type: application/json');
		echo $this->kpm->get_all_kuota_pendaftaran();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		
		$valid->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
		$valid->set_rules('id_jalur_pendaftaran', 'Jalur Pendaftaran', 'required');
		$valid->set_rules('id_jurusan', 'Jurusan', 'required');
		$valid->set_rules('kuota', 'Kuota', 'required');

		if ($valid->run()) {
			$this->kpm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('ppdb/kuota_pendaftaran','refresh');
		}

		$data['judul'] = "Tambah kuota Pendaftaran";
		$data['tahun_akademik'] = $this->tam->get_tahun_akademik();
		$data['jurusan'] = $this->jm->get_jurusan();
		$data['jalur_pendaftaran'] = $this->jpm->get_jalur_pendaftaran();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/kuota_pendaftaran/tambah', $data);
		$this->load->view('template/footer');
	}

	public function ubah($id_kuota_pendaftaran)
	{
		$valid = $this->form_validation;
		$valid->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
		$valid->set_rules('id_jalur_pendaftaran', 'Jalur Pendaftaran', 'required');
		$valid->set_rules('id_jurusan', 'Jurusan', 'required');
		$valid->set_rules('kuota', 'Kuota', 'required');

		if ($valid->run()) {
			$this->kpm->update($id_kuota_pendaftaran);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('ppdb/kuota_pendaftaran','refresh');
		}

		$data['judul'] = "Ubah kuota Pendaftaran";
		$data['tahun_akademik'] = $this->tam->get_tahun_akademik();
		$data['jurusan'] = $this->jm->get_jurusan();
		$data['jalur_pendaftaran'] = $this->jpm->get_jalur_pendaftaran();
		$data['kuota'] = $this->kpm->get_kuota_pendaftaran($id_kuota_pendaftaran);

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/kuota_pendaftaran/ubah', $data);
		$this->load->view('template/footer');
	}

}