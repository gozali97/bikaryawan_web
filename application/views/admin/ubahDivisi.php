<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
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
					<div class="col-md-6">
						<!-- general form elements -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"></h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<?php foreach ($divisi as $d) : ?>
								<form method="POST" action="<?= base_url('admin/datadivisi/update') ?>">
									<div class="card-body">
										<input type="hidden" class="form-control" name="id_divisi" value="<?= $d->id_divisi ?>">
										<div class="form-group">
											<label>Nama Divisi :</label>
											<input type="text" class="form-control" name="nama_divisi" placeholder="Nama Divisi" value="<?= $d->nama_divisi ?>">
											<?php echo form_error('nama_divisi', '<div class="text-small text-danger"></div>') ?>
										</div>
										<div class="form-group">
											<label>Gaji Pokok :</label>
											<input type="number" class="form-control" name="gaji_pokok" placeholder="Gaji Pokok" value="<?= $d->gaji_pokok ?>">
											<?php echo form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
										</div>
										<div class="form-group">
											<label>Uang Makan :</label>
											<input type="number" class="form-control" name="uang_makan" placeholder="Uang Makan" value="<?= $d->uang_makan ?>">
											<?php echo form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
										</div>
									</div>
									<!-- /.card-body -->

									<div class="card-footer float-right">
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</form>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</div>
