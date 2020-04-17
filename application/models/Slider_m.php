<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class slider_m extends CI_Model {

	public function get_slider($id='')
	{
		if ($id ==  '') {
			return $this->db->get('slider')->result_array();
		}else{
			return $this->db->get_where('slider', ['id_slider' => $id])->row_array();
		}
	}

	public function _upload_gambar($url)
	{
		$config['upload_path'] = './assets/img/slider/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect($url,'refresh');
		}

		return $this->upload->data('file_name');
	}

	function get_all_slider() {
		$this->datatables->select('*');
		$this->datatables->from('slider');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$gb_lama = $this->db->get('slider',['id_slider' => $id])->row_array()['gambar'];
		unlink(FCPATH . 'assets/img/slider/' . $gb_lama);
		$this->db->delete('slider', ['id_slider' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'judul' => $post['judul'],
			'keterangan' => $post['keterangan'],
			'gambar' => $this->_upload_gambar('konten/tambah_slider')
		];
		$this->db->insert('slider', $data);
	}

	public function update($id_slider)
	{
		$post = $this->input->post();

		$data = [
			'judul' => $post['judul'],
			'keterangan' => $post['keterangan']
		];

		if ($_FILES['gambar']['name']) {
			$gb_lama = $this->db->get('slider',['id_slider' => $id_slider])->row_array()['gambar'];
			unlink(FCPATH . 'assets/img/slider/' . $gb_lama);
			$data['gambar'] = $this->_upload_gambar('konten/ubah_slider/' . $id_slider);
		}

		$this->db->where('id_slider', $id_slider);
		$this->db->update('slider', $data);
	}

	
}

/* End of file slider_m.php */
/* Location: ./application/models/slider_m.php */ ?>