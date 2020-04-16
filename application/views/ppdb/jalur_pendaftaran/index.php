<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data jalur</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('ppdb/tambah_jalur_pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
					<table class="table table-hover table-striped table-bordered tables">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($jalur as $row): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['nama_jalur_pendaftaran'] ?></td>
									<td>
										<a href="<?php echo base_url('ppdb/ubah_jalur_pendaftaran/') . $row['id_jalur_pendaftaran'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a data-href="<?php echo base_url('ppdb/hapus_jalur_pendaftaran/') . $row['id_jalur_pendaftaran'] ?>" class="btn btn-danger hapus_jalur_pendaftaran"><i class="fa fa-trash"></i></a>
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