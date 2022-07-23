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
			<!-- Horizontal Form -->
			<div class="card col-md-6 card-info">
				<div class="card-header">
					<h3 class="card-title">Form Ganti Password</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form method="POST" action="<?= base_url('karyawan/UbahPassword/store') ?>" class="form-horizontal">
					<div class="card-body">
						<div class="form-group">
							<label>Password Baru</label>
							<div>
								<input type="password" class="form-control" name="password1" placeholder="Password Baru">
								<div class="text-small text-danger"><?php echo form_error('password1') ?></div>
							</div>
						</div>
						<div>
							<label>Ulangi Password</label>
							<div>
								<input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
								<div class="text-small text-danger"><?php echo form_error('password2') ?></div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-info float-right"> <i class="nav-icon fas  fa-save"></i> Simpan</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
