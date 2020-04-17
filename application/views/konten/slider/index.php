<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data slider</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('konten/tambah_slider') ?>"class="btn btn-primary tambah-slider"><i class="fa fa-plus"></i> Tambah slider</a>
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
					<table class="table table-hover table-striped table-borderedt tables">
						<thead>
							<tr>
								<th>No</th>
								<th>Judul</th>
								<th>Keterangan</th>
                                <th>Gambar</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($slider as $row): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['judul'] ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									<td><img src="<?php echo base_url('assets/img/slider/') . $row['gambar'] ?>" width="200" alt=""></td>
									<td>
										<a href="<?php echo base_url('konten/ubah_slider/') . $row['id_slider'] ?>" class="btn btn-warning">
											<i class="fa fa-edit"></i>
										</a>
										<a data-href="<?php echo base_url('konten/hapus_slider/') . $row['id_slider'] ?>" class="btn btn-danger hapus_slider">
											<i class="fa fa-trash"></i>
										</a>
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