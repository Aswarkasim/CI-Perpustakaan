<?php 
/**
 * 
 */
class File_buku extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('file_buku_model');
		$this->load->model('buku_model');
	}
	public function index()
	{
		$file_buku = $this->file_buku_model->listing();
		$data = array('title'		 => 'Data File Buku ('.count($file_buku). ')',
						'file_buku'  => $file_buku,
						'isi'		 => 'admin/file_buku/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function unduh($id_file_buku){
		$file_buku = $this->file_buku_model->detail($id_file_buku);
		//proses download
		$folder = './assets/upload/files/';
		$file = $file_buku->nama_file;
		force_download($folder.$file, NULL);
	}

	//kelola file buku
	public function kelola($id_buku){
		$file_buku = $this->file_buku_model->buku($id_buku);
		$buku = $this->buku_model->detail($id_buku);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('judul_file','Judul File','required',
					array('required' => '%s harus diisi'));

		//jika ada error
		if($valid->run()){

			$config['upload_path']   = './assets/upload/files/';
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('nama_file')) {


		$data = array('title' 		=> 'Data File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
					  'file_buku'	=> $file_buku,
					  'buku'		=> $buku,
					  'error'		=> $this->upload->display_errors(),
					  'isi'			=> 'admin/file_buku/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
			}else{
			//upload
			$upload_data		= array('uploads' => $this->upload->data());

			$i = $this->input;
			$data = array(	'id_user'			 => $this->session->userdata('id_user'),
							'id_buku' 			 => $id_buku,
							'judul_file'		 => $i->post('judul_file'),
							'nama_file'			 => $upload_data['uploads']['file_name'],
							'keterangan'		 => $i->post('keterangan'),
							'urutan'			 => $i->post('urutan')

			);
			$this->file_buku_model->tambah($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/file_buku'),'refresh');
		}}
		$data = array('title' 		=> 'Data File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
					  'file_buku'	=> $file_buku,
					  'buku'		=> $buku,
					  'isi'			=> 'admin/file_buku/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// halaman edit
	public function edit($id_file_buku){
		$file_buku = $this->file_buku_model->detail($id_file_buku);
		$id_buku = $file_buku->id_buku;
		$buku = $this->buku_model->detail($id_buku);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('judul_file','Judul File','required',
					array('required' => '%s harus diisi'));

		//jika ada error
		if($valid->run()){
			if(!empty($_FILES['nama_file']['name'])){

			$config['upload_path']   = './assets/upload/files/';
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('nama_file')) {


		$data = array('title' 		=> 'Edit File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
					  'file_buku'	=> $file_buku,
					  'buku'		=> $buku,
					  'error'		=> $this->upload->display_errors(),
					  'isi'			=> 'admin/file_buku/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
			}else{
			//upload
			$upload_data		= array('uploads' => $this->upload->data());

			//Hapus File lama
			unlink('./assets/upload/files/'.$file_buku->nama_file);
			//End hapus file lama



			$i = $this->input;
			$data = array(	'id_file_buku'		 => $id_file_buku,
							'id_user'			 => $this->session->userdata('id_user'),
							'id_buku' 			 => $id_buku,
							'judul_file'		 => $i->post('judul_file'),
							'nama_file'			 => $upload_data['uploads']['file_name'],
							'keterangan'		 => $i->post('keterangan'),
							'urutan'			 => $i->post('urutan')

			);
			$this->file_buku_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/file_buku'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_file_buku'		 => $id_file_buku,
							'id_user'			 => $this->session->userdata('id_user'),
							'id_buku' 			 => $id_buku,
							'judul_file'		 => $i->post('judul_file'),
							'keterangan'		 => $i->post('keterangan'),
							'urutan'			 => $i->post('urutan')

			);
			$this->file_buku_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/file_buku'),'refresh');
		}}
		$data = array('title' 		=> 'Edit File Buku: '.$buku->judul_buku.' ('.@count($file_buku).')',
					  'file_buku'	=> $file_buku,
					  'buku'		=> $buku,
					  'isi'			=> 'admin/file_buku/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($id_file_buku, $id_buku){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}

		//delete gambar
		$file_buku = $this->file_buku_model->detail($id_file_buku);
		if($file_buku->nama_file != ""){
			unlink('./assets/upload/files/'.$file_buku->nama_file);
		}
		//proteksi sebelum dihapus
		$data = array('id_file_buku' => $id_file_buku);
		$this->file_buku_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/file_buku/kelola/'.$id_buku),'refresh');
	}
}