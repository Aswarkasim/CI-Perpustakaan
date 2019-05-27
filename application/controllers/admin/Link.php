<?php 
/**
 * 
 */
class Link extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('link_model');
	}

	// Halaman utama
	public function index(){
		$link = $this->link_model->listing();

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_link','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('url','Alamat Link','required|is_unique[link.url]',
						array('required' => 'Linkname harus diisi',
			   				  'is_unique' => ' Kode Link <strong>'.$this->input->post('linkname').'</strong> Sudah ada. Buat kode link baru'));
	
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' 	=> 'Kelola Link',
							'link' => $link,
							'isi'	=> 'admin/link/list');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'nama_link'	=> $i->post('nama_link'),
							'url' 		=> $i->post('url'),
							'target'	=> $i->post('target'),
			);
			$this->link_model->tambah($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/link'),'refresh');
		}
	}

	// halaman edit
	public function edit($id_link){
		$link = $this->link_model->detail($id_link);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_link','Nama','required',
					array('required' => ' Nama harus diisi'));
		
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Edit Link: '.$link->nama_link,
							'link' => $link,
							'isi' => 'admin/link/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'id_link'	=> $link->id_link,
							'nama_link'	=> $i->post('nama_link'),
							'url' 		=> $i->post('url'),
							'target'	=> $i->post('target')
			);
		
			$this->link_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah diupdate');
			redirect(base_url('admin/link'),'refresh');
		}
	}
	public function delete($id_link){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		//proteksi sebelum dihapus
		$data = array('id_link' => $id_link);
		$this->link_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/link'),'refresh');
	}
}