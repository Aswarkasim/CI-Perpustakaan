<?php 

/**
 * 
 */
class Buku extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('file_buku_model');
	}
//list buku baru
	public function index(){
		$buku = $this->buku_model->baru();
		$data = array('title' 	=> 'Koleksi Buku Baru',
					  'buku'	=> $buku,
					  'isi'		=> 'buku/list' );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}