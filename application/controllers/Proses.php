<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model('User_model', 'Um');
		$this->load->model('Obat_model', 'Om');
	}
	
	public function index()
	{
		$this->load->view('data/bagianCSS');	
			$this->load->view('isi/login');	
		$this->load->view('data/bagianJS');
	}
	public function daftar()
	{
		$this->load->view('data/bagianCSS');	
			$this->load->view('isi/registrasi');	
		$this->load->view('data/bagianJS');
	}
	public function prosesLogin()
	{

		$this->Um->akses_login($_POST['username'], $_POST['password']);
	}

	public function prosesRegistrasi()
	{

		$this->Um->registrasi($_POST['nama'], $_POST['user'], $_POST['sandi']);
	}

	public function prosesTambahJenisObat()
	{

		$this->Om->tambahJenisObat($_POST['nama']);
	}
	public function prosesEditJenisObat()
	{

		$this->Om->editJenisObat($_POST['nama'],$_POST['id'] );
	}
	public function prosesHapusJenisObat($data="")
	{

		$this->Om->hapusJenis($data);
	}

	public function prosesTambahObat()
	{


		$this->Om->tambahObat($_POST['nama'], $_POST['nama_jenis_obat'],$_POST['stok'], $_POST['satuan'], $_POST['kadarluasa']);
	}
	public function prosesEditObat()
	{
		echo$_POST['id'];
		$this->Om->editObat($_POST['nama'], $_POST['nama_jenis_obat'],$_POST['stok'], $_POST['satuan'], $_POST['kadarluasa'], $_POST['id']);
	}
	public function prosesHapusObat($data="")
	{

		$this->Om->hapusObat($data);
	}
}