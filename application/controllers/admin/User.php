<?php 
/**
 * 
 */
class User extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$user = $this->user_model->listing();
		$data = array('title' => 'Data User ('.count($user). 'data)',
						'user' => $user,
						'isi' => 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tambah(){

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
					array('required '=> ' Email harus diisi',
						  'valid_email' => ' Format email salah'));
		$valid->set_rules('username','Username','required|is_unique[user.username]',
						array('required' => 'Username harus diisi',
			   				  'is_unique' => ' Username <strong>'.$this->input->post('username').'</strong> Sudah ada. Buat Username baru'));
		$valid->set_rules('password','Password','required|min_length[6]',
						array('required' => ' Password harus diisi',
							   'min_length' => ' Password minimal 6 karakter'));

		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Tambah User',
							'isi' => 'admin/user/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;
			$data = array(	'nama'			 => $i->post('nama'),
							'email' 		 => $i->post('email'),
							'username'		 => $i->post('username'),
							'password'		 => sha1($i->post('password')),
							'akses_level'	 => $i->post('akses_level'),
							'keterangan'	 => $i->post('keterangan')
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses',' Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
	}

	// halaman edit
	public function edit($id_user){
		$user = $this->user_model->detail($id_user);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
					array('required '=> ' Email harus diisi',
						  'valid_email' => ' Format email salah'));
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Edit User: '.$user->nama,
							'user' => $user,
							'isi' => 'admin/user/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke db
		}else{
			$i = $this->input;

			//jika input pass lebih dari 6 karekter
			if(strlen($i->post('password')) > 6){
				$data = array(	'id_user'		 => $id_user,
								'nama'			 => $i->post('nama'),
								'email' 		 => $i->post('email'),
								'password'		 => sha1($i->post('password')),
								'akses_level'	 => $i->post('akses_level'),
								'keterangan'	 => $i->post('keterangan')
				);
			}else{
				$data = array(	'id_user'		 => $id_user,
								'nama'			 => $i->post('nama'),
								'password'		 => sha1($i->post('password')),
								'akses_level'	 => $i->post('akses_level'),
								'keterangan'	 => $i->post('keterangan')
				);
			}//end if
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses',' Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
	}
	public function delete($id_user){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		//proteksi sebelum dihapus
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
}