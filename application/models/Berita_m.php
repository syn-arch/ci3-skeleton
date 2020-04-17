
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita_m extends CI_Model {

	public function get_berita($id='')
	{
		if ($id ==  '') {
			$this->db->select('*, berita.gambar AS gambar_berita');
			$this->db->join('user', 'id_user');
			$this->db->join('petugas', 'user.id_user = petugas.id_user');
			return $this->db->get('berita')->result_array();
		}else{
			$this->db->select('*, berita.gambar AS gambar_berita');
			$this->db->join('user', 'id_user');
			$this->db->join('petugas', 'user.id_user = petugas.id_user');
			return $this->db->get_where('berita', ['id_berita' => $id])->row_array();
		}
	}

	public function _upload_gambar($url)
	{
		$config['upload_path'] = './assets/img/berita/';
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

	function get_all_berita() {
		$this->datatables->select('*');
		$this->datatables->from('berita');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$gb_lama = $this->db->get('berita',['id_berita' => $id])->row_array()['gambar'];
		unlink(FCPATH . 'assets/img/berita/' . $gb_lama);
		$this->db->delete('berita', ['id_berita' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'id_user' => $this->session->userdata('id_user'),
			'judul' => $post['judul'],
			'slug' => $post['slug'],
			'isi_berita' => $post['isi_berita'],
			'status' => $post['status'],
			'gambar' => $this->_upload_gambar('berita/tambah_berita')
		];
		$this->db->insert('berita', $data);
	}

	public function update($id_berita)
	{
		$post = $this->input->post();

		$data = [
			'judul' => $post['judul'],
			'slug' => $post['slug'],
			'isi_berita' => $post['isi_berita'],
			'status' => $post['status']
		];

		if ($_FILES['gambar']['name']) {
			$gb_lama = $this->db->get('berita',['id_berita' => $id_berita])->row_array()['gambar'];
			unlink(FCPATH . 'assets/img/berita/' . $gb_lama);
			$data['gambar'] = $this->_upload_gambar('berita/ubah_berita/' . $id_berita);
		}

		$this->db->where('id_berita', $id_berita);
		$this->db->update('berita', $data);
	}

	
}

/* End of file berita_m.php */
/* Location: ./application/models/berita_m.php */ ?>