<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('kontak_m','sm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Kontak";
		$data['kontak'] = $this->sm->get_kontak();

		$this->load->view('template/header', $data);
		$this->load->view('konten/kontak/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->sm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('konten/kontak','refresh');
	}

	function get_kontak_json() {
		header('Content-Type: application/json');
		echo $this->sm->get_all_kontak();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_kontak','nama kontak','required');
		$valid->set_rules('link','link','required');
		if (empty($_FILES['gambar']['name']))
		{
			$valid->set_rules('gambar', 'Gambar', 'required');
		}

		if ($valid->run()) {
			$this->sm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('konten/kontak','refresh');
		}

		$data['judul'] = "Tambah kontak";

		$this->load->view('template/header', $data);
		$this->load->view('konten/kontak/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_kontak($id = '')
	{
		echo json_encode($this->sm->get_kontak($id));
	}

	public function ubah($id_kontak)
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_kontak','nama kontak','required');
		$valid->set_rules('link','link','required');

		if ($valid->run()) {
			$this->sm->update($id_kontak);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('konten/kontak','refresh');
		}

		$data['judul'] = "Ubah kontak";
		$data['kontak'] = $this->sm->get_kontak($id_kontak);

		$this->load->view('template/header', $data);
		$this->load->view('konten/kontak/ubah', $data);
		$this->load->view('template/footer');
	}

}
