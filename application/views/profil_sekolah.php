
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Profil Sekolah</h4>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<?php if($error =  $this->session->flashdata('error')) : ?>
					<div class="alert-message-error d-none"><?php echo $error ?></div>
				<?php endif; ?>

				<div class="col-md-8 offset-2">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="nama_sekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
							<div class="col-sm-10">
								<input type="text" name="nama_sekolah" class="form-control nama_sekolah <?php if(form_error('nama_sekolah')) echo 'is-invalid'?>" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $profil_sekolah['nama_sekolah'] ?>">
								<?php echo form_error('nama_sekolah', '<small style="color:red">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="text" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<img src="<?php echo base_url('assets/img/') . $profil_sekolah['logo'] ?>" class="img-fluid" width="150">
							</div>
						</div>
						<div class="form-group row">
							<label for="logo" class="col-sm-2 col-form-label">Logo</label>
							<div class="col-sm-10">
								<input type="file" name="logo" class="form-control logo <?php if(form_error('logo')) echo 'is-invalid'?>" id="logo" placeholder="Logo" value="<?php echo set_value('logo') ?>">
								<?php echo form_error('logo', '<small style="color:red">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="visi" class="col-sm-2 col-form-label">Visi</label>
							<div class="col-sm-10">
								<textarea name="visi" id="visi" cols="30" rows="10" class="form-control textarea <?php if(form_error('visi')) echo 'is-invalid'?>" placeholder="visi"><?php echo $profil_sekolah['visi'] ?></textarea>
								<?php echo form_error('visi', '<small style="color:red">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="misi" class="col-sm-2 col-form-label">Misi</label>
							<div class="col-sm-10">
								<textarea name="misi" id="misi" cols="30" rows="10" class="form-control textarea <?php if(form_error('misi')) echo 'is-invalid'?>" placeholder="misi"><?php echo $profil_sekolah['misi'] ?></textarea>
								<?php echo form_error('misi', '<small style="color:red">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col-sm-10">
								<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control <?php if(form_error('alamat')) echo 'is-invalid'?>" placeholder="Alamat"><?php echo $profil_sekolah['alamat'] ?></textarea>
								<?php echo form_error('alamat', '<small style="color:red">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
							<div class="col-sm-10">
								<input type="text" name="telepon" class="form-control telepon <?php if(form_error('telepon')) echo 'is-invalid'?>" id="telepon" placeholder="Telepon" value="<?php echo $profil_sekolah['telepon'] ?>">
								<?php echo form_error('telepon', '<small style="color:red">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">E-mail</label>
							<div class="col-sm-10">
								<input type="text" name="email" class="form-control email <?php if(form_error('email')) echo 'is-invalid'?>" id="email" placeholder="E-mail" value="<?php echo $profil_sekolah['email']?>">
								<?php echo form_error('email', '<small style="color:red">','</small>') ?>
							</div>
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