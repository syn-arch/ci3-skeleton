<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('datatables');
		$this->load->model('User_m','um');
		$this->load->model('Role_m','rm');
	}

	public function index()
	{
		$data['judul'] = "Data User";
		$data['role'] = $this->rm->get_role();

		$this->load->view('template/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->um->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('user','refresh');
	}

	function get_user_json() {
		header('Content-Type: application/json');
		echo $this->um->get_all_user();
	}

	public function simpan()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_petugas', 'nama petugas', 'required');
		$valid->set_rules('telepon', 'telepon', 'required');
		$valid->set_rules('email', 'email', 'required|is_unique[petugas.email]');
		$valid->set_rules('alamat', 'alamat', 'required');
		$valid->set_rules('username', 'username', 'required|is_unique[user.username]');
		$valid->set_rules('password', 'Password', 'required|min_length[8]');
		$valid->set_rules('id_role', 'Role', 'required');

		if ($valid->run()) {
			$this->um->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('user','refresh');
		}

		$this->index();
	}

	public function get_user($id = '')
	{
		echo json_encode($this->um->get_user($id));
	}

	public function ubah($id_user, $id_petugas)
	{
		$valid = $this->form_validation;
		$valid->set_rules('username', 'Username', 'is_unique[user.username]');
		$valid->set_rules('password', 'Password', 'min_length[8]');
		$valid->set_rules('id_role', 'Role', 'required');

		if ($valid->run()) {
			$this->um->update($id_user, $id_petugas);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('user','refresh');
		}

		$this->index();
	}

}
