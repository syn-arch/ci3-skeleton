<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Tahun Akademik</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/tambah_tahun_akademik') ?>"class="btn btn-primary tambah-tahun_akademik"><i class="fa fa-plus"></i> Tambah Data</a>
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
					<table class="table table-hover table-striped table-bordered tables" id="table-tahun_akademik">
						<thead>
							<tr>
								<th>No</th>
								<th>Tahun</th>
								<th>Semester</th>
								<th>Semester Saat Ini</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($tahun_akademik as $row): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['tahun'] ?></td>
									<td><?php echo $row['semester'] ?></td>
									<td><?= $row['semester_saat_ini'] == 1 ? 'YA' : 'TIDAK' ?></td>
									<td>
										<a href="<?php echo base_url('master/ubah_tahun_akademik/') . $row['id_tahun_akademik'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a data-href="<?php echo base_url('master/hapus_tahun_akademik/') . $row['id_tahun_akademik'] ?>" class="btn btn-danger hapus_tahun_akademik"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>