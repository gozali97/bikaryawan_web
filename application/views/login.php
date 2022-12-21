<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url() ?>/assets/img/baliindah.png">
	<title>Bali Indah | Login</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-danger">
			<div class="card-header text-center">
				<img src="<?php echo base_url() ?>/assets/img/baliindah.png" style="width:20%" alt="">
				<h3 class="text-bold">Bali Indah Photo Pangkalan Bun</h3>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<?= $this->session->flashdata('pesan')  ?>
				<form method="POST" action="<?= base_url('welcome') ?>">
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="email" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="text-small text-danger"><?php echo form_error('email') ?></div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="text-small text-danger"><?php echo form_error('password') ?></div>
					<button type="submit" class="btn btn-primary btn-block">Sign In</button>
				</form>

				<p class="mb-1 mt-3">
					Lupa Password ?<a href="<?php echo base_url('UbahPassword/forgot') ?>">Ubah Password</a>
				</p>
				<!-- <p class="mb-0">
					Belum punya akun? <a href="register.html" class="text-center">Daftar</a>
				</p> -->
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>
