<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data User</h4>
				</div>
				<div class="float-right">
					<a href="#modal-user" data-toggle="modal" class="btn btn-primary tambah-user"><i class="fa fa-plus"></i> Tambah User</a>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered" id="table-user">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-user">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('user/simpan') ?>" class="form-user">
        	<div class="form-group">
        		<label for="username">Username</label>
        		<input type="text" id="username" name="username" class="form-control username <?php if(form_error('username')) echo 'is-invalid'?>" placeholder="Username">
        		<?php echo form_error('username', '<small style="color:red">','</small>') ?>
        	</div>
        	<div class="form-group">
        		<label for="password">Password</label>
        		<input type="password" id="password" name="password" class="form-control password <?php if(form_error('password')) echo 'is-invalid'?>" placeholder="Password">
        		<?php echo form_error('password', '<small style="color:red">','</small>') ?>
        	</div>
			<div class="form-group">
				<label for="id_role">Role</label>
				<select name="id_role" id="id_role" class="form-control id_role">
					<option value="pilih_role">-- Silahkan Pilih Role --</option>
					<?php foreach ($role as $row): ?>
						<option value="<?php echo $row['id_role'] ?>"><?php echo $row['nama_role'] ?></option>
					<?php endforeach ?>
				</select>
				<?php echo form_error('id_role', '<small style="color:red">','</small>') ?>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>