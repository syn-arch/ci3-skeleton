<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4 class="card-title"><?php echo $judul ?></h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('profil') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-8 offset-2">
					<form method="POST">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" id="username" name="username" class="form-control username <?php if(form_error('username')) echo 'is-invalid'?>" placeholder="Username" value="<?php echo set_value('username') ?>">
							<?php echo form_error('username', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control password <?php if(form_error('password')) echo 'is-invalid'?>" placeholder="Password" value="<?php echo set_value('password') ?>">
							<?php echo form_error('password', '<small style="color:red">','</small>') ?>
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