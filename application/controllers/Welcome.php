<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$cek = $this->PendataanModel->cek_login($email, $password);
			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Email atau Password Salah.
		  </div>');
				redirect('welcome');
			} else {
				$this->session->set_userdata('role_id', $cek->role_id);
				$this->session->set_userdata('nama_karyawan', $cek->nama_karyawan);
				$this->session->set_userdata('photo', $cek->photo);
				$this->session->set_userdata('id_karyawan', $cek->id_karyawan);
				$this->session->set_userdata('nik', $cek->nik);
				switch ($cek->role_id) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('karyawan/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
	}
}
