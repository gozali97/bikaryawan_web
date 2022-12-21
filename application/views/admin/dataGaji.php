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
						<div class="card p-2">
							<div class="card-header bg-primary">
								<center>
									<h5>Filter Data Gaji Karyawan</h5>
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
									<button type="submit" class="btn btn-info ml-auto"> <i class="fas fa-eye "></i> Tampil Data</button>
									<?php if (count($gaji) > 0) { ?>
										<a href="<?= base_url('admin/DataGaji/cetakGaji?bulan=' . $bulan), '&tahun=' . $tahun ?>" class="btn btn-success ml-3"><i class="fas fa-print"> Cetak</i></a>
								</form>
							<?php } else { ?>
								<button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#myModal">
									<i class="fas fa-print"> Cetak</i>
								</button>
							<?php } ?>

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
								Menampilkan data gaji karyawan Bulan : <span class="  font-weight-bold "><?= $bulan ?>
								</span> Tahun : <span class="  font-weight-bold "><?= $tahun ?></span>
							</div>
							<?php
							$jml_data = count($gaji);
							if ($jml_data > 0) { ?>
								<?= $this->session->flashdata('pesan')  ?>
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama Karyawan</th>
											<th>Jenis Kelamin</th>
											<th>Divisi</th>
											<th>Gaji Pokok</th>
											<th>Uang Makan</th>
											<th>Potongan</th>
											<th>Total Gaji</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($pot as $p) {
											$alpha = $p->jml_potongan;
											echo ($alpha);
										} ?>
										<?php $no = 1;
										foreach ($gaji as $g) : ?>
											<?php $pot = $g->alpha * $alpha ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $g->nik  ?></td>
												<td><?= $g->nama_karyawan  ?></td>
												<td><?= $g->jenis_kelamin  ?></td>
												<td><?= $g->nama_divisi  ?></td>
												<td>Rp. <?= number_format($g->gaji_pokok, 0, ',', '.') ?></td>
												<td>Rp. <?= number_format($g->uang_makan, 0, ',', '.') ?></td>
												<td>Rp. <?= number_format($pot, 0, ',', '.') ?></td>
												<td>Rp. <?= number_format($g->gaji_pokok + $g->uang_makan - $pot, 0, ',', '.') ?></td>
											</tr>
										<?php endforeach; ?>
								</table>
								<!-- /.card-body -->
							<?php } else { ?>
								<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang anda pilih.</span>
							<?php } ?>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<p>Informasi</p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					Data gaji masih kosong, silahkan input absensi terlebih dahulu pada bulan dan tahun yang anda pilih.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>
