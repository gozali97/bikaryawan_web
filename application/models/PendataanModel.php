<?php

class PendataanModel extends CI_Model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}
	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function insert_batch($table = null, $data = array())
	{
		$jumlah = count($data);
		if ($jumlah > 0) {
			$this->db->insert_batch($table, $data);
		}
	}

	public function cek_login()
	{
		$email = set_value('email');
		$password = set_value('password');

		$result = $this->db->where('email', $email)->where('password', md5($password))->limit(1)->get('tb_karyawan');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return FALSE;
		}
	}

	function get_alpha()
	{
		return $this->db->query("SELECT jml_potongan FROM tb_potongan_gaji WHERE jenis_potongan = 'alpha'");
	}
}
