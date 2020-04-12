<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuota_pendaftaran_m extends CI_Model {

	public function get_kuota_pendaftaran($id='')
	{
		if ($id ==  '') {
					$this->db->join('jalur_pendaftaran', 'id_jalur_pendaftaran');
					$this->db->join('tahun_akademik', 'id_tahun_akademik');
					$this->db->join('jurusan', 'id_jurusan');
			return $this->db->get('kuota_pendaftaran')->result_array();
		}else{
					$this->db->join('jalur_pendaftaran', 'id_jalur_pendaftaran');
					$this->db->join('tahun_akademik', 'id_tahun_akademik');
					$this->db->join('jurusan', 'id_jurusan');
			return $this->db->get_where('kuota_pendaftaran', ['id_kuota_pendaftaran' => $id])->row_array();
		}
	}

	function get_all_kuota_pendaftaran() {
		$this->datatables->select('*');
		$this->datatables->from('kuota_pendaftaran');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('kuota_pendaftaran', ['id_kuota_pendaftaran' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'id_tahun_akademik' => $post['id_tahun_akademik'],
			'id_jalur_pendaftaran' => $post['id_jalur_pendaftaran'],
			'id_jurusan' => $post['id_jurusan'],
			'kuota' => $post['kuota']
		];
		$this->db->insert('kuota_pendaftaran', $data);
	}

	public function update($id_kuota_pendaftaran)
	{
		$post = $this->input->post();

		$data = [
			'id_tahun_akademik' => $post['id_tahun_akademik'],
			'id_jalur_pendaftaran' => $post['id_jalur_pendaftaran'],
			'id_jurusan' => $post['id_jurusan'],
			'kuota' => $post['kuota']
		];

		$this->db->where('id_kuota_pendaftaran', $id_kuota_pendaftaran);
		$this->db->update('kuota_pendaftaran', $data);
	}

	
}

/* End of file kuota_pendaftaran_m.php */
/* Location: ./application/models/kuota_pendaftaran_m.php */ ?>