<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 mb-2">
						<h1 class="m-0 text-primary"><?= $title ?></h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php base_url() ?>">Home</a></li>
							<li class="breadcrumb-item active"><?= $title ?></li>
						</ol>
					</div><!-- /.col -->
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<a class="btn btn-sm btn-success" href="<?= base_url('admin/datakaryawan/tambah_data') ?>"><i class="fas fa-plus">Tambah Data</i></a>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<?= $this->session->flashdata('pesan')  ?>
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Foto</th>
											<th>NIK</th>
											<th>Nama Karyawan</th>
											<th>Jenis Kelamin</th>
											<th>Divisi</th>
											<th>Hak Akses</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($karyawan as $k) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><img src="<?= base_url('assets/img/' . $k->photo) ?>" style="width: 80px;"></td>
												<td><?= $k->nik  ?></td>
												<td><?= $k->nama_karyawan  ?></td>
												<td><?= $k->jenis_kelamin  ?></td>
												<td><?= $k->divisi  ?></td>
												<?php if ($k->role_id == '1') { ?>
													<td>Admin</td>
												<?php } else { ?>
													<td>Karyawan</td>
												<?php } ?>


												<td>
													<center>
														<a class="btn btn-sm btn-primary" href="<?= base_url('admin/DataKaryawan/update_data/' . $k->id_karyawan) ?>"><i class="fas fa-edit"></i></a>
														<a onclick="return confirm('Yakin Hapus Divisi ?') " class="btn btn-sm btn-danger" href="<?= base_url('admin/DataKaryawan/deleteData/' . $k->id_karyawan) ?>"><i class="fas fa-trash"></i></a>
													</center>
												</td>
											</tr>
										<?php endforeach; ?>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
	</div>
