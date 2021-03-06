<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Calon Siswa</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('ppdb/tambah_calon_siswa') ?>" class="btn btn-primary tambah-calon-siswa"><i class="fa fa-plus"></i> Tambah Calon Siswa</a>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<?php if($error =  $this->session->flashdata('error')) : ?>
					<div class="alert-message-error d-none"><?php echo $error ?></div>
				<?php endif; ?>

				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered" id="table-calon-siswa">
						<thead>
							<tr>
								<th>No</th>
								<th>No Pendaftaran</th>
								<th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Asal Sekolah</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>