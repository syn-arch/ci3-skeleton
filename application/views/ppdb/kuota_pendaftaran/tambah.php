
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('ppdb/kuota_pendaftaran') ?>"class="btn btn-primary tambah-kuota_pendaftaran"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-8 offset-2">
					<form method="POST">
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
							<label for="id_jalur_pendaftaran">Jalur Pendaftaran</label>
							<select name="id_jalur_pendaftaran" id="id_jalur_pendaftaran" class="form-control id_jalur_pendaftaran <?php if(form_error('id_jalur_pendaftaran')) echo 'is-invalid'?>">
								<option value="">-- Silahkan Pilih Jalur Pendaftaran --</option>
								<?php foreach ($jalur_pendaftaran as $row): ?>
									<option value="<?php echo $row['id_jalur_pendaftaran'] ?>"><?php echo $row['nama_jalur_pendaftaran'] ?></option>
								<?php endforeach ?>
							</select>
							<?php echo form_error('id_jalur_pendaftaran', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="id_jurusan">Jurusan</label>
							<select name="id_jurusan" id="id_jurusan" class="form-control id_jurusan <?php if(form_error('id_jurusan')) echo 'is-invalid'?>">
								<option value="">-- Silahkan Pilih Jurusan --</option>
								<?php foreach ($jurusan as $row): ?>
									<option value="<?php echo $row['id_jurusan'] ?>"><?php echo $row['nama_jurusan'] ?></option>
								<?php endforeach ?>
							</select>
							<?php echo form_error('id_jurusan', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="kuota">Kuota</label>
							<input type="text" id="kuota" name="kuota" class="form-control kuota <?php if(form_error('kuota')) echo 'is-invalid'?>" placeholder="Kuota" value="<?php echo set_value('kuota') ?>">
							<?php echo form_error('kuota', '<small style="color:red">','</small>') ?>
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