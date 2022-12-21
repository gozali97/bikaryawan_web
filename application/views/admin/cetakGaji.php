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
		<h2 style=font-weight:600;color:red>Bali Indah Photo Pangkalan Bun</h2>
		<h4>Daftar Gaji Pegawai</h4>
	</center>

	<table style="margin-bottom: 6px;">
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?= date("d M Y") ?></td>
		</tr>
	</table>

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
			<?php foreach ($c_pot as $p) {
				$alpha = $p->jml_potongan;
			} ?>
			<?php $no = 1;
			foreach ($c_gaji as $g) : ?>
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
	<table width="95%">
		<tr>
			<td></td>
			<td width="200px">
				<p>P.Bun, <?= date("d M Y") ?> <br> Pemilik</p>
				<br>
				<br>
				<br>
				<p>Budi Prasetyo</p>
			</td>
		</tr>
	</table>
</body>

</html>

<script type="text/javascript">
	window.print();
</script>
