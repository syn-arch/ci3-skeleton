<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelombang_pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('Gelombang_pendaftaran_m','gpm');
		$this->load->model('Tahun_akademik_m','tam');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Gelombang Pendaftaran";
		$data['gelombang'] = $this->gpm->get_gelombang_pendaftaran();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/gelombang_pendaftaran/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->gpm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('ppdb/gelombang_pendaftaran','refresh');
	}

	function get_gelombang_pendaftaran_json() {
		header('Content-Type: application/json');
		echo $this->gpm->get_all_gelombang_pendaftaran();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_gelombang_pendaftaran','Nama gelombang pendaftaran','required');
		$valid->set_rules('tgl_mulai','Tanggal Mulai','required');
		$valid->set_rules('tgl_selesai','Tanggal Selesai','required');
		$valid->set_rules('id_tahun_akademik','Tahun Akademik','required');

		if ($valid->run()) {
			$this->gpm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('ppdb/gelombang_pendaftaran','refresh');
		}

		$data['judul'] = "Tambah Gelombang Pendaftaran";
		$data['tahun_akademik'] = $this->tam->get_tahun_akademik();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/gelombang_pendaftaran/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_gelombang_pendaftaran($id = '')
	{
		echo json_encode($this->gpm->get_gelombang_pendaftaran($id));
	}

	public function ubah($id_gelombang_pendaftaran)
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_gelombang_pendaftaran','Nama gelombang pendaftaran','required');
		$valid->set_rules('tgl_mulai','Tanggal Mulai','required');
		$valid->set_rules('tgl_selesai','Tanggal Selesai','required');
		$valid->set_rules('id_tahun_akademik','Tahun Akademik','required');

		if ($valid->run()) {
			$this->gpm->update($id_gelombang_pendaftaran);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('ppdb/gelombang_pendaftaran','refresh');
		}

		$data['judul'] = "Ubah Gelombang Pendaftaran";
		$data['gelombang'] = $this->gpm->get_gelombang_pendaftaran($id_gelombang_pendaftaran);
		$data['tahun_akademik'] = $this->tam->get_tahun_akademik();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/gelombang_pendaftaran/ubah', $data);
		$this->load->view('template/footer');
	}

}
