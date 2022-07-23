<?php

class LaporanAbsensi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Anda Belum Login.
		  </div>');
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Laporan Absensi";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/laporanAbsensi');
		$this->load->view('template_admin/footer');
	}

	public function cetak()
	{
		$data['title'] = "Cetak Laporan Absensi Karyawan";
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
		$bulantahun = $bulan . $tahun;
		$data['lap_absen'] = $this->db->query("SELECT * FROM tb_kehadiran
		WHERE bulan='$bulantahun'
		ORDER BY nama_karyawan ASC")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/cetakLaporanAbsensi');
	}
}
