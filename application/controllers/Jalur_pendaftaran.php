<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalur_pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('Jalur_pendaftaran_m','jpm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Jalur Pendaftaran";
		$data['jalur'] = $this->jpm->get_jalur_pendaftaran();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/jalur_pendaftaran/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->jpm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('ppdb/jalur_pendaftaran','refresh');
	}

	function get_jalur_pendaftaran_json() {
		header('Content-Type: application/json');
		echo $this->jpm->get_all_jalur_pendaftaran();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_jalur_pendaftaran','Nama jalur pendaftaran','required');

		if ($valid->run()) {
			$this->jpm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('ppdb/jalur_pendaftaran','refresh');
		}

		$data['judul'] = "Tambah jalur Pendaftaran";

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/jalur_pendaftaran/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_jalur_pendaftaran($id = '')
	{
		echo json_encode($this->jpm->get_jalur_pendaftaran($id));
	}

	public function ubah($id_jalur_pendaftaran)
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_jalur_pendaftaran','Nama jalur pendaftaran','required');

		if ($valid->run()) {
			$this->jpm->update($id_jalur_pendaftaran);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('ppdb/jalur_pendaftaran','refresh');
		}

		$data['judul'] = "Ubah jalur Pendaftaran";
		$data['jalur'] = $this->jpm->get_jalur_pendaftaran($id_jalur_pendaftaran);

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/jalur_pendaftaran/ubah', $data);
		$this->load->view('template/footer');
	}

}
