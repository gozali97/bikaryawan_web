<?php

class PotonganGaji extends CI_Controller
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
		$data['title'] = "Data Potongan Gaji";
		$data['pot_gaji'] = $this->PendataanModel->get_data('tb_potongan_gaji')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/potonganGaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Potongan Gaji";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahPotongan', $data);
		$this->load->view('template_admin/footer');
	}

	public function store()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		} else {
			$jenis_potongan = $this->input->post('jenis_potongan');
			$jml_potongan = $this->input->post('jml_potongan');

			$data = array(
				'jenis_potongan' => $jenis_potongan,
				'jml_potongan' => $jml_potongan,
			);

			$this->PendataanModel->insert_data($data, 'tb_potongan_gaji');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data berhasil ditambahkan.
		  </div>');
			redirect('admin/potongangaji');
		}
	}

	public function update_data($id)
	{
		$where = array('id_potongan' => $id);
		$data['pot_gaji'] = $this->db->query("SELECT * FROM tb_potongan_gaji WHERE id_potongan = '$id'")->result();
		$data['title'] = "Ubah Data Potongan Gaji";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/ubahPotongan', $data);
		$this->load->view('template_admin/footer');
	}

	public function update()
	{
		$this->_rules();

		$id = $this->input->post('id_potongan');
		if ($this->form_validation->run() == FALSE) {
			$this->update_data($id);
		} else {
			$id = $this->input->post('id_potongan');
			$jenis_potongan = $this->input->post('jenis_potongan');
			$jml_potongan = $this->input->post('jml_potongan');

			$data = array(
				'jenis_potongan' => $jenis_potongan,
				'jml_potongan' => $jml_potongan,
			);

			$where = array(
				'id_potongan' => $id
			);

			$this->PendataanModel->update_data('tb_potongan_gaji', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data berhasil diubah.
		  </div>');
			redirect('admin/potongangaji');
		}
	}

	public function deleteData($id)
	{
		$where = array('id_potongan' => $id);
		$this->PendataanModel->delete_data($where, 'tb_potongan_gaji');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data berhasil dihapus.
		  </div>');
		redirect('admin/potongangaji');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('jenis_potongan', 'jenis potongan', 'required');
		$this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
	}
}
