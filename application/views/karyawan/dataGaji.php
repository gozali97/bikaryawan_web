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
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Bulan/Tahun</th>
											<th>Gaji Pokok</th>
											<th>Uang Makan</th>
											<th>Potongan Gaji</th>
											<th>Total Gaji</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<?php foreach ($potongan as $p) : {
											$potongan = $p->jml_potongan;
										} ?>
										<?php  ?>
									<?php endforeach; ?>
									<?php $no = 1;
									foreach ($gaji as $g) : ?>
										<?php $pot_gaji = $g->alpha * $potongan ?>
										<tbody>
											<tr>
												<td><?= $g->bulan  ?></td>
												<td>Rp. <?= number_format($g->gaji_pokok, 0, ',', '.')  ?></td>
												<td>Rp. <?= number_format($g->uang_makan, 0, ',', '.')  ?></td>
												<td>Rp. <?= number_format($pot_gaji, 0, ',', '.')  ?></td>
												<td>Rp. <?= number_format($g->gaji_pokok + $g->uang_makan - $pot_gaji, 0, ',', '.')  ?></td>
												<td>
													<center>
														<a class="btn btn-sm btn-primary" href="<?= base_url('karyawan/DataGaji/cetak/' . $g->id_kehadiran) ?>"><i class="fas fa-print mr-1"></i>Print</a>
													</center>
												</td>
											</tr>
										</tbody>
									<?php endforeach; ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</div>
