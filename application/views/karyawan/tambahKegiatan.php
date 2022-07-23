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
	<div class="col-md-6 ml-2">
		<!-- general form elements -->
		<div class="card card-primary">
			<div class="card-header">
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form method="POST" action="<?= base_url('karyawan/datakegiatan/store') ?>" enctype="multipart/form-data">
				<div class="card-body">
					<div class="form-group">
						<label>Nama Kegiatan:</label>
						<input type="text" class="form-control" name="nama_kegiatan" placeholder="Masukkan nama kegiatan">
						<?php echo form_error('nama_kegiatan', '<div class="text-small text-danger"></div>') ?>
					</div>
					<div class="form-group">
						<label>Tanggal :</label>
						<input type="date" class="form-control" name="created_at" placeholder="Tanggal">
						<?php echo form_error('created_at', '<div class="text-small text-danger"></div>') ?>
					</div>
					<div class="form-group">
						<label>Keterangan :</label>
						<input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
						<?php echo form_error('keterangan', '<div class="text-small text-danger"></div>') ?>
					</div>
					<div class="form-group">
						<label>Lampiran :</label>
						<input type="file" class="form-control" name="lampiran" placeholder="Upload Foto">
						<?php echo form_error('lampiran', '<div class="text-small text-danger"></div>') ?>
					</div>

				</div>
				<!-- /.card-body -->

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
		<!-- /.card -->
	</div>
</div>
</div>
</section>
</div>
