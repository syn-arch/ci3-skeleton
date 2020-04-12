<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jalur_pendaftaran_m extends CI_Model {

	public function get_jalur_pendaftaran($id='')
	{
		if ($id ==  '') {
			return $this->db->get('jalur_pendaftaran')->result_array();
		}else{
			return $this->db->get_where('jalur_pendaftaran', ['id_jalur_pendaftaran' => $id])->row_array();
		}
	}

	function get_all_jalur_pendaftaran() {
		$this->datatables->select('*');
		$this->datatables->from('jalur_pendaftaran');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('jalur_pendaftaran', ['id_jalur_pendaftaran' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'nama_jalur_pendaftaran' => $post['nama_jalur_pendaftaran']
		];
		$this->db->insert('jalur_pendaftaran', $data);
	}

	public function update($id_jalur_pendaftaran)
	{
		$post = $this->input->post();

		$data = [
			'nama_jalur_pendaftaran' => $post['nama_jalur_pendaftaran']
		];

		$this->db->where('id_jalur_pendaftaran', $id_jalur_pendaftaran);
		$this->db->update('jalur_pendaftaran', $data);
	}

	
}

/* End of file jalur_pendaftaran_m.php */
/* Location: ./application/models/jalur_pendaftaran_m.php */ ?>