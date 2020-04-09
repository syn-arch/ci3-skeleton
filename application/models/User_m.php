<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function get_user($id='')
	{
		if ($id ==  '') {
			return $this->db->get('user')->result_array();
		}else{
			return $this->db->get_where('user', ['id_user' => $id])->row_array();
		}
		
	}

	function get_all_user($id = '') {
		$this->datatables->select('id_user,username,password,nama_role');
		$this->datatables->from('user');
		$this->datatables->join('role', 'id_role');
		return $this->datatables->generate();

	}

	public function delete($id='')
	{
		$this->db->delete('user', ['id_user' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'username' => $post['username'],
			'id_role' => $post['id_role'],
			'password' => password_hash($post['password'], PASSWORD_DEFAULT)
		];

		$this->db->insert('user', $data);
	}

	public function update($id)
	{
		$post = $this->input->post();

		$data = [
			'id_role' => $post['id_role']
		];

		if ($post['password'] != '') {
			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		}

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}



}

/* End of file User_m.php */
/* Location: ./application/models/User_m.php */ ?>