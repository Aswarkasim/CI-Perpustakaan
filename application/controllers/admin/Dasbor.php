<?php 
/**
 * 
 */
class Dasbor extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//home page
	public function index(){
		$data = array('title' => 'Halaman Dashboard',
					  'isi' => 'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function profile(){
		$id_user		 = $this->session->userdata('id_user');
		$user 			 = $this->user_model->detail($id_user);

		//validation error
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
					array('required' => ' Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
					array('required '=> ' Email harus diisi',
						  'valid_email' => ' Format email salah'));
		//end validasi
		if($valid->run()===FALSE){
			$data = array('title' => 'Update Profile: '.$user->nama,
							'user' => $user,
							'isi' => 'admin/dasbor/profile');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//jika tdk error, maka masuk ke d b
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
			$this->session->set_flashdata('sukses',' Profile telah diupdate');
			redirect(base_url('admin/dasbor/profile'),'refresh');
		}
	}
}