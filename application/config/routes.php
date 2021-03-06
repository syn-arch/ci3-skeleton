<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['login'] = 'auth';

$route['master/jurusan'] = 'jurusan';
$route['master/tambah_jurusan'] = 'jurusan/tambah';
$route['master/ubah_jurusan/(:num)'] = 'jurusan/ubah/$1';
$route['master/hapus_jurusan/(:num)'] = 'jurusan/hapus/$1';
$route['master/get_jurusan_json'] = 'jurusan/get_jurusan_json';

$route['master/tahun_akademik'] = 'tahun_akademik';
$route['master/tambah_tahun_akademik'] = 'tahun_akademik/tambah';
$route['master/ubah_tahun_akademik/(:num)'] = 'tahun_akademik/ubah/$1';
$route['master/hapus_tahun_akademik/(:num)'] = 'tahun_akademik/hapus/$1';

$route['konten/konten'] = 'konten';

$route['konten/slider'] = 'slider';
$route['konten/tambah_slider'] = 'slider/tambah';
$route['konten/ubah_slider/(:num)'] = 'slider/ubah/$1';
$route['konten/hapus_slider/(:num)'] = 'slider/hapus/$1';

$route['konten/kontak'] = 'kontak';
$route['konten/tambah_kontak'] = 'kontak/tambah';
$route['konten/ubah_kontak/(:num)'] = 'kontak/ubah/$1';
$route['konten/hapus_kontak/(:num)'] = 'kontak/hapus/$1';

$route['konten/berita'] = 'berita';
$route['konten/tambah_berita'] = 'berita/tambah';
$route['konten/ubah_berita/(:num)'] = 'berita/ubah/$1';
$route['konten/hapus_berita/(:num)'] = 'berita/hapus/$1';
$route['konten/get_berita_json'] = 'berita/get_berita_json';

$route['ppdb/gelombang_pendaftaran'] = 'gelombang_pendaftaran';
$route['ppdb/tambah_gelombang_pendaftaran'] = 'gelombang_pendaftaran/tambah';
$route['ppdb/ubah_gelombang_pendaftaran/(:num)'] = 'gelombang_pendaftaran/ubah/$1';
$route['ppdb/hapus_gelombang_pendaftaran/(:num)'] = 'gelombang_pendaftaran/hapus/$1';

$route['ppdb/kuota_pendaftaran'] = 'kuota_pendaftaran';
$route['ppdb/tambah_kuota_pendaftaran'] = 'kuota_pendaftaran/tambah';
$route['ppdb/ubah_kuota_pendaftaran/(:num)'] = 'kuota_pendaftaran/ubah/$1';
$route['ppdb/hapus_kuota_pendaftaran/(:num)'] = 'kuota_pendaftaran/hapus/$1';

$route['ppdb/jalur_pendaftaran'] = 'jalur_pendaftaran';
$route['ppdb/tambah_jalur_pendaftaran'] = 'jalur_pendaftaran/tambah';
$route['ppdb/ubah_jalur_pendaftaran/(:num)'] = 'jalur_pendaftaran/ubah/$1';
$route['ppdb/hapus_jalur_pendaftaran/(:num)'] = 'jalur_pendaftaran/hapus/$1';

$route['ppdb/calon_siswa'] = 'calon_siswa';
$route['ppdb/tambah_calon_siswa'] = 'calon_siswa/tambah';
$route['ppdb/ubah_calon_siswa/(:num)'] = 'calon_siswa/ubah/$1';
$route['ppdb/hapus_calon_siswa/(:num)'] = 'calon_siswa/hapus/$1';
$route['ppdb/get_calon_siswa_json'] = 'calon_siswa/get_calon_siswa_json';