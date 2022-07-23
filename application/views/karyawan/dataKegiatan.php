<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php base_url() ?>">Home</a></li>
						<li class="breadcrumb-item active"><?= $title ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<a class="btn btn-sm btn-success" href="<?= base_url('karyawan/DataKegiatan/input') ?>"><i class="fas fa-plus mr-1"></i>Tambah</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kegiatan</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>Lampiran</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<?php $no = 1;
								foreach ($kegiatan as $k) : ?>
									<tbody>
										<tr>
											<td><?= $no++  ?></td>
											<td><?= $k->nama_kegiatan ?></td>
											<td><?= $k->created_at ?></td>
											<td><?= $k->keterangan ?></td>
											<td style="width: 230px;"><img src="<?= base_url('assets/img/' . $k->lampiran) ?>" style="width: 230px;"></td>
											<td>
												<center>
													<a onclick="return confirm('Yakin Hapus Kegiatan ?')" class=" btn btn-sm btn-danger" href="<?= base_url('karyawan/DataKegiatan/delete/' . $k->id_kegiatan) ?>"><i class="fas fa-trash mr-1"></i>Hapus</a>
												</center>
											</td>
										</tr>
									</tbody>
								<?php endforeach;  ?>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>
