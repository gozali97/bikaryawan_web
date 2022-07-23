<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '2') {
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
		$id = $this->session->userdata('id_karyawan');
		$data['karyawan'] = $this->db->query("SELECT * FROM tb_karyawan WHERE id_karyawan ='$id'")->result();
		$this->load->view('template_karyawan/header', $data);
		$this->load->view('template_karyawan/sidebar');
		$this->load->view('karyawan/dashboard', $data);
		$this->load->view('template_karyawan/footer');
	}
}
