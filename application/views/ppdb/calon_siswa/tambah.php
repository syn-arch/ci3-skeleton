<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4 class="card-title"><?php echo $judul ?></h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('ppdb/calon_siswa') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<?php if($error =  $this->session->flashdata('error')) : ?>
					<div class="alert-message-error d-none"><?php echo $error ?></div>
				<?php endif; ?>

				<form method="POST" class="form-horizontal" enctype="multipart/form-data">
					<div class="smartwizard">
						<ul>
							<li><a href="#step-1">Data Pribadi<br /><small>Identitas Diri</small></a></li>
							<li><a href="#step-2">Alamat<br /><small>Data Alamat</small></a></li>
							<li><a href="#step-3">Orang Tua<br /><small>Data Orang Tua</small></a></li>
							<li><a href="#step-4">Priodik<br /><small>Data Priodik</small></a></li>
							<li><a href="#step-5">Pendaftaran<br /><small>Data Pendaftaran</small></a></li>
							<li><a href="#step-6">Lampiran<br /><small>Data Lampiran</small></a></li>
						</ul>
						<div>
							<div id="step-1" class="">
								<div class="form-group row mt-4">
									<label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
									<div class="col-sm-10">
										<input type="text" class="form-control nama_siswa <?php if(form_error('nama_siswa')) echo 'is-invalid'?>" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo set_value('nama_siswa') ?>" name="nama_siswa">
										<?php echo form_error('nama_siswa', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="jk">Jenis Kelamin</label></div>
									<div class="col-sm-10">
										<select name="jk" id="jk" class="form-control jk <?php if(form_error('jk')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Jenis Kelamin --</option>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
										<?php echo form_error('jk', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
									<div class="col-sm-10">
										<input type="text" name="tempat_lahir" class="form-control tempat_lahir <?php if(form_error('tempat_lahir')) echo 'is-invalid'?>" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>">
										<?php echo form_error('tempat_lahir', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="date" name="tgl_lahir" class="form-control tgl_lahir <?php if(form_error('tgl_lahir')) echo 'is-invalid'?>" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir') ?>">
										<?php echo form_error('tgl_lahir', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="kebutuhan_khusus">Kebutuhan Khusus</label></div>
									<div class="col-sm-10">
										<select name="kebutuhan_khusus" id="kebutuhan_khusus" class="form-control kebutuhan_khusus <?php if(form_error('kebutuhan_khusus')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Kebutuhan Khusus --</option>
											<option value="Tidak">Tidak</option>
											<option value="Netra">Netra</option>
											<option value="Rungu">Rungu</option>
											<option value="Grahita Ringan">Grahita Ringan</option>
											<option value="Grahita Sedang">Grahita Sedang</option>
											<option value="Daksa Ringan">Daksa Ringan</option>
											<option value="Daksa Sedang">Daksa Sedang</option>
											<option value="Laras">Laras</option>
											<option value="Wicara">Wicara</option>
											<option value="Tuna Ganda">Tuna Ganda</option>
											<option value="Hiperaktif">Hiperaktif</option>
											<option value="Cerdas Istimewa">Cerdas Istimewa</option>
											<option value="Bakat Istimewa">Bakat Istimewa</option>
											<option value="Kesulitan Belajar">Kesulitan Belajar</option>
											<option value="Indigo">Indigo</option>
											<option value="Down Sindrome">Down Sindrome</option>
											<option value="Autis">Autis</option>
										</select>
										<?php echo form_error('kebutuhan_khusus', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="agama" class="col-sm-2 col-form-label">Agama</label>
									<div class="col-sm-10">
										<input type="text" name="agama" class="form-control agama <?php if(form_error('agama')) echo 'is-invalid'?>" id="agama" placeholder="Agama" value="<?php echo set_value('agama') ?>">
										<?php echo form_error('agama', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nisn" class="col-sm-2 col-form-label">NISN</label>
									<div class="col-sm-10">
										<input type="text" name="nisn" class="form-control nisn <?php if(form_error('nisn')) echo 'is-invalid'?>" id="nisn" placeholder="NISN" value="<?php echo set_value('nisn') ?>">
										<?php echo form_error('nisn', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nik" class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" name="nik" class="form-control nik <?php if(form_error('nik')) echo 'is-invalid'?>" id="nik" placeholder="NIK" value="<?php echo set_value('nik') ?>">
										<?php echo form_error('nik', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="akta_kelahiran" class="col-sm-2 col-form-label">No Akta Kelahiran</label>
									<div class="col-sm-10">
										<input type="text" name="akta_kelahiran" class="form-control akta_kelahiran <?php if(form_error('akta_kelahiran')) echo 'is-invalid'?>" id="akta_kelahiran" placeholder="No Akta Kelahiran" value="<?php echo set_value('akta_kelahiran') ?>">
										<?php echo form_error('akta_kelahiran', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="kis" class="col-sm-2 col-form-label">No KIS</label>
									<div class="col-sm-10">
										<input type="text" name="kis" class="form-control kis <?php if(form_error('kis')) echo 'is-invalid'?>" id="kis" placeholder="No KIS" value="<?php echo set_value('kis') ?>">
										<?php echo form_error('kis', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="kks" class="col-sm-2 col-form-label">No KKS <small>Bila menerima</small></label>

									<div class="col-sm-10">
										<input type="text" name="kks" class="form-control kks <?php if(form_error('kks')) echo 'is-invalid'?>" id="kks" placeholder="No KKS" value="<?php echo set_value('kks') ?>">
										<?php echo form_error('kks', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="kip" class="col-sm-2 col-form-label">No KIP</label>
									<div class="col-sm-10">
										<input type="text" name="kip" class="form-control kip <?php if(form_error('kip')) echo 'is-invalid'?>" id="kip" placeholder="No KIP" value="<?php echo set_value('kip') ?>">
										<?php echo form_error('kip', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="kps" class="col-sm-2 col-form-label">No KPS</label>
									<div class="col-sm-10">
										<input type="text" name="kps" class="form-control kps <?php if(form_error('kps')) echo 'is-invalid'?>" id="kps" placeholder="No kps" value="<?php echo set_value('kps') ?>">
										<?php echo form_error('kps', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="telepon_rumah" class="col-sm-2 col-form-label">No Telepon Rumah</label>
									<div class="col-sm-10">
										<input type="text" name="telepon_rumah" class="form-control telepon_rumah <?php if(form_error('telepon_rumah')) echo 'is-invalid'?>" id="telepon_rumah" placeholder="No Telepon Rumah" value="<?php echo set_value('telepon_rumah') ?>">
										<?php echo form_error('telepon_rumah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="telepon_hp" class="col-sm-2 col-form-label">No Telepon Hp</label>
									<div class="col-sm-10">
										<input type="text" name="telepon_hp" class="form-control telepon_hp <?php if(form_error('telepon_hp')) echo 'is-invalid'?>" id="telepon_hp" placeholder="No Telepon Hp" value="<?php echo set_value('telepon_hp') ?>">
										<?php echo form_error('telepon_hp', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="tempat_tinggal">Tempat Tinggal</label></div>
									<div class="col-sm-10">
										<select name="tempat_tinggal" id="tempat_tinggal" class="form-control tempat_tinggal <?php if(form_error('tempat_tinggal')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Tempat Tinggal --</option>
											<option value="Bersama Orang Tua">Bersama Orang Tua</option>
											<option value="Bersama Wali">Bersama Wali</option>
											<option value="Kos">Kos</option>
											<option value="Asrama">Asrama</option>
											<option value="Panti Asuhan">Panti Asuhan</option>
										</select>
										<?php echo form_error('tempat_tinggal', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="anak_ke" class="col-sm-2 col-form-label">Anak Ke</label>
									<div class="col-sm-10">
										<input type="number" name="anak_ke" class="form-control anak_ke <?php if(form_error('anak_ke')) echo 'is-invalid'?>" id="anak_ke" placeholder="Anak Ke" value="<?php echo set_value('anak_ke') ?>">
										<?php echo form_error('anak_ke', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="moda_transportasi" class="col-sm-2 col-form-label">Moda Transportasi</label>
									<div class="col-sm-10">
										<select name="moda_transportasi" id="moda-transportasi" class="form-control moda_transportasi <?php if(form_error('jk')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Moda Transportasi --</option>
											<option value="Jalan Kaki">Jalan Kaki</option>
											<option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
											<option value="Kendaraan Umum/Angkot/Pete-pete">Kendaraan Umum/Angkot/Pete-pete</option>
											<option value="Jemputan Sekolah">Jemputan Sekolah</option>
											<option value="Kereta Api">Kereta Api</option>
											<option value="Ojek">Ojek</option>
											<option value="Andong/Bendi/Sado/Dokar/Delman/Beca">Andong/Bendi/Sado/Dokar/Delman/Beca</option>
											<option value="Perahu Penyebarangan/Rakit/Getek">Perahu Penyebarangan/Rakit/Getek</option>
											<option value="Lainnya">Lainnya</option>
										</select>
										<?php echo form_error('moda_transportasi', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="gambar" class="col-sm-2 col-form-label">Foto</label>
									<div class="col-sm-10">
										<input type="file" name="gambar" class="form-control gambar <?php if(form_error('gambar')) echo 'is-invalid'?>" id="gambar">
										<?php echo form_error('gambar', '<small style="color:red">','</small>') ?>
									</div>
								</div>
							</div>
							<div id="step-2" class="">
								<div class="form-group row mt-4">
									<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
									<div class="col-sm-10">
										<textarea name="alamat" placeholder="Alamat" id="alamat" cols="30" rows="5" class="form-control alamat <?php if(form_error('alamat')) echo 'is-invalid'?>"></textarea>
										<?php echo form_error('alamat', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="rt" class="col-sm-2 col-form-label">RT</label>
									<div class="col-sm-10">
										<input type="text" name="rt" class="form-control rt <?php if(form_error('rt')) echo 'is-invalid'?>" id="rt" placeholder="RT" value="<?php echo set_value('rt') ?>">
										<?php echo form_error('rt', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="rw" class="col-sm-2 col-form-label">RW</label>
									<div class="col-sm-10">
										<input type="text" name="rw" class="form-control rw <?php if(form_error('rw')) echo 'is-invalid'?>" id="rw" placeholder="RW" value="<?php echo set_value('rw') ?>">
										<?php echo form_error('rw', '<small style="color:red">','</small>') ?>
									</div>
								</div>	
								<div class="form-group row">
									<label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
									<div class="col-sm-10">
										<input type="text" name="kode_pos" class="form-control kode_pos <?php if(form_error('kode_pos')) echo 'is-invalid'?>" id="kode_pos" placeholder="Kode Pos" value="<?php echo set_value('kode_pos') ?>">
										<?php echo form_error('kode_pos', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="desa" class="col-sm-2 col-form-label">Desa / Kelurahan</label>
									<div class="col-sm-10">
										<input type="text" name="desa" class="form-control desa <?php if(form_error('desa')) echo 'is-invalid'?>" id="desa" placeholder="Desa" value="<?php echo set_value('desa') ?>">
										<?php echo form_error('desa', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
									<div class="col-sm-10">
										<input type="text" name="dusun" class="form-control dusun <?php if(form_error('dusun')) echo 'is-invalid'?>" id="dusun" placeholder="Dusun" value="<?php echo set_value('dusun') ?>">
										<?php echo form_error('dusun', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
									<div class="col-sm-10">
										<input type="text" name="kecamatan" class="form-control kecamatan <?php if(form_error('kecamatan')) echo 'is-invalid'?>" id="kecamatan" placeholder="Kecamatan" value="<?php echo set_value('kecamatan') ?>">
										<?php echo form_error('kecamatan', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
									<div class="col-sm-10">
										<input type="text" name="kabupaten" class="form-control kabupaten <?php if(form_error('kabupaten')) echo 'is-invalid'?>" id="kabupaten" placeholder="Kabupaten" value="<?php echo set_value('kabupaten') ?>">
										<?php echo form_error('kabupaten', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="kewarganegaraan">Kewarganegaraan</label></div>
									<div class="col-sm-10">
										<select name="kewarganegaraan" id="kewarganegaraan" class="form-control kewarganegaraan <?php if(form_error('kewarganegaraan')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Kewarganegaraan --</option>
											<option value="WNI">Warga Negara Indonesia</option>
											<option value="WNA">Warga Negara Asing</option>
										</select>
										<?php echo form_error('kewarganegaraan', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="negara" class="col-sm-2 col-form-label">Negara</label>
									<div class="col-sm-10">
										<input type="text" name="negara" class="form-control negara <?php if(form_error('negara')) echo 'is-invalid'?>" id="negara" placeholder="Negara" value="<?php echo set_value('negara') ?>">
										<?php echo form_error('negara', '<small style="color:red">','</small>') ?>
									</div>
								</div>
							</div>
							<div id="step-3" class="">
								<div class="form-group row mt-4">
									<label for="nama_ayah" class="col-sm-2 col-form-label">Nama ayah</label>
									<div class="col-sm-10">
										<input type="text" name="nama_ayah" class="form-control nama_ayah <?php if(form_error('nama_ayah')) echo 'is-invalid'?>" id="nama_ayah" placeholder="Nama ayah" value="<?php echo set_value('nama_ayah') ?>">
										<?php echo form_error('nama_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nik_ayah" class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" name="nik_ayah" class="form-control nik_ayah <?php if(form_error('nik_ayah')) echo 'is-invalid'?>" id="nik_ayah" placeholder="NIK" value="<?php echo set_value('nik_ayah') ?>">
										<?php echo form_error('nik_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir_ayah" class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="date" name="tgl_lahir_ayah" class="form-control tgl_lahir_ayah <?php if(form_error('tgl_lahir_ayah')) echo 'is-invalid'?>" id="tgl_lahir_ayah" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir_ayah') ?>">
										<?php echo form_error('tgl_lahir_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="pendidikan_ayah">Pendidikan Terakhir</label></div>
									<div class="col-sm-10">
										<select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control pendidikan_ayah <?php if(form_error('pendidikan_ayah')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Pendidikan Terakhir --</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="D1">D1</option>
											<option value="D2">D2</option>
											<option value="D3">D3</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
										<?php echo form_error('pendidikan_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="pekerjaan_ayah" class="col-sm-2 col-form-label">Pekerjaan ayah</label>
									<div class="col-sm-10">
										<input type="text" name="pekerjaan_ayah" class="form-control pekerjaan_ayah <?php if(form_error('pekerjaan_ayah')) echo 'is-invalid'?>" id="pekerjaan_ayah" placeholder="Pekerjaan ayah" value="<?php echo set_value('pekerjaan_ayah') ?>">
										<?php echo form_error('pekerjaan_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="penghasilan_ayah" class="col-sm-2 col-form-label">Penghasilan ayah</label>
									<div class="col-sm-10">
										<input type="text" name="penghasilan_ayah" class="form-control penghasilan_ayah <?php if(form_error('penghasilan_ayah')) echo 'is-invalid'?>" id="penghasilan_ayah" placeholder="Penghasilan ayah" value="<?php echo set_value('penghasilan_ayah') ?>">
										<?php echo form_error('penghasilan_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="kebutuhan_khusus_ayah">Kebutuhan Khusus ayah</label></div>
									<div class="col-sm-10">
										<select name="kebutuhan_khusus_ayah" id="kebutuhan_khusus_ayah" class="form-control kebutuhan_khusus_ayah <?php if(form_error('kebutuhan_khusus_ayah')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Kebutuhan Khusus ayah --</option>
											<option value="Tidak">Tidak</option>
											<option value="Netra">Netra</option>
											<option value="Rungu">Rungu</option>
											<option value="Grahita Ringan">Grahita Ringan</option>
											<option value="Grahita Sedang">Grahita Sedang</option>
											<option value="Daksa Ringan">Daksa Ringan</option>
											<option value="Daksa Sedang">Daksa Sedang</option>
											<option value="Laras">Laras</option>
											<option value="Wicara">Wicara</option>
											<option value="Tuna Ganda">Tuna Ganda</option>
											<option value="Hiperaktif">Hiperaktif</option>
											<option value="Cerdas Istimewa">Cerdas Istimewa</option>
											<option value="Bakat Istimewa">Bakat Istimewa</option>
											<option value="Kesulitan Belajar">Kesulitan Belajar</option>
											<option value="Indigo">Indigo</option>
											<option value="Down Sindrome">Down Sindrome</option>
											<option value="Autis">Autis</option>
										</select>
										<?php echo form_error('kebutuhan_khusus_ayah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<hr>
								<div class="form-group row mt-4">
									<label for="nama_ibu" class="col-sm-2 col-form-label">Nama ibu</label>
									<div class="col-sm-10">
										<input type="text" name="nama_ibu" class="form-control nama_ibu <?php if(form_error('nama_ibu')) echo 'is-invalid'?>" id="nama_ibu" placeholder="Nama ibu" value="<?php echo set_value('nama_ibu') ?>">
										<?php echo form_error('nama_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nik_ibu" class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" name="nik_ibu" class="form-control nik_ibu <?php if(form_error('nik_ibu')) echo 'is-invalid'?>" id="nik_ibu" placeholder="NIK" value="<?php echo set_value('nik_ibu') ?>">
										<?php echo form_error('nik_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir_ibu" class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="date" name="tgl_lahir_ibu" class="form-control tgl_lahir_ibu <?php if(form_error('tgl_lahir_ibu')) echo 'is-invalid'?>" id="tgl_lahir_ibu" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir_ibu') ?>">
										<?php echo form_error('tgl_lahir_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="pendidikan_ibu">Pendidikan Terakhir</label></div>
									<div class="col-sm-10">
										<select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control pendidikan_ibu <?php if(form_error('pendidikan_ibu')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Pendidikan Terakhir --</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="D1">D1</option>
											<option value="D2">D2</option>
											<option value="D3">D3</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
										<?php echo form_error('pendidikan_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="pekerjaan_ibu" class="col-sm-2 col-form-label">Pekerjaan ibu</label>
									<div class="col-sm-10">
										<input type="text" name="pekerjaan_ibu" class="form-control pekerjaan_ibu <?php if(form_error('pekerjaan_ibu')) echo 'is-invalid'?>" id="pekerjaan_ibu" placeholder="Pekerjaan ibu" value="<?php echo set_value('pekerjaan_ibu') ?>">
										<?php echo form_error('pekerjaan_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="penghasilan_ibu" class="col-sm-2 col-form-label">Penghasilan ibu</label>
									<div class="col-sm-10">
										<input type="text" name="penghasilan_ibu" class="form-control penghasilan_ibu <?php if(form_error('penghasilan_ibu')) echo 'is-invalid'?>" id="penghasilan_ibu" placeholder="Penghasilan ibu" value="<?php echo set_value('penghasilan_ibu') ?>">
										<?php echo form_error('penghasilan_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="kebutuhan_khusus_ibu">Kebutuhan Khusus ibu</label></div>
									<div class="col-sm-10">
										<select name="kebutuhan_khusus_ibu" id="kebutuhan_khusus_ibu" class="form-control kebutuhan_khusus_ibu <?php if(form_error('kebutuhan_khusus_ibu')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Kebutuhan Khusus ibu --</option>
											<option value="Tidak">Tidak</option>
											<option value="Netra">Netra</option>
											<option value="Rungu">Rungu</option>
											<option value="Grahita Ringan">Grahita Ringan</option>
											<option value="Grahita Sedang">Grahita Sedang</option>
											<option value="Daksa Ringan">Daksa Ringan</option>
											<option value="Daksa Sedang">Daksa Sedang</option>
											<option value="Laras">Laras</option>
											<option value="Wicara">Wicara</option>
											<option value="Tuna Ganda">Tuna Ganda</option>
											<option value="Hiperaktif">Hiperaktif</option>
											<option value="Cerdas Istimewa">Cerdas Istimewa</option>
											<option value="Bakat Istimewa">Bakat Istimewa</option>
											<option value="Kesulitan Belajar">Kesulitan Belajar</option>
											<option value="Indigo">Indigo</option>
											<option value="Down Sindrome">Down Sindrome</option>
											<option value="Autis">Autis</option>
										</select>
										<?php echo form_error('kebutuhan_khusus_ibu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<hr>
								<div class="form-group row mt-4">
									<label for="nama_wali" class="col-sm-2 col-form-label">Nama wali</label>
									<div class="col-sm-10">
										<input type="text" name="nama_wali" class="form-control nama_wali <?php if(form_error('nama_wali')) echo 'is-invalid'?>" id="nama_wali" placeholder="Nama wali" value="<?php echo set_value('nama_wali') ?>">
										<?php echo form_error('nama_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nik_wali" class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" name="nik_wali" class="form-control nik_wali <?php if(form_error('nik_wali')) echo 'is-invalid'?>" id="nik_wali" placeholder="NIK" value="<?php echo set_value('nik_wali') ?>">
										<?php echo form_error('nik_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir_wali" class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="date" name="tgl_lahir_wali" class="form-control tgl_lahir_wali <?php if(form_error('tgl_lahir_wali')) echo 'is-invalid'?>" id="tgl_lahir_wali" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir_wali') ?>">
										<?php echo form_error('tgl_lahir_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="pendidikan_wali">Pendidikan Terakhir</label></div>
									<div class="col-sm-10">
										<select name="pendidikan_wali" id="pendidikan_wali" class="form-control pendidikan_wali <?php if(form_error('pendidikan_wali')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Pendidikan Terakhir --</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="D1">D1</option>
											<option value="D2">D2</option>
											<option value="D3">D3</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
										<?php echo form_error('pendidikan_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="pekerjaan_wali" class="col-sm-2 col-form-label">Pekerjaan wali</label>
									<div class="col-sm-10">
										<input type="text" name="pekerjaan_wali" class="form-control pekerjaan_wali <?php if(form_error('pekerjaan_wali')) echo 'is-invalid'?>" id="pekerjaan_wali" placeholder="Pekerjaan wali" value="<?php echo set_value('pekerjaan_wali') ?>">
										<?php echo form_error('pekerjaan_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="penghasilan_wali" class="col-sm-2 col-form-label">Penghasilan wali</label>
									<div class="col-sm-10">
										<input type="text" name="penghasilan_wali" class="form-control penghasilan_wali <?php if(form_error('penghasilan_wali')) echo 'is-invalid'?>" id="penghasilan_wali" placeholder="Penghasilan wali" value="<?php echo set_value('penghasilan_wali') ?>">
										<?php echo form_error('penghasilan_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="kebutuhan_khusus_wali">Kebutuhan Khusus wali</label></div>
									<div class="col-sm-10">
										<select name="kebutuhan_khusus_wali" id="kebutuhan_khusus_wali" class="form-control kebutuhan_khusus_wali <?php if(form_error('kebutuhan_khusus_wali')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Kebutuhan Khusus wali --</option>
											<option value="Tidak">Tidak</option>
											<option value="Netra">Netra</option>
											<option value="Rungu">Rungu</option>
											<option value="Grahita Ringan">Grahita Ringan</option>
											<option value="Grahita Sedang">Grahita Sedang</option>
											<option value="Daksa Ringan">Daksa Ringan</option>
											<option value="Daksa Sedang">Daksa Sedang</option>
											<option value="Laras">Laras</option>
											<option value="Wicara">Wicara</option>
											<option value="Tuna Ganda">Tuna Ganda</option>
											<option value="Hiperaktif">Hiperaktif</option>
											<option value="Cerdas Istimewa">Cerdas Istimewa</option>
											<option value="Bakat Istimewa">Bakat Istimewa</option>
											<option value="Kesulitan Belajar">Kesulitan Belajar</option>
											<option value="Indigo">Indigo</option>
											<option value="Down Sindrome">Down Sindrome</option>
											<option value="Autis">Autis</option>
										</select>
										<?php echo form_error('kebutuhan_khusus_wali', '<small style="color:red">','</small>') ?>
									</div>
								</div>
							</div>
							<div id="step-4" class="">
								<div class="form-group row mt-4">
									<label for="tinggi" class="col-sm-2 col-form-label">Tinggi Badan</label>
									<div class="col-sm-10">
										<input type="text" name="tinggi" class="form-control tinggi <?php if(form_error('tinggi')) echo 'is-invalid'?>" id="tinggi" placeholder="Tinggi Badan" value="<?php echo set_value('tinggi') ?>">
										<?php echo form_error('tinggi', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="berat" class="col-sm-2 col-form-label">Berat Badan</label>
									<div class="col-sm-10">
										<input type="text" name="berat" class="form-control berat <?php if(form_error('berat')) echo 'is-invalid'?>" id="berat" placeholder="Berat Badan" value="<?php echo set_value('berat') ?>">
										<?php echo form_error('berat', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="jumlah_saudara_kandung" class="col-sm-2 col-form-label">Jumlah Saudara Kandung</label>
									<div class="col-sm-10">
										<input type="text" name="jumlah_saudara_kandung" class="form-control jumlah_saudara_kandung <?php if(form_error('jumlah_saudara_kandung')) echo 'is-invalid'?>" id="jumlah_saudara_kandung" placeholder="Jumlah Saudara Kandung" value="<?php echo set_value('jumlah_saudara_kandung') ?>">
										<?php echo form_error('jumlah_saudara_kandung', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="jarak_tempuh">Jarak Tempat Tinggal Ke Sekolah</label></div>
									<div class="col-sm-10">
										<select name="jarak_tempuh" id="jarak_tempuh" class="form-control jarak_tempuh <?php if(form_error('jarak_tempuh')) echo 'is-invalid'?>">
											<option value="Kurang dari 1 KM">Kurang dari 1 KM</option>
											<option value="Lebih dari 1 Km">Lebih dari 1 KM</option>
										</select>
										<?php echo form_error('jarak_tempuh', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row sebutkan_jarak_tempuh">
									<label for="waktu_tempuh" class="col-sm-2 col-form-label">Sebutkan</label>
									<div class="col-sm-10">
										<div class="row">
											<div class="col-sm-10">
												<input type="text" class="form-control" name="sebutkan_jarak_tempuh" placeholder="Sebutkan">
											</div>
										</div>
										<?php echo form_error('waktu_tempuh', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="waktu_tempuh" class="col-sm-2 col-form-label">Waktu Tempuh Ke Sekolah</label>
									<div class="col-sm-10">
										<div class="row">
											<div class="col-sm-4">
												<input type="text" class="form-control" name="jam_tempuh" placeholder="Jam">
											</div>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="menit_tempuh" placeholder="Menit">
											</div>
										</div>
										<?php echo form_error('waktu_tempuh', '<small style="color:red">','</small>') ?>
									</div>
								</div>
							</div>
							<div id="step-5" class="">
								<div class="form-group row mt-4">
									<div class="col-sm-2 col-form-label"><label for="id_jurusan">Kompetensi Keahlian</label></div>
									<div class="col-sm-10">
										<select name="id_jurusan" id="id_jurusan" class="form-control id_jurusan <?php if(form_error('id_jurusan')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Kompetensi Keahlian --</option>
											<?php foreach ($jurusan as $row): ?>
												<option value="<?php echo $row['id_jurusan'] ?>"><?php echo $row['nama_jurusan'] ?></option>
											<?php endforeach ?>
										</select>
										<?php echo form_error('id_jurusan', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="id_jalur_pendaftaran">Jalur Pendaftaran</label></div>
									<div class="col-sm-10">
										<select name="id_jalur_pendaftaran" id="id_jalur_pendaftaran" class="form-control id_jalur_pendaftaran <?php if(form_error('id_jalur_pendaftaran')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Jalur Pendaftaran --</option>
											<?php foreach ($jalur as $row): ?>
												<option value="<?php echo $row['id_jalur_pendaftaran'] ?>"><?php echo $row['nama_jalur_pendaftaran'] ?></option>
											<?php endforeach ?>
										</select>
										<?php echo form_error('id_jalur_pendaftaran', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="id_gelombang_pendaftaran">Gelombang Pendaftaran</label></div>
									<div class="col-sm-10">
										<select name="id_gelombang_pendaftaran" id="id_gelombang_pendaftaran" class="form-control id_gelombang_pendaftaran <?php if(form_error('id_gelombang_pendaftaran')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Jalur Pendaftaran --</option>
											<?php foreach ($gelombang as $row): ?>
												<option value="<?php echo $row['id_gelombang_pendaftaran'] ?>"><?php echo $row['nama_gelombang_pendaftaran'] ?></option>
											<?php endforeach ?>
										</select>
										<?php echo form_error('id_gelombang_pendaftaran', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 col-form-label"><label for="jenis_pendaftaran">Jenis Pendaftaran</label></div>
									<div class="col-sm-10">
										<select name="jenis_pendaftaran" id="jenis_pendaftaran" class="form-control jenis_pendaftaran <?php if(form_error('jenis_pendaftaran')) echo 'is-invalid'?>">
											<option value="">-- Silahkan Pilih Jenis Pendaftaran --</option>
											<option value="Siswa Baru">Siswa Baru</option>
											<option value="Pindahan">Pindahan</option>
											<option value="Kembali Bersekolah">Kembali Bersekolah</option>
										</select>
										<?php echo form_error('jenis_pendaftaran', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nis" class="col-sm-2 col-form-label">NIS</label>
									<div class="col-sm-10">
										<input type="text" name="nis" class="form-control nis <?php if(form_error('nis')) echo 'is-invalid'?>" id="nis" placeholder="NIS" value="<?php echo set_value('nis') ?>">
										<?php echo form_error('nis', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_masuk_sekolah" class="col-sm-2 col-form-label">Tanggal Masuk Sekolah</label>
									<div class="col-sm-10">
										<input type="date" name="tgl_masuk_sekolah" class="form-control tgl_masuk_sekolah <?php if(form_error('tgl_masuk_sekolah')) echo 'is-invalid'?>" id="tgl_masuk_sekolah" placeholder="Tanggal Masuk Sekolah" value="<?php echo set_value('tgl_masuk_sekolah') ?>">
										<?php echo form_error('tgl_masuk_sekolah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
									<div class="col-sm-10">
										<input type="text" name="asal_sekolah" class="form-control asal_sekolah <?php if(form_error('asal_sekolah')) echo 'is-invalid'?>" id="asal_sekolah" placeholder="Asal Sekolah" value="<?php echo set_value('asal_sekolah') ?>">
										<?php echo form_error('asal_sekolah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_peserta_ujian" class="col-sm-2 col-form-label">No Peserta Ujian</label>
									<div class="col-sm-10">
										<input type="text" name="no_peserta_ujian" class="form-control no_peserta_ujian <?php if(form_error('no_peserta_ujian')) echo 'is-invalid'?>" id="no_peserta_ujian" placeholder="No Peserta Ujian" value="<?php echo set_value('no_peserta_ujian') ?>">
										<?php echo form_error('no_peserta_ujian', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="ijazah" class="col-sm-2 col-form-label">No Seri Ijazah</label>
									<div class="col-sm-10">
										<input type="text" name="ijazah" class="form-control ijazah <?php if(form_error('ijazah')) echo 'is-invalid'?>" id="ijazah" placeholder="No Seri Ijazah" value="<?php echo set_value('ijazah') ?>">
										<?php echo form_error('ijazah', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="skhu" class="col-sm-2 col-form-label">No Seri SKHUS</label>
									<div class="col-sm-10">
										<input type="text" name="skhu" class="form-control skhu <?php if(form_error('skhu')) echo 'is-invalid'?>" id="skhu" placeholder="No Seri SKHUS" value="<?php echo set_value('skhu') ?>">
										<?php echo form_error('skhu', '<small style="color:red">','</small>') ?>
									</div>
								</div>
							</div>
							<div id="step-6" class="">
								<div class="form-group row mt-4">
									<label for="foto_identitas_raport" class="col-sm-2 col-form-label">Foto Identitas Raport</label>
									<div class="col-sm-10">
										<input type="file" name="foto_identitas_raport" class="form-control foto_identitas_raport <?php if(form_error('foto_identitas_raport')) echo 'is-invalid'?>" id="foto_identitas_raport">
										<?php echo form_error('foto_identitas_raport', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="foto_selfie_raport" class="col-sm-2 col-form-label">Foto Selfie Raport</label>
									<div class="col-sm-10">
										<input type="file" name="foto_selfie_raport" class="form-control foto_selfie_raport <?php if(form_error('foto_selfie_raport')) echo 'is-invalid'?>" id="foto_selfie_raport">
										<?php echo form_error('foto_selfie_raport', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="raport_semester_1" class="col-sm-2 col-form-label">Raport Semester 1</label>
									<div class="col-sm-10">
										<input type="file" name="raport_semester_1" class="form-control raport_semester_1 <?php if(form_error('raport_semester_1')) echo 'is-invalid'?>" id="raport_semester_1">
										<?php echo form_error('raport_semester_1', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="raport_semester_2" class="col-sm-2 col-form-label">Raport Semester 2</label>
									<div class="col-sm-10">
										<input type="file" name="raport_semester_2" class="form-control raport_semester_2 <?php if(form_error('raport_semester_2')) echo 'is-invalid'?>" id="raport_semester_2">
										<?php echo form_error('raport_semester_2', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="raport_semester_3" class="col-sm-2 col-form-label">Raport Semester 3</label>
									<div class="col-sm-10">
										<input type="file" name="raport_semester_3" class="form-control raport_semester_3 <?php if(form_error('raport_semester_3')) echo 'is-invalid'?>" id="raport_semester_3">
										<?php echo form_error('raport_semester_3', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="raport_semester_4" class="col-sm-2 col-form-label">Raport Semester 4</label>
									<div class="col-sm-10">
										<input type="file" name="raport_semester_4" class="form-control raport_semester_4 <?php if(form_error('raport_semester_4')) echo 'is-invalid'?>" id="raport_semester_4">
										<?php echo form_error('raport_semester_1', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="raport_semester_5" class="col-sm-2 col-form-label">Raport Semester 5</label>
									<div class="col-sm-10">
										<input type="file" name="raport_semester_5" class="form-control raport_semester_5 <?php if(form_error('raport_semester_5')) echo 'is-invalid'?>" id="raport_semester_5">
										<?php echo form_error('raport_semester_5', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="form-group row mt-4">
									<div class="col-sm-2"></div>
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary btn-block">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>