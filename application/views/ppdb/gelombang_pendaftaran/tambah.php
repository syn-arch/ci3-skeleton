
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/jurusan') ?>"class="btn btn-primary tambah-jurusan"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-8 offset-2">
					<form method="POST">
						<div class="form-group">
							<label for="nama_gelombang_pendaftaran">Nama Gelombang Pendaftaran</label>
							<input type="text" id="nama_gelombang_pendaftaran" name="nama_gelombang_pendaftaran" class="form-control nama_gelombang_pendaftaran <?php if(form_error('nama_gelombang_pendaftaran')) echo 'is-invalid'?>" placeholder="Nama Gelombang Pendaftaran" value="<?php echo set_value('nama_gelombang_pendaftaran') ?>">
							<?php echo form_error('nama_gelombang_pendaftaran', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="tgl_mulai">Tanggal Mulai</label>
							<input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control tgl_mulai <?php if(form_error('tgl_mulai')) echo 'is-invalid'?>" placeholder="Tanggal Mulai" value="<?php echo set_value('tgl_mulai') ?>">
							<?php echo form_error('tgl_mulai', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="tgl_selesai">Tanggal Selesai</label>
							<input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control tgl_selesai <?php if(form_error('tgl_selesai')) echo 'is-invalid'?>" placeholder="Tanggal Selesai" value="<?php echo set_value('tgl_selesai') ?>">
							<?php echo form_error('tgl_selesai', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="id_tahun_akademik">Tahun Akademik</label>
							<select name="id_tahun_akademik" id="id_tahun_akademik" class="form-control id_tahun_akademik <?php if(form_error('id_tahun_akademik')) echo 'is-invalid'?>">
								<option value="">-- Silahkan Pilih Tahun Akademik --</option>
								<?php foreach ($tahun_akademik as $row): ?>
									<option value="<?php echo $row['id_tahun_akademik'] ?>"><?php echo $row['tahun'] ?></option>
								<?php endforeach ?>
							</select>
							<?php echo form_error('id_tahun_akademik', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>