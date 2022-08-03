<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<style type="text/css">
		body {
			font-family: Arial;
			color: black;
		}
	</style>
</head>

<body>
	<center>
		<h1>BALI INDAH PHOTO</h1>
		<h3>laporan Kehadiran Karyawan</h3>
	</center>

	<?php
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$bulantahun = $bulan . $tahun;
	?>

	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?= $bulan ?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?= $tahun ?></td>
		</tr>
	</table>

	<table class="table table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>Nama Karyawan</th>
			<th>NIK</th>
			<th>Divisi</th>
			<th>Hadir</th>
			<th>Sakit</th>
			<th>Alpha</th>
		</tr>
		<?php $no = 1;
		foreach ($lap_absen as $l) :
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $l->nama_karyawan ?></td>
				<td><?= $l->nik ?></td>
				<td><?= $l->nama_divisi ?></td>
				<td><?= $l->hadir ?></td>
				<td><?= $l->sakit ?></td>
				<td><?= $l->alpha ?></td>
			</tr>
		<?php endforeach; ?>

	</table>

</body>

</html>
<script type="text/javascript">
	window.print();
</script>
