<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['name'])) {
			redirect('/Proses');
		}

		$this->load->model('User_model', 'Um');
		$this->load->model('Obat_model', 'Om');
	}
	

	public function dashboard()
	{
		$data['list'] =$this->Om->manajemen_khusus();

		$data['jumlah_user'] = $this->Um->jumlah_user();
		$data['aktif'] = $this->Um->jumlah_user_aktif();
		$data['nonaktif'] = $this->Um->jumlah_user_nonaktif();

		$data['jumlah_obat'] = $this->Om->jumlah_obat();
		$data['expired'] = $this->Om->jumlah_obat_exp();
		$data['nonexpired'] = $this->Om->jumlah_obat_nonexp();
		$this->load->view('data/bagianCSS');	
			$this->load->view('isi/halaman_utama', $data);		
	}

	// public function user_khusus(){
	// 	$this->Um->listbersyarat()
	// }
	public function user()
	{
		$data['list'] = $this->Um->list();
		$data['jumlah'] = $this->Um->jumlah_user();
		$data['aktif'] = $this->Um->jumlah_user_aktif();
		$data['nonaktif'] = $this->Um->jumlah_user_nonaktif();


		$this->load->view('data/bagianCSS');
			$this->load->view('isi/user', $data);	
	}

	public function hapusUser($value='')
	{
		$this->Um->delete($value);
	}

	public function aktif($value='')
	{
		$this->Um->aktif_user($value);
	}

	public function jenis_obat()
	{
		$data['jenis'] =$this->Om->list_jenis();
		$this->load->view('data/bagianCSS');
			$this->load->view('isi/jenis_obat', $data);	
		$this->load->view('data/bagianJS');
	}

	public function manajemen_obat()
	{
		$data['jenis'] =$this->Om->list_jenis();
		$data['list'] =$this->Om->manajemen_khusus();
		
		$data['jumlah'] = $this->Om->jumlah_obat();
		$data['expired'] = $this->Om->jumlah_obat_exp();
		$data['nonexpired'] = $this->Om->jumlah_obat_nonexp();
		$this->load->view('data/bagianCSS');
			$this->load->view('isi/manajemen', $data);	
		$this->load->view('data/bagianJS');
	}

	public function Logout()
	{
		$this->session->sess_destroy();
			redirect('/Proses');
	}
}