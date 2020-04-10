<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h4 class="card-title"><?php echo $judul ?></h4>
			</div>
			<div class="card-body">
				<div class="col-md-8 offset-2">

					<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
						<div class="alert-message d-none"><?php echo $pesan ?></div>
					<?php endif; ?>

					<?php if($error =  $this->session->flashdata('error')) : ?>
						<div class="alert-message-error d-none"><?php echo $error ?></div>
					<?php endif; ?>

					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="tgl_dibuka">Tanggal Dibuka</label>
							<input type="date" id="tgl_dibuka" name="tgl_dibuka" class="form-control tgl_dibuka <?php if(form_error('tgl_dibuka')) echo 'is-invalid'?>" placeholder="Tanggal Dibuka" value="<?php echo $ppdb['tgl_dibuka'] ?>">
							<?php echo form_error('tgl_dibuka', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="tgl_ditutup">Tanggal Ditutup</label>
							<input type="date" id="tgl_ditutup" name="tgl_ditutup" class="form-control tgl_ditutup <?php if(form_error('tgl_ditutup')) echo 'is-invalid'?>" placeholder="Tanggal Ditutup" value="<?php echo $ppdb['tgl_ditutup'] ?>">
							<?php echo form_error('tgl_ditutup', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="tgl_pengumuman">Tanggal Pengumuman</label>
							<input type="date" id="tgl_pengumuman" name="tgl_pengumuman" class="form-control tgl_pengumuman <?php if(form_error('tgl_pengumuman')) echo 'is-invalid'?>" placeholder="Tanggal Pengumuman" value="<?php echo $ppdb['tgl_pengumuman'] ?>">
							<?php echo form_error('tgl_pengumuman', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="gambar">Gambar</label>
							<input type="file" id="gambar" name="gambar" class="form-control gambar <?php if(form_error('gambar')) echo 'is-invalid'?>" placeholder="Gambar" value="<?php echo set_value('gambar') ?>">
							<?php echo form_error('gambar', '<small style="color:red">','</small>') ?>
						</div>
						<img src="<?php echo base_url('assets/img/ppdb/') . $ppdb['gambar'] ?>" alt="Gambar PPDB" class="img-fluid">
						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<textarea  id="keterangan" name="keterangan" class="form-control textarea keterangan <?php if(form_error('keterangan')) echo 'is-invalid'?>" placeholder="Keterangan" cols="30" rows="10" ><?php echo $ppdb['keterangan'] ?></textarea>
							<?php echo form_error('keterangan', '<small style="color:red">','</small>') ?>
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