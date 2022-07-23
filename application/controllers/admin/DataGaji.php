<?php

use LDAP\Result;

class DataGaji extends CI_Controller
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
		$data['title'] = "Data Gaji";
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
		$data['pot'] = $this->PendataanModel->get_data('tb_potongan_gaji')->result();
		$data['gaji'] = $this->db->query("SELECT tb_karyawan.nik, tb_karyawan.nama_karyawan, tb_karyawan.jenis_kelamin,
		tb_divisi.nama_divisi, tb_divisi.gaji_pokok, tb_divisi.uang_makan, tb_kehadiran.alpha
		FROM tb_karyawan
		INNER JOIN tb_kehadiran ON tb_kehadiran.nik=tb_karyawan.nik
		INNER JOIN tb_divisi ON tb_divisi.nama_divisi=tb_karyawan.divisi
		WHERE tb_kehadiran.bulan='$bulantahun'
		ORDER BY tb_karyawan.nama_karyawan ASC")->result();
		// var_dump($data);
		// die();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dataGaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function cetakGaji()
	{
		$data['title'] = "Cetak Data Gaji Karyawan";
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
		$data['c_pot'] = $this->PendataanModel->get_data('tb_potongan_gaji')->result();
		$data['c_gaji'] = $this->db->query("SELECT tb_karyawan.nik, tb_karyawan.nama_karyawan, tb_karyawan.jenis_kelamin,
		tb_divisi.nama_divisi, tb_divisi.gaji_pokok, tb_divisi.uang_makan, tb_kehadiran.alpha, tb_kehadiran.id_kehadiran,
		FROM tb_karyawan
		INNER JOIN tb_kehadiran ON tb_kehadiran.nik=tb_karyawan.nik
		INNER JOIN tb_divisi ON tb_divisi.nama_divisi=tb_karyawan.divisi
		WHERE tb_kehadiran.bulan='$bulantahun'
		ORDER BY tb_karyawan.nama_karyawan ASC")->result();
		// var_dump($data);
		// die();
		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/cetakGaji', $data);
	}
}
