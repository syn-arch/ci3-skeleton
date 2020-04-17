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

	public function buat_kode()   {

		$this->db->select('RIGHT(siswa.no_pendaftaran,4) as kode', FALSE);
		$this->db->order_by('no_pendaftaran','DESC');    
		$this->db->limit(1);    

		$query = $this->db->get('siswa');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		    //jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			//jika kode belum ada      
			$kode = 1;    
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BBC-" . date('Y') . '-' . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
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

	public function _upload_siswa($href, $path, $name)
	{
		$config['upload_path'] = './assets/img/' . $path .'/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '2048';
		
		$this->load->library('upload', $config);
		
		if ( !$this->upload->do_upload($name)){
			$this->form_validation->set_message('gambar', $this->upload->display_errors());
			redirect($href,'refresh');
		}

		return $this->upload->data('file_name');
	}

	public function delete($id)
	{
		$gb_lama = $this->db->get_where('siswa',['id_siswa' => $id])->row_array()['gambar'];
		unlink(FCPATH . 'assets/img/siswa/' . $gb_lama);
		$this->db->delete('siswa', ['id_siswa' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'no_pendaftaran' => $this->buat_kode(),
			'calon_siswa' => 1,
			'siswa' => 0,
			'alumni' => 0,
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
			'moda_transportasi' => $post['moda_transportasi'],
			'alamat' => $post['alamat'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'kis' => $post['kis'],
			'kks' => $post['kks'],
			'kps' => $post['kps'],
			'kip' => $post['kip'],
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
			'sebutkan_jarak_tempuh' => $post['sebutkan_jarak_tempuh'],
			'id_jurusan' => $post['id_jurusan'],
			'jenis_pendaftaran' => $post['jenis_pendaftaran'],
			'nis' => $post['nis'],
			'tgl_masuk_sekolah' => $post['tgl_masuk_sekolah'],
			'asal_sekolah' => $post['asal_sekolah'],
			'no_peserta_ujian' => $post['no_peserta_ujian'],
			'ijazah' => $post['ijazah'],
			'skhu' => $post['skhu'],
			'jam_tempuh' => $post['jam_tempuh'],
			'menit_tempuh' => $post['menit_tempuh'],
			'nama_ayah' => $post['nama_ayah'],
			'nik_ayah' => $post['nik_ayah'],
			'pekerjaan_ayah' => $post['pekerjaan_ayah'],
			'penghasilan_ayah' => $post['penghasilan_ayah'],
			'pendidikan_ayah' => $post['pendidikan_ayah'],
			'tgl_lahir_ayah' => $post['tgl_lahir_ayah'],
			'kebutuhan_khusus_ayah' => $post['kebutuhan_khusus_ayah'],
			'nama_ibu' => $post['nama_ibu'],
			'nik_ibu' => $post['nik_ibu'],
			'pekerjaan_ibu' => $post['pekerjaan_ibu'],
			'penghasilan_ibu' => $post['penghasilan_ibu'],
			'pendidikan_ibu' => $post['pendidikan_ibu'],
			'tgl_lahir_ibu' => $post['tgl_lahir_ibu'],
			'kebutuhan_khusus_ibu' => $post['kebutuhan_khusus_ibu'],
			'nama_wali' => $post['nama_wali'],
			'nik_wali' => $post['nik_wali'],
			'pekerjaan_wali' => $post['pekerjaan_wali'],
			'penghasilan_wali' => $post['penghasilan_wali'],
			'pendidikan_wali' => $post['pendidikan_wali'],
			'tgl_lahir_wali' => $post['tgl_lahir_wali'],
			'kebutuhan_khusus_wali' => $post['kebutuhan_khusus_wali'],
			'id_jalur_pendaftaran' => $post['id_jalur_pendaftaran'],
			'id_gelombang_pendaftaran' => $post['id_gelombang_pendaftaran'],
			'gambar' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'siswa', 'gambar'),
			'foto_identitas_raport' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'foto_identitas_raport'),
			'foto_selfie_raport' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'foto_selfie_raport'),
			'raport_semester_1' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'raport_semester_1'),
			'raport_semester_2' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'raport_semester_2'),
			'raport_semester_3' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'raport_semester_3'),
			'raport_semester_4' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'raport_semester_4'),
			'raport_semester_5' => $this->_upload_siswa('ppdb/tambah_calon_siswa', 'lampiran', 'raport_semester_5')
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
			'moda_transportasi' => $post['moda_transportasi'],
			'alamat' => $post['alamat'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'kis' => $post['kis'],
			'kks' => $post['kks'],
			'kps' => $post['kps'],
			'kip' => $post['kip'],
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
			'sebutkan_jarak_tempuh' => $post['sebutkan_jarak_tempuh'],
			'id_jurusan' => $post['id_jurusan'],
			'jenis_pendaftaran' => $post['jenis_pendaftaran'],
			'nis' => $post['nis'],
			'tgl_masuk_sekolah' => $post['tgl_masuk_sekolah'],
			'asal_sekolah' => $post['asal_sekolah'],
			'no_peserta_ujian' => $post['no_peserta_ujian'],
			'ijazah' => $post['ijazah'],
			'skhu' => $post['skhu'],
			'jam_tempuh' => $post['jam_tempuh'],
			'menit_tempuh' => $post['menit_tempuh'],
			'nama_ayah' => $post['nama_ayah'],
			'nik_ayah' => $post['nik_ayah'],
			'pekerjaan_ayah' => $post['pekerjaan_ayah'],
			'penghasilan_ayah' => $post['penghasilan_ayah'],
			'pendidikan_ayah' => $post['pendidikan_ayah'],
			'tgl_lahir_ayah' => $post['tgl_lahir_ayah'],
			'kebutuhan_khusus_ayah' => $post['kebutuhan_khusus_ayah'],
			'nama_ibu' => $post['nama_ibu'],
			'nik_ibu' => $post['nik_ibu'],
			'pekerjaan_ibu' => $post['pekerjaan_ibu'],
			'penghasilan_ibu' => $post['penghasilan_ibu'],
			'pendidikan_ibu' => $post['pendidikan_ibu'],
			'tgl_lahir_ibu' => $post['tgl_lahir_ibu'],
			'kebutuhan_khusus_ibu' => $post['kebutuhan_khusus_ibu'],
			'nama_wali' => $post['nama_wali'],
			'nik_wali' => $post['nik_wali'],
			'pekerjaan_wali' => $post['pekerjaan_wali'],
			'penghasilan_wali' => $post['penghasilan_wali'],
			'pendidikan_wali' => $post['pendidikan_wali'],
			'tgl_lahir_wali' => $post['tgl_lahir_wali'],
			'kebutuhan_khusus_wali' => $post['kebutuhan_khusus_wali'],
			'id_jalur_pendaftaran' => $post['id_jalur_pendaftaran']
		];

		if ($_FILES['gambar']['name']) {
			$data['gambar'] = $this->_upload_siswa('ppdb/calon_siswa', 'siswa', 'gambar');
		}

		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa', $data);
	}

	
}

/* End of file calon_siswa_m.php */
/* Location: ./application/models/calon_siswa_m.php */ ?>