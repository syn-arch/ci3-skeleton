
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('ppdb/jalur_pendaftaran') ?>"class="btn btn-primary tambah-jurusan"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-8 offset-2">
					<form method="POST">
						<div class="form-group">
							<label for="nama_jalur_pendaftaran">Nama Jalur Pendaftaran</label>
							<input type="text" id="nama_jalur_pendaftaran" name="nama_jalur_pendaftaran" class="form-control nama_jalur_pendaftaran <?php if(form_error('nama_jalur_pendaftaran')) echo 'is-invalid'?>" placeholder="Nama Jalur Pendaftaran" value="<?php echo set_value('nama_jalur_pendaftaran') ?>">
							<?php echo form_error('nama_jalur_pendaftaran', '<small style="color:red">','</small>') ?>
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