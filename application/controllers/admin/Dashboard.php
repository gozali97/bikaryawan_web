<?php

class Dashboard extends CI_Controller
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
		$data['title'] = "Dashboard";
		$karyawan = $this->db->query("SELECT * FROM tb_karyawan");
		$admin = $this->db->query("SELECT * FROM tb_divisi");
		$divisi = $this->db->query("SELECT * FROM tb_kegiatan");
		$kehadiran = $this->db->query("SELECT * FROM tb_kehadiran");
		$data['karyawan'] = $karyawan->num_rows();
		$data['divisi'] = $admin->num_rows();
		$data['kegiatan'] = $divisi->num_rows();
		$data['kehadiran'] = $kehadiran->num_rows();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template_admin/footer');
	}
}
