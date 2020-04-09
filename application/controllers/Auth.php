<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('dashboard','refresh');
		}

		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username', 'required');
		$valid->set_rules('password', 'Password', 'required');

		if ($valid->run() == TRUE) {

			$post = $this->input->post();

			$username = $post['username'];
			$password = $post['password'];

			$user = $this->db->get_where('user', ['username' => $username])->row_array();

			if ($user) {

				if (password_verify($password, $user['password'])) {

					$data = [
						'login' => true,
						'id_user' => $user['id_user'],
						'username' => $user['username'],
						'id_role' => $user['id_role']
					];

					$this->session->set_userdata($data);

					redirect('dashboard','refresh');
					
				}else{
					$this->session->set_flashdata('error', 'Username atau password anda salah!');
					redirect('login','refresh');
				}
				
			}else{
				$this->session->set_flashdata('error', 'Username atau password anda salah!');
				redirect('login','refresh');
			}

		}

		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
