<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-4">
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

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Laporan Data Kegiatan Karyawan</h3>
			<div class="float-right">
				<a href="<?= base_url('admin/DataKegiatan/cetak') ?>" type="button" class="btn btn-sm btn-success">
					<i class="fas fa-print"> Cetak</i>
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kegiatan</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Lampiran</th>
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
							<td style="width: 200px;"><img src="<?= base_url('assets/img/' . $k->lampiran) ?>" style="width: 200px;"></td>
						</tr>
					</tbody>
				<?php endforeach;  ?>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->

</div>
</div>
</div>
</div>
</section>
</div>
