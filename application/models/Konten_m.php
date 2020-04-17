<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_m extends CI_Model {

	public function get_konten($id='')
	{
			return $this->db->get('konten')->row_array();
	}

	public function _upload_logo()
	{
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('logo')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('konten','refresh');
		}

		return $this->upload->data('file_name');
	}

	public function update()
	{
		$post = $this->input->post();

		$data = [
			'nama_sekolah' => $post['nama_sekolah'],
			'visi' => $post['visi'],
			'misi' => $post['misi'],
			'alamat' => $post['alamat'],
			'telepon' => $post['telepon'],
			'email' => $post['email']
		];

		if ($_FILES['logo']['name']) {
			$gb_lama = $this->db->get('konten')->row_array()['logo'];
			unlink(FCPATH . '/assets/img/' . $gb_lama);
			$data['logo'] = $this->_upload_logo();
		}

		$this->db->update('konten', $data);
	}

	
}

/* End of file Konten_m.php */
/* Location: ./application/models/Konten_m.php */ ?>