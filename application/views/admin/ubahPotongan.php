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
								<center>
									<h3 class="card-title">Form Potongan Gaji</h3>
								</center>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<?php foreach ($pot_gaji as $p) : ?>
								<form method="POST" action="<?= base_url('admin/potongangaji/update') ?>">
									<input type="hidden" class="form-control" name="id_potongan" value="<?= $p->id_potongan ?>">
									<div class="card-body">
										<div class="form-group">
											<label>Jenis Potongan :</label>
											<input type="text" class="form-control" name="jenis_potongan" placeholder="Jenis Potongan" value="<?= $p->jenis_potongan ?>">
											<?php echo form_error('jenis_potongan', '<div class="text-small text-danger"></div>') ?>
										</div>
										<div class="form-group">
											<label>Jumlah Potongan :</label>
											<input type="number" class="form-control" name="jml_potongan" placeholder="Jumlah Potongan" value="<?= $p->jml_potongan ?>">
											<?php echo form_error('jml_potongan', '<div class="text-small text-danger"></div>') ?>
										</div>
									</div>
									<!-- /.card-body -->

									<div class="card-footer float-right">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</div>
