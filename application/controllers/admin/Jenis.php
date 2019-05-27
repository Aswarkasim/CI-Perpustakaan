<?php 
/**
 * 
 */
class Jenis extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('jenis_model');
	}

	// Halaman utama
	public function index(){
		$jenis = $this->jenis_model->listing();

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('kode_jenis','Kode jenis buku','required|is_unique[jenis.kode_jenis]',
						array('required' => 'Jenisname harus diisi',
			   				  'is_unique' => ' Kode Jenis <strong>'.$this->input->post('jenisname').'</strong> Sudah ada. Buat kode jenis baru'));
	
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' 	=> 'Kelola Jenis Buku',
							'jenis' => $jenis,
							'isi'	=> 'admin/jenis/list');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'kode_jenis'	=> $i->post('kode_jenis'),
							'nama_jenis' 	=> $i->post('nama_jenis'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan'),
			);
			$this->jenis_model->tambah($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/jenis'),'refresh');
		}
	}

	// halaman edit
	public function edit($id_jenis){
		$jenis = $this->jenis_model->detail($id_jenis);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','required',
					array('required' => ' Nama harus diisi'));
		
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Edit Jenis: '.$jenis->nama_jenis,
							'jenis' => $jenis,
							'isi' => 'admin/jenis/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'id_jenis'		=> $id_jenis,
							'kode_jenis'	=> $i->post('kode_jenis'),
							'nama_jenis' 	=> $i->post('nama_jenis'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
			);
		
			$this->jenis_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah diupdate');
			redirect(base_url('admin/jenis'),'refresh');
		}
	}
	public function delete($id_jenis){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		//proteksi sebelum dihapus
		$data = array('id_jenis' => $id_jenis);
		$this->jenis_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/jenis'),'refresh');
	}
}