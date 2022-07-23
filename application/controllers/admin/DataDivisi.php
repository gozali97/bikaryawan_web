<?php

class DataDivisi extends CI_Controller
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
		$data['title'] = "Data Divisi";
		$data['divisi'] = $this->PendataanModel->get_data('tb_divisi')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/divisi', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Data Divisi";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahDivisi', $data);
		$this->load->view('template_admin/footer');
	}

	public function store()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		} else {
			$nama_divisi = $this->input->post('nama_divisi');
			$gaji_pokok = $this->input->post('gaji_pokok');
			$uang_makan = $this->input->post('uang_makan');

			$data = array(
				'nama_divisi' => $nama_divisi,
				'gaji_pokok' => $gaji_pokok,
				'uang_makan' => $uang_makan,
			);

			$this->PendataanModel->insert_data($data, 'tb_divisi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data divisi berhasil ditambahkan.
		  </div>');
			redirect('admin/datadivisi');
		}
	}
	public function update_data($id)
	{
		$where = array('id_divisi' => $id);
		$data['divisi'] = $this->db->query("SELECT * FROM tb_divisi WHERE id_divisi = '$id'")->result();
		$data['title'] = "Ubah Data Divisi";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/ubahDivisi', $data);
		$this->load->view('template_admin/footer');
	}

	public function update()
	{
		$this->_rules();

		$id = $this->input->post('id_divisi');
		if ($this->form_validation->run() == FALSE) {
			$this->update_data($id);
		} else {
			$id = $this->input->post('id_divisi');
			$nama_divisi = $this->input->post('nama_divisi');
			$gaji_pokok = $this->input->post('gaji_pokok');
			$uang_makan = $this->input->post('uang_makan');

			$data = array(
				'nama_divisi' => $nama_divisi,
				'gaji_pokok' => $gaji_pokok,
				'uang_makan' => $uang_makan,
			);

			$where = array(
				'id_divisi' => $id
			);

			$this->PendataanModel->update_data('tb_divisi', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data divisi berhasil diubah.
		  </div>');
			redirect('admin/datadivisi');
		}
	}

	public function deleteData($id)
	{
		$where = array('id_divisi' => $id);
		$this->PendataanModel->delete_data($where, 'tb_divisi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data divisi berhasil dihapus.
		  </div>');
		redirect('admin/datadivisi');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_divisi', 'nama divisi', 'required');
		$this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
		$this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
	}
}
