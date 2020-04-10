<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function get_user($id='')
	{
		if ($id ==  '') {
			$this->db->join('petugas', 'id_user');
			return $this->db->get_where('user', ['id_role' => 1])->result_array();
		}else{
			$this->db->join('petugas', 'id_user');
			return $this->db->get_where('user', ['id_user' => $id])->row_array();
		}
	}

	function get_all_user() {
		$this->datatables->select('*');
		$this->datatables->from('user');
		$this->datatables->join('role', 'id_role');
		$this->datatables->join('petugas', 'id_user');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('user', ['id_user' => $id]);
	}

	private function _upload_petugas()
	{
		$config['upload_path'] = './assets/img/petugas/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('user','refresh');
		}

		return $this->upload->data('file_name');
	}

	public function insert()
	{
		$post = $this->input->post();

		$data_petugas = [
			'nama_petugas' => $post['nama_petugas'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'telepon' => $post['telepon'],
			'gambar' => $this->_upload_petugas()
		];

		$this->db->insert('petugas', $data_petugas);

		$data = [
			'username' => $post['username'],
			'id_role' => $post['id_role'],
			'password' => password_hash($post['password'], PASSWORD_DEFAULT)
		];

		$this->db->insert('user', $data);
	}

	public function update($id_user, $id_petugas)
	{
		$post = $this->input->post();

		$data_petugas = [
			'nama_petugas' => $post['nama_petugas'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'telepon' => $post['telepon']
		];

		if ($_FILES['gambar']['name']) {
			$gb_lama = $this->db->get_where('petugas',['id_petugas' => $id_petugas])->row_array()['gambar'];
			unlink(FCPATH . 'assets/' . $gb_lama);
			$data_petugas['gambar'] = $this->_upload_petugas();
		}

		$this->db->where('id_petugas', $id_petugas);
		$this->db->update('petugas', $data_petugas);

		$data = ['id_role' => $post['id_role']];

		if ($post['password'] != '') {
			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		}

		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	
}

/* End of file User_m.php */
/* Location: ./application/models/User_m.php */ ?>