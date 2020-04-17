<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('Slider_m','sm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Slider";
		$data['slider'] = $this->sm->get_Slider();

		$this->load->view('template/header', $data);
		$this->load->view('konten/Slider/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->sm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('konten/slider','refresh');
	}

	function get_Slider_json() {
		header('Content-Type: application/json');
		echo $this->sm->get_all_Slider();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('judul','Judul','required');
		$valid->set_rules('keterangan','keterangan','required');
		if (empty($_FILES['gambar']['name']))
		{
			$valid->set_rules('gambar', 'Gambar', 'required');
		}

		if ($valid->run()) {
			$this->sm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('konten/slider','refresh');
		}

		$data['judul'] = "Tambah Slider";

		$this->load->view('template/header', $data);
		$this->load->view('konten/Slider/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_Slider($id = '')
	{
		echo json_encode($this->sm->get_Slider($id));
	}

	public function ubah($id_Slider)
	{
		$valid = $this->form_validation;
		$valid->set_rules('judul','Judul','required');
		$valid->set_rules('keterangan','keterangan','required');

		if ($valid->run()) {
			$this->sm->update($id_Slider);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('konten/slider','refresh');
		}

		$data['judul'] = "Ubah Slider";
		$data['slider'] = $this->sm->get_Slider($id_Slider);

		$this->load->view('template/header', $data);
		$this->load->view('konten/Slider/ubah', $data);
		$this->load->view('template/footer');
	}

}
