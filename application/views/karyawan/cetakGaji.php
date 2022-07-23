<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<style type="text/css">
		body {
			font-family: arial;
			color: black;
		}
	</style>
</head>

<body>
	<center>
		<h1>Bali Indah Photo</h1>
		<h2>Slip Gaji Karyawan</h2>
		<hr style="width: 50%; border: width 5px; color:black">
	</center>
	<?php foreach ($potongan as $p) {
		$potongan = $p->jml_potongan;
	} ?>
	<?php foreach ($cetak_slip as $s) : ?>
		<?php $potongan_gaji = $s->alpha * $potongan ?>
		<table style="width: 100%;">
			<tr>
				<td width=20%>Nama Karyawan</td>
				<td width=2%>:</td>
				<td><?= $s->nama_karyawan ?></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td><?= $s->nik ?></td>
			</tr>
			<tr>
				<td>Divisi</td>
				<td>:</td>
				<td><?= $s->nama_divisi ?></td>
			</tr>
			<tr>
				<td>Bulan</td>
				<td>:</td>
				<td><?= substr($s->bulan, 0, 2) ?></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><?= substr($s->bulan, 2, 4) ?></td>
			</tr>
		</table>

		<center>
			<table class="table  table-striped table-bordered mt-4">
				<tr>
					<th class="text-center" width="5%">No</th>
					<th class="text-center">Keterangan</th>
					<th class="text-center">Jumlah</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Gaji Pokok</td>
					<td>Rp. <?= number_format($s->gaji_pokok, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Uang Makan</td>
					<td>Rp. <?= number_format($s->uang_makan, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Potongan</td>
					<td>Rp. <?= number_format($potongan_gaji, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: right;">Total Gaji</th>
					<th>Rp. <?= number_format($s->gaji_pokok + $s->uang_makan - $potongan_gaji, 0, ',', '.') ?></>
				</tr>
			</table>

			<table width=100%>
				<tr>
					<td></td>
					<td>
						<p>Karyawan</p>
						<br>
						<br>
						<p class="font-weight-bold"><?= $s->nama_karyawan ?></p>
					</td>

					<td width="220px">
						<p>Pangkalan Bun, <?= date("d M Y")  ?> <br> Manager,</p>
						<br>
						<br>
						<p>__________________</p>
					</td>
				</tr>
			</table>

		<?php endforeach; ?>
		</center>
</body>

</html>
<script text="text/javascript">
	window.print();
</script>
