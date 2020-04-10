<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_m extends CI_Model {

	public function get_profile()
	{
				$this->db->join('petugas', 'id_user');
				$this->db->join('role', 'user.id_role=role.id_role');
		return $this->db->get('user',['id_user' => $this->session->userdata('id_user')])->row_array();
	}

	public function change_password()
	{
		$post = $this->input->post();
		$id_user = $this->session->userdata('id_user');

		$pw_lama = $this->db->get_where('user',['id_user' => $id_user])->row_array()['password'];

		if (password_verify($post['password_lama'], $pw_lama)) {

			$this->db->where('id_user', $id_user);
			$this->db->update('user', ['password' => password_hash($post['password_baru'], PASSWORD_DEFAULT)]);
			
		}else{
			$this->session->set_flashdata('error', 'Password lama tidak sama!');
			redirect('profil/ubah_password','refresh');
		}
	}

	public function update_profile()
	{
		$post = $this->input->post();
		$id_user = $this->session->userdata('id_user');
		$id_petugas = $this->db->get('petugas',['id_user' => $id_user])->row_array()['id_petugas'];

		$data = [
			'nama_petugas' => $post['nama_petugas'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'telepon' => $post['telepon'],
			'jk' => $post['jk']
		];

		$this->db->where('id_petugas', $id_petugas);
		$this->db->update('petugas', $data);
	}

	public function update_login()
	{
		$id_user = $this->session->userdata('id_user');
		$post = $this->input->post();

		$this->db->where('id_user', $id_user);
		$this->db->update('user', ['username' => $post['username']]);
	}

}

/* End of file Profil_m.php */
/* Location: ./application/models/Profil_m.php */ ?>