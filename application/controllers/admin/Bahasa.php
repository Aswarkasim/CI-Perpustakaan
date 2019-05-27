<?php 
/**
 * 
 */
class Bahasa extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('bahasa_model');
	}

	// Halaman utama
	public function index(){
		$bahasa = $this->bahasa_model->listing();

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('kode_bahasa','Kode bahasa buku','required|is_unique[bahasa.kode_bahasa]',
						array('required' => 'Bahasaname harus diisi',
			   				  'is_unique' => ' Kode Bahasa <strong>'.$this->input->post('bahasaname').'</strong> Sudah ada. Buat kode bahasa baru'));
	
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' 	=> 'Kelola Bahasa Buku',
							'bahasa' => $bahasa,
							'isi'	=> 'admin/bahasa/list');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'kode_bahasa'	=> $i->post('kode_bahasa'),
							'nama_bahasa' 	=> $i->post('nama_bahasa'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan'),
			);
			$this->bahasa_model->tambah($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/bahasa'),'refresh');
		}
	}

	// halaman edit
	public function edit($id_bahasa){
		$bahasa = $this->bahasa_model->detail($id_bahasa);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
					array('required' => ' Nama harus diisi'));
		
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Edit Bahasa: '.$bahasa->nama_bahasa,
							'bahasa' => $bahasa,
							'isi' => 'admin/bahasa/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'id_bahasa'		=> $id_bahasa,
							'kode_bahasa'	=> $i->post('kode_bahasa'),
							'nama_bahasa' 	=> $i->post('nama_bahasa'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
			);
		
			$this->bahasa_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah diupdate');
			redirect(base_url('admin/bahasa'),'refresh');
		}
	}
	public function delete($id_bahasa){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		//proteksi sebelum dihapus
		$data = array('id_bahasa' => $id_bahasa);
		$this->bahasa_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/bahasa'),'refresh');
	}
}