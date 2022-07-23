<?php

class DataKegiatan extends CI_Controller
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
		$data['title'] = "Data Kegiatan";
		$id = $this->session->userdata('id_karyawan');
		$data['kegiatan'] = $this->db->query("SELECT * FROM tb_kegiatan WHERE karyawan_id ='$id'")->result();
		$this->load->view('template_karyawan/header', $data);
		$this->load->view('template_karyawan/sidebar');
		$this->load->view('karyawan/dataKegiatan', $data);
		$this->load->view('template_karyawan/footer');
	}

	public function input()
	{
		$data['title'] = "Tambah Data Kegiatan";
		$this->load->view('template_karyawan/header', $data);
		$this->load->view('template_karyawan/sidebar');
		$this->load->view('karyawan/tambahKegiatan', $data);
		$this->load->view('template_karyawan/footer');
	}

	public function store()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		} else {
			$id = $this->session->userdata('id_karyawan');
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$created_at = $this->input->post('created_at');
			$keterangan = $this->input->post('keterangan');
			$lampiran = $_FILES['lampiran']['name'];
			if ($lampiran = '') {
			} else {
				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('lampiran')) {
					echo "lampiran Gagal diupload";
				} else {
					$lampiran = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'created_at' => $created_at,
				'keterangan' => $keterangan,
				'lampiran' => $lampiran,
				'karyawan_id' => $id,
			);
			$this->PendataanModel->insert_data($data, 'tb_kegiatan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data kegiatan berhasil ditambahkan.
		  </div>');
			redirect('karyawan/dataKegiatan');
		}
	}

	public function delete($id)
	{
		$where = array('id_kegiatan' => $id);
		$this->PendataanModel->delete_data($where, 'tb_kegiatan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data kegiatan berhasil dihapus.
		  </div>');
		redirect('karyawan/dataKegiatan');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('created_at', 'Tanggal', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		// $this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
	}
}
