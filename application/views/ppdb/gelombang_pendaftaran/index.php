<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Gelombang</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('ppdb/tambah_gelombang_pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
								<th>Tahun Akademik</th>
								<th>Nama Gelombang</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($gelombang as $row): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['tahun'] ?></td>
									<td><?php echo $row['nama_gelombang_pendaftaran'] ?></td>
									<td><?php echo date('d-m-Y', strtotime($row['tgl_mulai'])) ?></td>
									<td><?php echo date('d-m-Y', strtotime($row['tgl_selesai'])) ?></td>
									<td>
										<a href="<?php echo base_url('ppdb/ubah_gelombang_pendaftaran/') . $row['id_gelombang_pendaftaran'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a data-href="<?php echo base_url('ppdb/hapus_gelombang_pendaftaran/') . $row['id_gelombang_pendaftaran'] ?>" class="btn btn-danger hapus_gelombang_pendaftaran"><i class="fa fa-trash"></i></a>
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