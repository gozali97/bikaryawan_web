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
					<div class="card mx-auto" style="width: 35%">
						<div class="header bg-info text-white text-center">Laporan Kehadiran Karyawan</div>
						<form method="POST" action="<?= base_url('admin/LaporanAbsensi/cetak') ?>">
							<div class="card-body">
								<form class="form-horizontal">
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
										<label class="">Tahun</label>
										<select class="form-control" name="tahun">
											<option value="">--Pilih Tahun--</option>
											<?php $tahun = date('Y');
											for ($i = 2022; $i < $tahun + 5; $i++) { ?>
												<option value="<?= $i ?>"><?= $i ?></option>
											<?php } ?>
										</select>
									</div>
									<button type="submit" class="btn btn-primary float-right"> <i class="fas fa-print "></i> Cetak Laporan</button>
								</form>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
