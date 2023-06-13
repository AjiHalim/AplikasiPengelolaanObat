<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function akses_login($username='', $password='')
	{
		$list = $this->db->get('tb_user')->result_array();

		$user = null;
		$sandi = null;
		foreach ($list as $key) {
			$nama = $key['username'];
			$sandi = $key['password'];
			$id = $key['id_user'];
		}
		$query = "select * from tb_user where username = '$nama' and password = '$sandi'";
		$hasil = $this->db->query($query)->result_array();

		// melakukan akses session
		$this->session->set_userdata('id',$id);
		$this->session->set_userdata('name',$nama);

		if ($hasil) {
			redirect('/Main/dashboard');
		}else {
			$this->session->set_Flashdata('gagal', "<div class='bg-warning ucapan'>username/ password anda salah silahkan uangi lagi</div>");
			redirect('/Proses');
		}
	}

	function registrasi($nama="", $username="", $password="" ){
		$query = "insert into tb_user (fullname, username, password, is_active) values('$nama', '$username', '$password', 0)";
		$hasil = $this->db->query($query);

		if ($hasil) {
			$this->session->set_Flashdata('berhasil', "<div class='bg-success ucapan'>Selamat Anda Berhasil Membuat Akun Silahkan Login</div>");
			if (isset($_SESSION['name'])) {
				redirect('/Main/user');
			}else {
				redirect('/Proses');
			}
			
		}else {
			$this->session->set_Flashdata('gagal', "<div class='bg-success ucapan'>Maaf Anda Gagal Membuat Akun</div>");
			redirect('/Main/daftar');
		}
	}

	function list()
	{
		return $this->db->get('tb_user')->result_array();
	}
	function listbersyarat($data="")
	{
		return $this->db->get_where('tb_user', ['is_active' => $data])->result_array();
	}
	function jumlah_user()
	{
		$query = "select count(id_user) as jumlah_user from tb_user";
		return $this->db->query($query)->result_array();
	}
	function jumlah_user_aktif()
	{
		$query = "select count(id_user) as jumlah_user_aktif from tb_user where is_active = 1 ";
		return $this->db->query($query)->result_array();
	}
	function jumlah_user_nonaktif()
	{
		$query = "select count(id_user) as jumlah_user_nonaktif from tb_user where is_active = 0";
		return $this->db->query($query)->result_array();
	}

	function delete($value='')
	{
		$query = "delete from tb_user where id_user = $value";
		$data = $this->db->query($query);
		if ($data) {
			redirect('/Main/user');
		}
	}
	function aktif_user($value='')
	{		
		$this->db->where('id_user', $value);
			  $data = $this->db->update('tb_user', ['is_active' => 1]);	
		if ($data) {
			redirect('/Main/user');
		}
	}
}