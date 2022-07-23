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
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="card card-primary">
							<div class="card-header">
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form method="POST" action="<?= base_url('admin/datakaryawan/store') ?>" enctype="multipart/form-data">
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>NIK :</label>
												<input type="number" class="form-control" name="nik" placeholder="Masukkan NIK">
												<?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Nama Karyawan :</label>
												<input type="text" class="form-control" name="nama_karyawan" placeholder="Masukkan Nama">
												<?php echo form_error('nama_karyawan', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Jenis Kelamin :</label>
												<select name="jenis_kelamin" class="form-control">
													<option value="">--Pilih Jenis Kelamin--</option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
												<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Divisi :</label>
												<select name="divisi" class="form-control">
													<option value="">--Pilih Divisi--</option>
													<?php foreach ($divisi as $d) : ?>
														<option value="<?= $d->nama_divisi ?>"><?= $d->nama_divisi ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('divisi', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Status :</label>
												<select name="status" class="form-control">
													<option value="">--Pilih Status--</option>
													<option value="Pegawai Tetap">Pegawai Tetap</option>
													<option value="Magang">Magang</option>
												</select>
												<?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Foto :</label>
												<input type="file" class="form-control" name="photo" placeholder="Upload Foto">
												<?php echo form_error('photo', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>No HP:</label>
												<input type="number" class="form-control" name="no_tlp" placeholder="Masukkan No HP">
												<?php echo form_error('no_tlp', '<div class="text-small text-danger"></div>') ?>
											</div>
											<div class="form-group">
												<label>Tanggal Masuk</label>
												<input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk">
												<?php echo form_error('tgl_masuk', '<div class="text-small text-danger"></div>') ?>
											</div>
											<div class="form-group">
												<label>Email:</label>
												<input type="email" class="form-control" name="email" placeholder="Masukkan Email">
												<?php echo form_error('email', '<div class="text-small text-danger"></div>') ?>
											</div>
											<div class="form-group">
												<label>Password :</label>
												<input type="password" class="form-control" name="password" placeholder="Password">
												<?php echo form_error('password', '<div class="text-small text-danger"></div>') ?>
											</div>

										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Alamat :</label>
												<textarea class="form-control" rows="2" name="alamat" placeholder="Masukkan Alamat .."></textarea>
												<?php echo form_error('alamat', '<div class="text-small text-danger"></div>') ?>
											</div>
											<div class="form-group">
												<label>Hak Akses</label>
												<select name="role_id" class="form-control">
													<option value="">--Pilih Hak Akses--</option>
													<option value="1">Admin</option>
													<option value="2">Karyawan</option>
												</select>
												<?php echo form_error('role_id', '<div class="text-small text-danger"></div>') ?>
											</div>
										</div>
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
</div>
