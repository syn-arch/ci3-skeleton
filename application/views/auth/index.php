<div class="row">
	<div class="col-md-5">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h4 class="card-title"><?php echo $judul ?></h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control username <?php if(form_error('username')) echo 'is-invalid'?>" placeholder="Username" value="<?php echo set_value('username') ?>">
					<?php echo form_error('username', '<small style="color:red">','</small>') ?>
				</div>
				<div class="form-group">
					<label for="id_role">Role</label>
					<input type="text" id="id_role" name="id_role" class="form-control id_role <?php if(form_error('id_role')) echo 'is-invalid'?>" placeholder="Role" value="<?php echo set_value('id_role') ?>">
					<?php echo form_error('id_role', '<small style="color:red">','</small>') ?>
				</div>
				<div class="form-group">
					<a href="<?php echo base_url('profil/ubah') ?>" class="btn btn-dark btn-block"><i class="fa fa-edit"></i> Ubah Profil</a>
					<a href="<?php echo base_url('profil/ubah_password') ?>" class="btn btn-secondary btn-block"><i class="fa fa-key"></i> Ubah Password</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h4 class="card-title">Deskripsi</h4>
			</div>
			<div class="card-body">
				<form class="form-horizontal">
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-10">
							<textarea name="" id="alamat" placeholder="Alamat" cols="30" rows="10" class="form-control"></textarea>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>