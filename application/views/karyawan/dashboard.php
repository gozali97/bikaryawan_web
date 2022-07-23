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
		<div class="alert alert-success alert-dismissible ml-2" role="alert" style="width:65%;">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Selamat datang. Anda login sebagai karyawan
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content ml-2">
		<div class="card" style="margin-bottom: 120px; width:65%;">
			<div class="card-header font-weight-bold bg-info text-white">Data Karyawan</div>
			<?php foreach ($karyawan as $k) : ?>
				<div class="card-body">
					<div class="row">
						<div class="col-md-5">
							<img style="width: 250px;" src="<?= base_url('assets/img/' . $k->photo) ?>" alt="">
						</div>
						<div class="col-md-7">
							<table class="table border-0">
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?= $k->nama_karyawan  ?></td>
								</tr>
								<tr>
									<td>NIK</td>
									<td>:</td>
									<td><?= $k->nik  ?></td>
								</tr>
								<tr>
									<td>Divisi</td>
									<td>:</td>
									<td><?= $k->divisi  ?></td>
								</tr>
								<tr>
									<td>Tanggal Masuk</td>
									<td>:</td>
									<td><?= $k->tgl_masuk  ?></td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td><?= $k->status ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>
