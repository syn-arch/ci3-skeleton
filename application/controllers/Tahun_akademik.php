<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('Tahun_akademik_m','tam');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Tahun Akademik";
		$data['tahun_akademik'] = $this->tam->get_tahun_akademik();

		$this->load->view('template/header', $data);
		$this->load->view('master/tahun_akademik/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->tam->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('master/tahun_akademik','refresh');
	}

	function get_tahun_akademik_json() {
		header('Content-Type: application/json');
		echo $this->tam->get_all_tahun_akademik();
	}

	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('tahun','Tahun','required');
		$valid->set_rules('semester','semester','required');
		$valid->set_rules('semester_saat_ini','semester_saat_ini','required');

		if ($valid->run()) {
			$this->tam->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('master/tahun_akademik','refresh');
		}

		$data['judul'] = "Tambah Tahun Akademik";

		$this->load->view('template/header', $data);
		$this->load->view('master/tahun_akademik/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_tahun_akademik($id = '')
	{
		echo json_encode($this->tam->get_tahun_akademik($id));
	}

	public function ubah($id_tahun_akademik)
	{
		$valid = $this->form_validation;
		
		$valid->set_rules('tahun','Tahun','required');
		$valid->set_rules('semester','semester','required');
		$valid->set_rules('semester_saat_ini','semester_saat_ini','required');

		if ($valid->run()) {
			$this->tam->update($id_tahun_akademik);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('master/tahun_akademik','refresh');
		}

		$data['judul'] = "Ubah Tahun Akademik";
		$data['tahun_akademik'] = $this->tam->get_tahun_akademik($id_tahun_akademik);

		$this->load->view('template/header', $data);
		$this->load->view('master/tahun_akademik/ubah', $data);
		$this->load->view('template/footer');
	}

}
