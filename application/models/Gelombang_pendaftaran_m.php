<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gelombang_pendaftaran_m extends CI_Model {

	public function get_gelombang_pendaftaran($id='')
	{
		if ($id ==  '') {
					$this->db->join('tahun_akademik', 'id_tahun_akademik');
			return $this->db->get('gelombang_pendaftaran')->result_array();
		}else{
					$this->db->join('tahun_akademik', 'id_tahun_akademik');
			return $this->db->get_where('gelombang_pendaftaran', ['id_gelombang_pendaftaran' => $id])->row_array();
		}
	}

	function get_all_gelombang_pendaftaran() {
		$this->datatables->select('*');
		$this->datatables->from('gelombang_pendaftaran');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('gelombang_pendaftaran', ['id_gelombang_pendaftaran' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'nama_gelombang_pendaftaran' => $post['nama_gelombang_pendaftaran'],
			'tgl_mulai' => $post['tgl_mulai'],
			'tgl_selesai' => $post['tgl_selesai'],
			'id_tahun_akademik' => $post['id_tahun_akademik']
		];
		$this->db->insert('gelombang_pendaftaran', $data);
	}

	public function update($id_gelombang_pendaftaran)
	{
		$post = $this->input->post();

		$data = [
			'nama_gelombang_pendaftaran' => $post['nama_gelombang_pendaftaran'],
			'tgl_mulai' => $post['tgl_mulai'],
			'tgl_selesai' => $post['tgl_selesai'],
			'id_tahun_akademik' => $post['id_tahun_akademik']
		];

		$this->db->where('id_gelombang_pendaftaran', $id_gelombang_pendaftaran);
		$this->db->update('gelombang_pendaftaran', $data);
	}

	
}

/* End of file gelombang_pendaftaran_m.php */
/* Location: ./application/models/gelombang_pendaftaran_m.php */ ?>