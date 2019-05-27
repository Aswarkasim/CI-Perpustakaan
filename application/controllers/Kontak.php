<?php 

/**
 * 
 */
class Kontak extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
//list kontak baru
	public function index(){
		$konfigurasi 	= $this->konfigurasi_model->listing();


		$data = array('title' 		=> 'Menghubungi '.$konfigurasi->namaweb,
					  'konfigurasi'	=> $konfigurasi,
					  'isi'			=> 'kontak/list' );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}