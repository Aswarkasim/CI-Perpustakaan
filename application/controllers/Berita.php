<?php 
/**
 * 
 */
class Berita extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('file_buku_model');
	}

	//Homepage
	public function index(){
		$berita 	= $this->berita_model->berita();
		$data = array('title' 	=> 'Berita Terbaru',
					  'berita'	=> $berita,
					  'isi'		=> 'berita/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function read($slug_berita){
		$berita 	= $this->berita_model->read($slug_berita);
		$berita_lain = $this->berita_model->berita_lain();
		$data = array('title' 		=> $berita->judul_berita,
					  'berita'		=> $berita,
					  'berita_lain' => $berita_lain,
					  'isi'			=> 'berita/read'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}