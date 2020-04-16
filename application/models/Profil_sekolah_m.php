<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil_sekolah_m extends CI_Model {

	public function get_profil_sekolah($id='')
	{
			return $this->db->get('profil_sekolah')->row_array();
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
			redirect('profil_sekolah','refresh');
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
			$data['logo'] = $this->_upload_logo();
		}

		$this->db->update('profil_sekolah', $data);
	}

	
}

/* End of file profil_sekolah_m.php */
/* Location: ./application/models/profil_sekolah_m.php */ ?>