<?php

class UbahPassword extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Ubah Password";
		$this->load->view('template_karyawan/header', $data);
		$this->load->view('template_karyawan/sidebar');
		$this->load->view('karyawan/ubahPassword', $data);
		$this->load->view('template_karyawan/footer');
	}

	public function store()
	{
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');

		$this->form_validation->set_rules('password1', 'Password Baru', 'required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Password', 'required|min_length[6]');
		if ($this->form_validation->run() != FALSE) {
			$data = array('password' => md5($password1));

			$id = array('id_karyawan' => $this->session->userdata('id_karyawan'));
			$this->PendataanModel->update_data('tb_karyawan', $data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Password berhasil diubah.
		  </div>');
			redirect('welcome');
		} else {
			$data['title'] = "Ubah Password";
			$this->load->view('template_karyawan/header', $data);
			$this->load->view('template_karyawan/sidebar');
			$this->load->view('karyawan/ubahPassword', $data);
			$this->load->view('template_karyawan/footer');
		}
	}
}
