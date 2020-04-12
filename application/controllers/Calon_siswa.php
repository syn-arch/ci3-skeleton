<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('Siswa_m','sm');
		$this->load->model('Jurusan_m','jm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Data Calon Siswa";
		$data['calon_siswa'] = $this->sm->get_siswa(true);

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/calon_siswa/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->sm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('ppdb/calon_siswa','refresh');
	}

	function get_calon_siswa_json() {
		header('Content-Type: application/json');
		echo $this->sm->get_all_siswa(true);
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_siswa','Nama Siswa','required');
		$valid->set_rules('jk','Jenis Kelamin','required');
		$valid->set_rules('tempat_lahir','tempat lahir','required');
		$valid->set_rules('tgl_lahir','tanggal lahir','required');
		$valid->set_rules('agama','agama','required');
		$valid->set_rules('nisn','nisn','required');
		$valid->set_rules('nik','nik','required');
		$valid->set_rules('akta_kelahiran','akta_kelahiran','required');
		$valid->set_rules('telepon_hp','telepon hp','required');
		$valid->set_rules('tempat_tinggal','tempat tinggal','required');
		$valid->set_rules('anak_ke','anak ke','required');
		$valid->set_rules('alamat','alamat','required');
		$valid->set_rules('rt','rt','required');
		$valid->set_rules('rw','rw','required');
		$valid->set_rules('kode_pos','kode pos','required');
		$valid->set_rules('desa','desa','required');
		$valid->set_rules('dusun','dusun','required');
		$valid->set_rules('kecamatan','kecamatan','required');
		$valid->set_rules('kabupaten','kabupaten','required');
		$valid->set_rules('kewarganegaraan','kewarganegaraan','required');
		$valid->set_rules('negara','negara','required');
		$valid->set_rules('tinggi','tinggi','required');
		$valid->set_rules('berat','berat','required');
		$valid->set_rules('jumlah_saudara_kandung','jumlah saudara kandung','required');
		$valid->set_rules('jarak_tempuh','jarak tempuh','required');
		$valid->set_rules('id_jurusan','kompetensi keahlian','required');
		$valid->set_rules('jenis_pendaftaran','jenis pendaftaran','required');
		$valid->set_rules('nis','nis','required');
		$valid->set_rules('tgl_masuk_sekolah','tanngal masuk sekolah','required');
		$valid->set_rules('asal_sekolah','asal sekolah','required');
		$valid->set_rules('no_peserta_ujian','no peserta ujian','required');
		$valid->set_rules('ijazah','ijazah','required');
		$valid->set_rules('skhu','skhu','required');

		if ($valid->run()) {
			$this->sm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('ppdb/calon_siswa','refresh');
		}

		$data['judul'] = "Tambah Calon Siswa";
		$data['jurusan'] = $this->jm->get_jurusan();

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/calon_siswa/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_calon_siswa($id = '')
	{
		echo json_encode($this->sm->get_calon_siswa($id));
	}

	public function ubah($id_calon_siswa)
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_siswa','Nama Siswa','required');
		$valid->set_rules('jk','Jenis Kelamin','required');
		$valid->set_rules('tempat_lahir','tempat lahir','required');
		$valid->set_rules('tgl_lahir','tanggal lahir','required');
		$valid->set_rules('agama','agama','required');
		$valid->set_rules('nisn','nisn','required');
		$valid->set_rules('nik','nik','required');
		$valid->set_rules('akta_kelahiran','akta_kelahiran','required');
		$valid->set_rules('telepon_hp','telepon hp','required');
		$valid->set_rules('tempat_tinggal','tempat tinggal','required');
		$valid->set_rules('anak_ke','anak ke','required');
		$valid->set_rules('alamat','alamat','required');
		$valid->set_rules('rt','rt','required');
		$valid->set_rules('rw','rw','required');
		$valid->set_rules('kode_pos','kode pos','required');
		$valid->set_rules('desa','desa','required');
		$valid->set_rules('dusun','dusun','required');
		$valid->set_rules('kecamatan','kecamatan','required');
		$valid->set_rules('kabupaten','kabupaten','required');
		$valid->set_rules('kewarganegaraan','kewarganegaraan','required');
		$valid->set_rules('negara','negara','required');
		$valid->set_rules('tinggi','tinggi','required');
		$valid->set_rules('berat','berat','required');
		$valid->set_rules('jumlah_saudara_kandung','jumlah saudara kandung','required');
		$valid->set_rules('jarak_tempuh','jarak tempuh','required');
		$valid->set_rules('id_jurusan','kompetensi keahlian','required');
		$valid->set_rules('jenis_pendaftaran','jenis pendaftaran','required');
		$valid->set_rules('nis','nis','required');
		$valid->set_rules('tgl_masuk_sekolah','tanngal masuk sekolah','required');
		$valid->set_rules('asal_sekolah','asal sekolah','required');
		$valid->set_rules('no_peserta_ujian','no peserta ujian','required');
		$valid->set_rules('ijazah','ijazah','required');
		$valid->set_rules('skhu','skhu','required');

		if ($valid->run()) {
			$this->sm->update($id_calon_siswa);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('ppdb/calon_siswa','refresh');
		}

		$data['judul'] = "Ubah Calon Siswa";
		$data['calon_siswa'] = $this->sm->get_calon_siswa(true, $id_calon_siswa);

		$this->load->view('template/header', $data);
		$this->load->view('ppdb/calon_siswa/ubah', $data);
		$this->load->view('template/footer');
	}

}