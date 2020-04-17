
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak_m extends CI_Model {

	public function get_kontak($id='')
	{
		if ($id ==  '') {
			return $this->db->get('kontak')->result_array();
		}else{
			return $this->db->get_where('kontak', ['id_kontak' => $id])->row_array();
		}
	}

	public function _upload_gambar($url)
	{
		$config['upload_path'] = './assets/img/kontak/';
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

	function get_all_kontak() {
		$this->datatables->select('*');
		$this->datatables->from('kontak');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$gb_lama = $this->db->get('kontak',['id_kontak' => $id])->row_array()['gambar'];
		unlink(FCPATH . 'assets/img/kontak/' . $gb_lama);
		$this->db->delete('kontak', ['id_kontak' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'nama_kontak' => $post['nama_kontak'],
			'link' => $post['link'],
			'gambar' => $this->_upload_gambar('kontak/tambah_kontak')
		];
		$this->db->insert('kontak', $data);
	}

	public function update($id_kontak)
	{
		$post = $this->input->post();

		$data = [
			'nama_kontak' => $post['nama_kontak'],
			'link' => $post['link']
		];

		if ($_FILES['gambar']['name']) {
			$gb_lama = $this->db->get('kontak',['id_kontak' => $id_kontak])->row_array()['gambar'];
			unlink(FCPATH . 'assets/img/kontak/' . $gb_lama);
			$data['gambar'] = $this->_upload_gambar('kontak/ubah_kontak/' . $id_kontak);
		}

		$this->db->where('id_kontak', $id_kontak);
		$this->db->update('kontak', $data);
	}

	
}

/* End of file kontak_m.php */
/* Location: ./application/models/kontak_m.php */ ?>