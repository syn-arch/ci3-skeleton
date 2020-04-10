<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

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

$route['ppdb/gelombang_pendaftaran'] = 'gelombang_pendaftaran';
$route['ppdb/tambah_gelombang_pendaftaran'] = 'gelombang_pendaftaran/tambah';
$route['ppdb/ubah_gelombang_pendaftaran/(:num)'] = 'gelombang_pendaftaran/ubah/$1';
$route['ppdb/hapus_gelombang_pendaftaran/(:num)'] = 'gelombang_pendaftaran/hapus/$1';