<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {
	function list_jenis()
	{
		return $this->db->get('tb_jenis_obat')->result_array();
	}

	function tambahJenisObat($nama = ""){
		$query = "insert into tb_jenis_obat (nama_jenis_obat) values ('$nama')";

		$data = $this->db->query($query);

		if ($data) {
			$this->session->set_Flashdata('pesan', "<div class='bg-success ucapan'>Data Sudah Berhasil di Tambahkan</div>");
			redirect('/Main/jenis_obat');
		}else {
			$this->session->set_Flashdata('pesan', "<div class='bg-danger ucapan'>Gagal Menambahkan Data</div>");
			redirect('/Main/jenis_obat');
		}

	}

	function editJenisObat($nama = "", $id=""){
		$this->db->where('id_jenis_obat', $id);
			  $data = $this->db->update('tb_jenis_obat', ['nama_jenis_obat' => $nama]);	

		if ($data) {
			$this->session->set_Flashdata('pesan', "<div class='bg-success ucapan'>Data Sudah Berhasil di ubah</div>");
			redirect('/Main/jenis_obat');
		}else{
			$this->session->set_Flashdata('pesan', "<div class='bg-warning ucapan'>Data Gagal di ubah</div>");
			redirect('/Main/jenis_obat');
		}

	}

	function hapusJenis($id = ""){
		$query = "delete from tb_jenis_obat where id_jenis_obat = $id";

		$data = $this->db->query($query);

		if ($data) {
			$this->session->set_Flashdata('pesan', "<div class='bg-success ucapan'>Data Sudah Berhasil di Hapus</div>");
			redirect('/Main/jenis_obat');
		}else{
			$this->session->set_Flashdata('pesan', "<div class='bg-warning ucapan'>Data Gagal di Hapus</div>");
			redirect('/Main/jenis_obat');
		}

	}

	function manajemen()
	{
		$this->db->select("tb_jenis_obat.nama_jenis_obat, tb_obat.*");
		$this->db->from("tb_obat");
		$this->db->join("tb_jenis_obat", 'tb_obat.id_jenis_obat = tb_jenis_obat.id_jenis_obat');

		$data = $this->db->get()->result_array();

		return $data;
	}
	function manajemen_khusus()
	{
		$this->db->select("tb_jenis_obat.nama_jenis_obat, tb_obat.*");
		$this->db->from("tb_obat");
		$this->db->join("tb_jenis_obat", 'tb_obat.id_jenis_obat = tb_jenis_obat.id_jenis_obat');
		$this->db->order_by('tanggal_expired');

		$data = $this->db->get()->result_array();

		return $data;
	}

	function jumlah_obat()
	{
		$query = "select count(id_obat) as jumlah_obat from tb_obat";
		return $this->db->query($query)->result_array();
	}
	function jumlah_obat_exp()
	{
		$batas = date('y-m-d');
		$query = "select count(id_obat) as expired from tb_obat where tanggal_expired < $batas";
		return $this->db->query($query)->result_array();
	}
	function jumlah_obat_nonexp()
	{
		$batas = date('y-m-d');
		$query = "select count(id_obat) as nonexpired from tb_obat where tanggal_expired > $batas";
		return $this->db->query($query)->result_array();
	}

	function tambahObat($nama = "", $jenis="", $stock ="", $satuan="", $kadarluasa=""){
		$id = $this->db->query("select id_jenis_obat from tb_jenis_obat where nama_jenis_obat = '$jenis'")->result_array();
		$data_id =null;
		$harga = $satuan * $stock;
		foreach ($id as $value) {
			$data_id = $value['id_jenis_obat'];
		}
		$query = "insert into tb_obat (nama_obat, id_jenis_obat, satuan, harga, stok, tanggal_expired) values ('$nama', '$data_id', '$satuan', '$harga', '$stock', '$kadarluasa')";

		$data = $this->db->query($query);

		if ($data) {
			$this->session->set_Flashdata('pesan', "<div class='bg-success ucapan'>Data Sudah Berhasil di Tambahkan</div>");
			redirect('/Main/manajemen_obat');
		}else {
			$this->session->set_Flashdata('pesan', "<div class='bg-danger ucapan'>Gagal Menambahkan Data</div>");
			redirect('/Main/manajemen_obat');
		}

	}

	function editObat($nama = "", $jenis="", $stock ="", $satuan="", $kadarluasa="", $id_obat=''){

		$id = $this->db->query("select id_jenis_obat from tb_jenis_obat where nama_jenis_obat = '$jenis'")->result_array();
		$data_id =null;
		$harga = $satuan * $stock;
		foreach ($id as $value) {
			$data_id = $value['id_jenis_obat'];
		}
		$data_update = array(
			'nama_obat' => $nama,
			'id_jenis_obat' => $data_id,
			'stok' => $stock,
			'satuan' => $satuan,
			'harga' => $stock * $satuan,
			'tanggal_expired' => $kadarluasa,
		);
		$this->db->where('id_obat', $id_obat);
			  $data = $this->db->update('tb_obat', $data_update);	

		if ($data) {
			$this->session->set_Flashdata('pesan', "<div class='bg-success ucapan'>Data Sudah Berhasil di ubah</div>");
			redirect('/Main/manajemen_obat');
		}else{
			$this->session->set_Flashdata('pesan', "<div class='bg-warning ucapan'>Data Gagal di ubah</div>");
			redirect('/Main/manajemen_obat');
		}

	}

	function hapusObat($id = ""){
		$query = "delete from tb_obat where id_obat = $id";

		$data = $this->db->query($query);

		if ($data) {
			$this->session->set_Flashdata('pesan', "<div class='bg-success ucapan'>Data Sudah Berhasil di Hapus</div>");
			redirect('/Main/manajemen_obat');
		}else{
			$this->session->set_Flashdata('pesan', "<div class='bg-warning ucapan'>Data Gagal di Hapus</div>");
			redirect('/Main/manajemen_obat');
		}

	}
}