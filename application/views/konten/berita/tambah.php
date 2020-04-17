
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('konten/berita') ?>"class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
							<label for="slug">Slug</label>
							<input type="text" id="slug" name="slug" class="form-control slug <?php if(form_error('slug')) echo 'is-invalid'?>" placeholder="Slug" value="<?php echo set_value('slug') ?>">
							<?php echo form_error('slug', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" id="judul" name="judul" class="form-control judul <?php if(form_error('judul')) echo 'is-invalid'?>" placeholder="Judul" value="<?php echo set_value('judul') ?>">
							<?php echo form_error('judul', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="isi_berita">Isi Berita</label>
							<textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control textarea isi_berita <?php if(form_error('isi_berita')) echo 'is-invalid'?>" placeholder="Tulis Berita..."></textarea>
							<?php echo form_error('isi_berita', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="gambar">Gambar</label>
							<input type="file" id="gambar" name="gambar" class="form-control gambar <?php if(form_error('gambar')) echo 'is-invalid'?>" placeholder="Gambar" value="<?php echo set_value('gambar') ?>">
							<?php echo form_error('gambar', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<select name="status" id="status" class="form-control">
								<option value="Diterbitkan">Diterbitkan</option>
								<option value="Diarsipkan">Diarsipkan</option>
								<option value="Draft">Draft</option>
							</select>
							<?php echo form_error('status', '<small style="color:red">','</small>') ?>
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