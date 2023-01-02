<?php

class DataAbsensi extends CI_Controller
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
		$data['title'] = "Data Absensi Karyawan";

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
		$data['kehadiran'] = $this->db->query(
			"SELECT tb_kehadiran.*, tb_karyawan.nama_karyawan, tb_karyawan.jenis_kelamin,  tb_karyawan.divisi
			FROM tb_kehadiran
			INNER JOIN tb_karyawan ON tb_kehadiran.nik=tb_karyawan.nik
			INNER JOIN tb_divisi ON tb_karyawan.divisi=tb_divisi.nama_divisi
			WHERE tb_kehadiran.bulan='$bulantahun'
			ORDER BY tb_karyawan.nama_karyawan ASC"
		)->result();
		// var_dump($data1);
		// die();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/absensi', $data);
		$this->load->view('template_admin/footer');
	}

	public function inputAbsensi()
	{
		if ($this->input->post('submit', TRUE) == 'submit') {
			$post = $this->input->post();
			foreach ($post['bulan'] as $key => $value) {
				if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
					$simpan[] = array(
						'bulan' => $post['bulan'][$key],
						'nik' => $post['nik'][$key],
						'nama_karyawan' => $post['nama_karyawan'][$key],
						'jenis_kelamin' => $post['jenis_kelamin'][$key],
						'nama_divisi' => $post['nama_divisi'][$key],
						'hadir' => $post['hadir'][$key],
						'sakit' => $post['sakit'][$key],
						'alpha' => $post['alpha'][$key],
					);
					var_dump($simpan);
				}
			}
			$this->PendataanModel->insert_batch('tb_kehadiran', $simpan);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data kehadiran berhasil ditambahkan.
		  </div>');
			redirect('admin/DataAbsensi');
		}

		$data['title'] = "Tambah Absensi Karyawan";
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

		$data['tambah_kehadiran'] = $this->db->query(
			"SELECT tb_karyawan.*, tb_divisi.nama_divisi FROM tb_karyawan
		INNER JOIN tb_divisi ON tb_karyawan.divisi=tb_divisi.nama_divisi
		WHERE NOT EXISTS (SELECT * FROM tb_kehadiran WHERE bulan='$bulantahun' AND tb_karyawan.nik=tb_kehadiran.nik)
		ORDER BY tb_karyawan.nama_karyawan ASC"
		)->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahAbsensi', $data);
		$this->load->view('template_admin/footer');
	}
}
