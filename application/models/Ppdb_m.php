<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb_m extends CI_Model {

	public function get_ppdb()
	{
		return $this->db->get('ppdb')->row_array();
	}

	public function _upload_ppdb()
	{
		$config['upload_path'] = './assets/img/ppdb/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('ppdb','refresh');
		}

		return $this->upload->data('file_name');
	}

	public function update()
	{
		$post = $this->input->post();

		$data = [
			'tgl_pengumuman' => $post['tgl_pengumuman'],
			'tgl_dibuka' => $post['tgl_dibuka'],
			'tgl_ditutup' => $post['tgl_ditutup'],
			'keterangan' => $post['keterangan']
		];

		if ($_FILES['gambar']['name']) {
			$data['gambar'] = $this->_upload_ppdb();
		}

		$this->db->update('ppdb', $data);
	}

	public function get_all_calon_siswa()
	{
		$this->datatables->select('*');
		$this->datatables->from('calon_siswa');
		return $this->datatables->generate();
	}

	public function delete($id)
	{
		$this->db->delete('calon_siswa',['id_calon_siswa' => $id]);
	}

	

}

/* End of file Ppdb_m.php */
/* Location: ./application/models/Ppdb_m.php */ ?>