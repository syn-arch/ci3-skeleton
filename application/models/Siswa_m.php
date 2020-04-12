<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model {

	public function get_siswa($calon_siswa = false,$id='')
	{
		if ($calon_siswa == true) {
			if ($id ==  '') {
				return $this->db->get_where('siswa', ['calon_siswa' => 1])->result_array();
			}else{
				return $this->db->get_where('siswa', ['id_siswa' => $id, 'calon_siswa' => 1])->row_array();
			}
		}else{
			if ($id ==  '') {
				return $this->db->get_where('siswa', ['calon_siswa' => 0])->result_array();
			}else{
				return $this->db->get_where('siswa', ['id_siswa' => $id, ['calon_siswa' => 0]])->row_array();
			}
		}
	}

	function get_all_siswa($calon_siswa = false) {
		if ($calon_siswa == true) {
			$this->datatables->select('*');
			$this->datatables->where('calon_siswa', 1);
			$this->datatables->from('siswa');
			return $this->datatables->generate();
		}else{
			$this->datatables->select('*');
			$this->datatables->where('calon_siswa', 0);
			$this->datatables->from('siswa');
			return $this->datatables->generate();
		}
	}

	public function _upload_siswa($calon_siswa = false, $href)
	{
		$config['upload_path'] = './assets/img/siswa/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect($href,'refresh');
		}

		return $this->upload->data('file_name');
	}

	public function delete($id='')
	{
		$this->db->delete('siswa', ['id_siswa' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'nama_siswa' => $post['nama_siswa'],
			'jk' => $post['jk'],
			'tempat_lahir' => $post['tempat_lahir'],
			'tgl_lahir' => $post['tgl_lahir'],
			'agama' => $post['agama'],
			'nisn' => $post['nisn'],
			'nik' => $post['nik'],
			'akta_kelahiran' => $post['akta_kelahiran'],
			'telepon_hp' => $post['telepon_hp'],
			'tempat_tinggal' => $post['tempat_tinggal'],
			'anak_ke' => $post['anak_ke'],
			'alamat' => $post['alamat'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'kode_pos' => $post['kode_pos'],
			'desa' => $post['desa'],
			'dusun' => $post['dusun'],
			'kecamatan' => $post['kecamatan'],
			'kabupaten' => $post['kabupaten'],
			'kewarganegaraan' => $post['kewarganegaraan'],
			'negara' => $post['negara'],
			'tinggi' => $post['tinggi'],
			'berat' => $post['berat'],
			'jumlah_saudara_kandung' => $post['jumlah_saudara_kandung'],
			'jarak_tempuh' => $post['jarak_tempuh'],
			'id_jurusan' => $post['id_jurusan'],
			'jenis_pendaftaran' => $post['jenis_pendaftaran'],
			'nis' => $post['nis'],
			'tgl_masuk_sekolah' => $post['tgl_masuk_sekolah'],
			'asal_sekolah' => $post['asal_sekolah'],
			'no_peserta_ujian' => $post['no_peserta_ujian'],
			'ijazah' => $post['ijazah'],
			'skhu' => $post['skhu'],
			'gambar' => $this->_upload_siswa(true, 'ppdb/tambah_salon_siswa')
		];

		$this->db->insert('siswa', $data);
	}

	public function update($id_siswa)
	{
		$post = $this->input->post();

		$data = [
			'nama_siswa' => $post['nama_siswa'],
			'jk' => $post['jk'],
			'tempat_lahir' => $post['tempat_lahir'],
			'tgl_lahir' => $post['tgl_lahir'],
			'agama' => $post['agama'],
			'nisn' => $post['nisn'],
			'nik' => $post['nik'],
			'akta_kelahiran' => $post['akta_kelahiran'],
			'telepon_hp' => $post['telepon_hp'],
			'tempat_tinggal' => $post['tempat_tinggal'],
			'anak_ke' => $post['anak_ke'],
			'alamat' => $post['alamat'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'kode_pos' => $post['kode_pos'],
			'desa' => $post['desa'],
			'dusun' => $post['dusun'],
			'kecamatan' => $post['kecamatan'],
			'kabupaten' => $post['kabupaten'],
			'kewarganegaraan' => $post['kewarganegaraan'],
			'negara' => $post['negara'],
			'tinggi' => $post['tinggi'],
			'berat' => $post['berat'],
			'jumlah_saudara_kandung' => $post['jumlah_saudara_kandung'],
			'jarak_tempuh' => $post['jarak_tempuh'],
			'id_jurusan' => $post['id_jurusan'],
			'jenis_pendaftaran' => $post['jenis_pendaftaran'],
			'nis' => $post['nis'],
			'tgl_masuk_sekolah' => $post['tgl_masuk_sekolah'],
			'asal_sekolah' => $post['asal_sekolah'],
			'no_peserta_ujian' => $post['no_peserta_ujian'],
			'ijazah' => $post['ijazah'],
			'skhu' => $post['skhu'],
		];

		if ($_FILES['gambar']['name']) {
			$data['gambar'] = $this->_upload_siswa(true, 'ppdb/tambah_salon_siswa');
		}

		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa', $data);
	}

	
}

/* End of file calon_siswa_m.php */
/* Location: ./application/models/calon_siswa_m.php */ ?>