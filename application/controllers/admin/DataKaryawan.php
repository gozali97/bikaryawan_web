<?php

class DataKaryawan extends CI_Controller
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
		$data['title'] = "Data Karyawan";
		$data['karyawan'] = $this->PendataanModel->get_data('tb_karyawan')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/karyawan', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Data Karyawan";
		$data['divisi'] = $this->PendataanModel->get_data('tb_divisi')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahKaryawan', $data);
		$this->load->view('template_admin/footer');
	}

	public function store()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		} else {
			$nik = $this->input->post('nik');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$divisi = $this->input->post('divisi');
			$tgl_masuk = $this->input->post('tgl_masuk');
			$status = $this->input->post('status');
			$photo = $_FILES['photo']['name'];
			if ($photo = '') {
			} else {
				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('photo')) {
					echo "Photo Gagal diupload";
				} else {
					$photo = $this->upload->data('file_name');
				}
			}
			$no_tlp = $this->input->post('no_tlp');
			$alamat = $this->input->post('alamat');
			$role_id = $this->input->post('role_id');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$data = array(
				'nik' => $nik,
				'nama_karyawan' => $nama_karyawan,
				'jenis_kelamin' => $jenis_kelamin,
				'divisi' => $divisi,
				'tgl_masuk' => $tgl_masuk,
				'status' => $status,
				'photo' => $photo,
				'no_tlp' => $no_tlp,
				'alamat' => $alamat,
				'role_id' => $role_id,
				'email' => $email,
				'password' => $password,
			);

			$this->PendataanModel->insert_data($data, 'tb_karyawan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data karyawan berhasil ditambahkan.
		  </div>');
			redirect('admin/datakaryawan');
		}
	}

	public function update_data($id)
	{
		$data['title'] = "Ubah Data Karyawan";
		$where = array('id_karyawan' => $id);
		$data['divisi'] = $this->PendataanModel->get_data('tb_divisi')->result();
		$data['karyawan'] = $this->db->query("SELECT * FROM tb_karyawan WHERE id_karyawan ='$id'")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/ubahKaryawan', $data);
		$this->load->view('template_admin/footer');
	}

	public function update()
	{
		$this->_rules();

		$id = $this->input->post('id_karyawan');
		if ($this->form_validation->run() == FALSE) {
			$this->update_data($id);
		} else {
			$id = $this->input->post('id_karyawan');
			$nik = $this->input->post('nik');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$divisi = $this->input->post('divisi');
			$tgl_masuk = $this->input->post('tgl_masuk');
			$status = $this->input->post('status');
			$photo = $_FILES['photo']['name'];
			if ($photo) {
				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('photo')) {
					$photo = $this->upload->data('file_name');
					$this->db->set('photo', $photo);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$no_tlp = $this->input->post('no_tlp');
			$alamat = $this->input->post('alamat');
			$role_id = $this->input->post('role_id');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$data = array(
				'nik' => $nik,
				'nama_karyawan' => $nama_karyawan,
				'jenis_kelamin' => $jenis_kelamin,
				'divisi' => $divisi,
				'tgl_masuk' => $tgl_masuk,
				'status' => $status,
				'no_tlp' => $no_tlp,
				'alamat' => $alamat,
				'role_id' => $role_id,
				'email' => $email,
				'password' => $password,
			);

			$where = array(
				'id_karyawan' => $id
			);

			$this->PendataanModel->update_data('tb_karyawan', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data karyawan berhasil diubah.
		  </div>');
			redirect('admin/datakaryawan');
		}
	}

	public function deleteData($id)
	{
		$where = array('id_karyawan' => $id);
		$this->PendataanModel->delete_data($where, 'tb_karyawan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Data karyawan berhasil dihapus.
		  </div>');
		redirect('admin/datakaryawan');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('nik', 'Nik', 'required');
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('no_tlp', 'No HP', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('role_id', 'Role', 'required');
	}
}
