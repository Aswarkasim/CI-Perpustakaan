<?php 
/**
 * 
 */
class Anggota extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('anggota_model');
	}
	public function index()
	{
		$anggota = $this->anggota_model->listing();
		$data = array('title' => 'Data Anggota ('.count($anggota). 'data)',
						'anggota' => $anggota,
						'isi' => 'admin/anggota/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tambah(){

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
					array('required '=> ' Email harus diisi',
						  'valid_email' => ' Format email salah'));
		$valid->set_rules('username','Username','required|is_unique[anggota.username]',
						array('required' => 'Username harus diisi',
			   				  'is_unique' => ' Username <strong>'.$this->input->post('username').'</strong> Sudah ada. Buat Username baru'));
		$valid->set_rules('password','Password','required|min_length[6]',
						array('required' => ' Password harus diisi',
							   'min_length' => ' Password minimal 6 karakter'));

		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Tambah Anggota',
							'isi' => 'admin/anggota/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'id_user'		 => $this->session->userdata('id_user'),
							'status_anggota' => $i->post('status_anggota'),
							'nama_anggota'	 => $i->post('nama_anggota'),
							'email' 		 => $i->post('email'),
							'telepon' 		 => $i->post('telepon'),
							'instansi'		 => $i->post('instansi'),
							'username'		 => $i->post('username'),
							'password'		 => sha1($i->post('password'))
			);
			$this->anggota_model->tambah($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/anggota'),'refresh');
		}
	}

	// halaman edit
	public function edit($id_anggota){
		$anggota = $this->anggota_model->detail($id_anggota);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
					array('required '=> ' Email harus diisi',
						  'valid_email' => ' Format email salah'));
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Edit Anggota: '.$anggota->nama_anggota,
							'anggota' => $anggota,
							'isi' => 'admin/anggota/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;

			//jika input pass lebih dari 6 karekter
			if(strlen($i->post('password')) > 6){
				$data = array(	'id_anggota'		 => $id_anggota,
								'id_user'		 => $this->session->userdata('id_user'),
								'status_anggota' => $i->post('status_anggota'),
								'nama_anggota'	 => $i->post('nama_anggota'),
								'email' 		 => $i->post('email'),
								'telepon' 		 => $i->post('telepon'),
								'instansi'		 => $i->post('instansi'),
								'password'		 => sha1($i->post('password'))
				);
			}else{
				$data = array(	'id_anggota'		 => $id_anggota,
								'id_user'		 => $this->session->userdata('id_user'),
								'status_anggota' => $i->post('status_anggota'),
								'nama_anggota'	 => $i->post('nama_anggota'),
								'email' 		 => $i->post('email'),
								'telepon' 		 => $i->post('telepon'),
								'instansi'		 => $i->post('instansi')
				);
			}//end if
			$this->anggota_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah diupdate');
			redirect(base_url('admin/anggota'),'refresh');
		}
	}
	public function delete($id_anggota){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		//proteksi sebelum dihapus
		$data = array('id_anggota' => $id_anggota);
		$this->anggota_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/anggota'),'refresh');
	}
}