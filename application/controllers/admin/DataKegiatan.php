<?php

class DataKegiatan extends CI_Controller
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
		$data['title'] = "Laporan Kegiatan";
		$data['kegiatan'] = $this->db->query("SELECT * FROM tb_kegiatan")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dataKegiatan', $data);
		$this->load->view('template_admin/footer');
	}

	public function input()
	{
		$data['title'] = "Tambah Data Kegiatan";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahKegiatan', $data);
		$this->load->view('template_admin/footer');
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

	public function cetak()
	{
		$data['title'] = "Cetak Laporan Kegiatan Karyawan";
		$data['lap_kegiatan'] = $this->db->query("SELECT tb_kegiatan.*, tb_karyawan.* FROM tb_kegiatan
		INNER JOIN tb_karyawan ON tb_karyawan.id_karyawan=tb_kegiatan.karyawan_id
		ORDER BY tb_karyawan.nama_karyawan ASC")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/cetakKegiatan');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('created_at', 'Tanggal', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('lampiran', 'Foto', 'required');
	}
}
