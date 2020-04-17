
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('konten/slider') ?>"class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
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
							<label for="nama_kontak">Nama Kontak</label>
							<input type="text" id="nama_kontak" name="nama_kontak" class="form-control nama_kontak <?php if(form_error('nama_kontak')) echo 'is-invalid'?>" placeholder="Nama Kontak" value="<?php echo set_value('nama_kontak') ?>">
							<?php echo form_error('nama_kontak', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="link">Link</label>
							<input type="text" name="link" placeholder="link" class="form-control link  <?php if(form_error('link')) echo 'is-invalid'?>">
							<?php echo form_error('link', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="gambar">Gambar</label>
							<input type="file" id="gambar" name="gambar" class="form-control gambar <?php if(form_error('gambar')) echo 'is-invalid'?>" placeholder="Gambar" value="<?php echo set_value('gambar') ?>">
							<?php echo form_error('gambar', '<small style="color:red">','</small>') ?>
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