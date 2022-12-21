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
		<h4>laporan Kegiatan Karyawan</h4>
	</center>

	<table>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?= date("d M Y") ?></td>
		</tr>
	</table>

	<table class="table table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>Karyawan</th>
			<th>Divisi</th>
			<th>Kegiatan</th>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Foto</th>
		</tr>
		<?php $no = 1;
		foreach ($lap_kegiatan as $l) :
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $l->nama_karyawan ?></td>
				<td><?= $l->divisi ?></td>
				<td><?= $l->nama_kegiatan ?></td>
				<td><?= $l->created_at ?></td>
				<td><?= $l->keterangan ?></td>
				<td><img src="<?= base_url('assets/img/' . $l->lampiran) ?>" style="width: 200px;"></td>
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
