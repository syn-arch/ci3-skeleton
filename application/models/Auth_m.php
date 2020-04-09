<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

	public function get_profile()
	{
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

}

/* End of file role_m.php */
/* Location: ./application/models/role_m.php */ ?>