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
						<div class="card p-3">
							<div class="card-header bg-success">
								<center>
									<h5>Form Tambah Data Absensi Karyawan</h5>
								</center>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<form class="form-inline">
									<div class="form-group">
										<label class="mr-3">Bulan</label>
										<select class=" form-control" name="bulan">
											<option value="">--Pilih Bulan--</option>
											<option value="01">Januari</option>
											<option value="02">Februari</option>
											<option value="03">Maret</option>
											<option value="04">April</option>
											<option value="05">Mei</option>
											<option value="06">Juni</option>
											<option value="07">Juli</option>
											<option value="08">Agustus</option>
											<option value="09">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</div>
									<div class="form-group">
										<label class="ml-3">Tahun</label>
										<select class="form-control ml-3" name="tahun">
											<option value="">--Pilih Tahun--</option>
											<?php $tahun = date('Y');
											for ($i = 2022; $i < $tahun + 5; $i++) { ?>
												<option value="<?= $i ?>"><?= $i ?></option>
											<?php } ?>
										</select>
									</div>
									<button type="submit" class="btn btn-info ml-auto"> <i class="fas fa-toggle-off"></i> Generate</button>
								</form>

							</div>
							<!-- /.card-body -->
							<?php
							if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset(
								$_GET['tahun']
							) && $_GET['tahun'] != '')) {
								$bulan = $_GET['bulan'];
								$tahun = $_GET['tahun'];
								$bulantahun = $bulan . $tahun;
							} else {
								$bulan = date('m');
								$tahun = date('Y');
								$bulantahun = $bulan . $tahun;
							}
							?>
							<div class="alert alert-info">
								Menampilkan data kehadiran Bulan : <span class="  font-weight-bold "><?= $bulan ?>
								</span> Tahun : <span class="  font-weight-bold "><?= $tahun ?></span>
							</div>
							<?= $this->session->flashdata('pesan')  ?>
							<form method="POST" action="">
								<button class="btn btn-success" name="submit" type="submit" style="width: 8%;" value="submit">Simpan</button>
								<table class="table table-bordered table-striped table-hover mt-2">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama Karyawan</th>
											<th>Jenis Kelamin</th>
											<th>Divisi</th>
											<th style="width: 8%;">Hadir</th>
											<th style="width: 8%;">Sakit</th>
											<th style="width: 8%;">Alpha</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($tambah_kehadiran as $k) : ?>
											<tr>
												<input type="hidden" name="bulan[]" class="form-control" value="<?= $bulantahun ?>">
												<input type="hidden" name="nik[]" class="form-control" value="<?= $k->nik ?>">
												<input type="hidden" name="nama_karyawan[]" class="form-control" value="<?= $k->nama_karyawan ?>">
												<input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?= $k->jenis_kelamin ?>">
												<input type="hidden" name="nama_divisi[]" class="form-control" value="<?= $k->divisi ?>">
												<td><?= $no++ ?></td>
												<td><?= $k->nik  ?></td>
												<td><?= $k->nama_karyawan  ?></td>
												<td><?= $k->jenis_kelamin  ?></td>
												<td><?= $k->divisi  ?></td>
												<td>
													<input type="number" name="hadir[]" class="form-control" value="0">
												</td>
												<td>
													<input type="number" name="sakit[]" class="form-control" value="0">
												</td>
												<td>
													<input type="number" name="alpha" class="form-control" value="0">
												</td>
											</tr>
										<?php endforeach; ?>
								</table>
								<!-- /.card-body -->
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
	</div>
