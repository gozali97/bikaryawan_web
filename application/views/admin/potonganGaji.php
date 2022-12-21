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
							<!-- <div class="card-header"> -->
							<!-- <a class="btn btn-sm btn-success" href="<?= base_url('admin/potongangaji/tambah_data') ?>"><i class="fas fa-plus">Tambah Data</i></a> -->
							<!-- </div> -->
							<!-- /.card-header -->
							<div class="card-body">
								<?= $this->session->flashdata('pesan')  ?>
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Potongan</th>
											<th>Jumlah Potongan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($pot_gaji as $p) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $p->jenis_potongan ?></td>
												<td>Rp. <?= number_format($p->jml_potongan, 0, ',', '.') ?></td>
												<td>
													<center>
														<a class="btn btn-sm btn-primary" href="<?= base_url('admin/PotonganGaji/update_data/' . $p->id_potongan) ?>"><i class="fas fa-edit"></i>Edit</a>
														<a onclick="return confirm('Yakin Hapus Data ?') " class="btn btn-sm btn-danger" href="<?= base_url('admin/PotonganGaji/deleteData/' . $p->id_potongan) ?>"><i class="fas fa-trash"></i> Delete</a>
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
