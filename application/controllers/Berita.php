<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('berita_m','sm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Berita";
		$data['berita'] = $this->sm->get_berita();

		$this->load->view('template/header', $data);
		$this->load->view('konten/berita/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->sm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('konten/berita','refresh');
	}

	function get_berita_json() {
		header('Content-Type: application/json');
		echo $this->sm->get_all_berita();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('judul','judul','required');
		$valid->set_rules('slug','slug','required');
		$valid->set_rules('isi_berita','isi_berita','required');
		$valid->set_rules('status','status','required');
		if (empty($_FILES['gambar']['name']))
		{
			$valid->set_rules('gambar', 'Gambar', 'required');
		}

		if ($valid->run()) {
			$this->sm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('konten/berita','refresh');
		}

		$data['judul'] = "Tambah berita";

		$this->load->view('template/header', $data);
		$this->load->view('konten/berita/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_berita($id = '')
	{
		echo json_encode($this->sm->get_berita($id));
	}

	public function ubah($id_berita)
	{
		$valid = $this->form_validation;
		$valid->set_rules('judul','judul','required');
		$valid->set_rules('slug','slug','required');
		$valid->set_rules('isi_berita','isi_berita','required');
		$valid->set_rules('status','status','required');

		if ($valid->run()) {
			$this->sm->update($id_berita);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('konten/berita','refresh');
		}

		$data['judul'] = "Ubah berita";
		$data['berita'] = $this->sm->get_berita($id_berita);

		$this->load->view('template/header', $data);
		$this->load->view('konten/berita/ubah', $data);
		$this->load->view('template/footer');
	}

}
