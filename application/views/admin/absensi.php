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
							<div class="card-header bg-primary">
								<h5>Filter Data Kehadiran Karyawan</h5>
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
									<button type="submit" class="btn btn-info ml-auto"> <i class="fas fa-eye "></i> Tampil Data</button>
									<a href="<?= base_url('admin/DataAbsensi/inputAbsensi') ?>" class="btn btn-success ml-3"><i class="fas fa-plus"> Input Kehadiran</i></a>
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
							<?php
							$jml_data = count($kehadiran);
							if ($jml_data > 0) { ?>
								<?= $this->session->flashdata('pesan')  ?>
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama Karyawan</th>
											<th>Jenis Kelamin</th>
											<th>Divisi</th>
											<th>Hadir</th>
											<th>Sakit</th>
											<th>Alpha</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($kehadiran as $k) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $k->nik  ?></td>
												<td><?= $k->nama_karyawan  ?></td>
												<td><?= $k->jenis_kelamin  ?></td>
												<td><?= $k->divisi  ?></td>
												<td><?= $k->hadir ?></td>
												<td><?= $k->sakit  ?></td>
												<td><?= $k->alpha  ?></td>
											</tr>
										<?php endforeach; ?>
								</table>
							<?php } else { ?>
								<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang anda pilih.</span>
							<?php } ?>
							<!-- /.card-body -->

						</div>
						<!-- /.card -->
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
	</div>
