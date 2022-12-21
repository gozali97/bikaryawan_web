<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>

	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<h4 class="mt-1">Sistem Informasi Pendataan Karyawan</h4>
	</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
		<img src="<?php echo base_url() ?>/assets/img/baliindah.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Bali Indah Photo</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/img/') . $this->session->userdata('photo') ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->userdata('nama_karyawan') ?></a>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/dataKaryawan') ?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Data Karyawan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/dataDivisi') ?>" class="nav-link">
						<i class="nav-icon fas fa-briefcase"></i>
						<p>Data Divisi</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-money-check"></i>
						<p>
							Transaksi
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('admin/dataAbsensi') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Absensi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/PotonganGaji') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Set Potongan Gaji</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/dataGaji') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Gaji</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-clipboard"></i>
						<p>
							Laporan
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('admin/laporanAbsensi') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Absensi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/dataKegiatan') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Kegiatan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/laporanGaji') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Gaji</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/slipGaji') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Slip Gaji</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('UbahPassword') ?>" class="nav-link">
						<i class="nav-icon fas fa-lock"></i>
						<p>Ubah Password</p>
					</a>
				</li>
				<li class="nav-item">
					<a onclick="return confirm('Yakin ingin keluar ?') " href="<?= base_url('welcome/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-power-off"></i>
						<p>Logout</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
