
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/tahun_akademik') ?>"class="btn btn-primary tambah-tahun_akademik"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-8 offset-2">
					<form method="POST">
						<div class="form-group">
							<label for="tahun">Tahun</label>
							<input type="text" id="tahun" name="tahun" class="form-control tahun <?php if(form_error('tahun')) echo 'is-invalid'?>" placeholder="Tahun" value="<?php echo $tahun_akademik['tahun'] ?>">
							<?php echo form_error('tahun', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="semester">Semester</label>
							<select name="semester" id="semester" class="form-control semester <?php if(form_error('semester')) echo 'is-invalid'?>">
								<option value="Genap" <?php if($tahun_akademik['semester'] == 'Genap') echo "selected"; ?>>Genap</option>
								<option value="Ganjil"<?php if($tahun_akademik['semester'] == 'Ganjil') echo "selected"; ?>>Ganjil</option>
							</select>
							<?php echo form_error('semester', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="semester_saat_ini">Semester Saat Ini</label>
							<select name="semester_saat_ini" id="semester_saat_ini" class="form-control semester_saat_ini <?php if(form_error('semester_saat_ini')) echo 'is-invalid'?>">
								<option value="1" <?php if($tahun_akademik['semester_saat_ini'] == 1) echo "selected"; ?>>Ya</option>
								<option value="0" <?php if($tahun_akademik['semester_saat_ini'] == 0) echo "selected"; ?>>Tidak</option>
							</select>
							<?php echo form_error('semester_saat_ini', '<small style="color:red">','</small>') ?>
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