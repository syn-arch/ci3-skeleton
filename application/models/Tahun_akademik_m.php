<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_akademik_m extends CI_Model {

	public function get_tahun_akademik($id='')
	{
		if ($id ==  '') {
			return $this->db->get('tahun_akademik')->result_array();
		}else{
			return $this->db->get_where('tahun_akademik', ['id_tahun_akademik' => $id])->row_array();
		}
	}

	function get_all_tahun_akademik() {
		$this->datatables->select('*');
		$this->datatables->from('tahun_akademik');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('tahun_akademik', ['id_tahun_akademik' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		if ($post['semester_saat_ini'] == 1) {
			$this->db->set('semester_saat_ini', 0);
			$this->db->update('tahun_akademik');
		}

		$data = [
			'tahun' => $post['tahun'],
			'semester' => $post['semester'],
			'semester_saat_ini' => $post['semester_saat_ini']
		];
		$this->db->insert('tahun_akademik', $data);
	}

	public function update($id_tahun_akademik)
	{
		$post = $this->input->post();

		if ($post['semester_saat_ini'] == 1) {
			$this->db->set('semester_saat_ini', 0);
			$this->db->update('tahun_akademik');
		}

		$data = [
			'tahun' => $post['tahun'],
			'semester' => $post['semester'],
			'semester_saat_ini' => $post['semester_saat_ini']
		];

		$this->db->where('id_tahun_akademik', $id_tahun_akademik);
		$this->db->update('tahun_akademik', $data);
	}

	
}

/* End of file tahun_akademik_m.php */
/* Location: ./application/models/tahun_akademik_m.php */ ?>