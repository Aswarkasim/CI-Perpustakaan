<?php 
/**
 * 
 */
class Usulan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('usulan_model');
	}
	public function index()
	{
		$usulan = $this->usulan_model->listing();
		$data = array('title' => 'Data Usulan ('.count($usulan). 'data)',
						'usulan' => $usulan,
						'isi' => 'admin/usulan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah(){
		$valid 		= $this->form_validation;

		$valid->set_rules('judul', 'Judul', 'required|min_length[15]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 15 karakter'));

		$valid->set_rules('penulis', 'Penulis', 'required|min_length[6]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 6 karakter'));

		$valid->set_rules('penerbit', 'Penerbit', 'required|min_length[5]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 10 karakter'));

		$valid->set_rules('nama_pengusul', 'Nama Pengusul', 'required|min_length[6]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 6 karakter'));

		$valid->set_rules('email_pengusul', 'Email', 'required|valid_email',
					array('required'		=> '%s harus diisi',
						  'valid_email'		=> '%s tidak valid'));

		if($valid->run()===FALSE){
			$data = array('title' 	=> 'Buat Usulan Buku Baru',
						  'isi'		=> 'admin/usulan/tambah' );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(	'judul'			 => $i->post('judul'),
							'penulis' 		 => $i->post('penulis'),
							'penerbit'		 => $i->post('penerbit'),
							'keterangan'	 => $i->post('keterangan'),
							'nama_pengusul'	 => $i->post('nama_pengusul'),
							'email_pengusul' => $i->post('email_pengusul'),
							'ip_address'     => $this->input->ip_address(),
							'status_usulan'  => $i->post('status_usulan'),
							'tanggal_usulan' => date('Y-m-d H:i:s'),
			);
			$this->usulan_model->tambah($data);
			$this->session->set_flashdata('sukses',' Terima kasih, usulan andatelah kami terima. Kami akan segera melengkapi buku sesuai usulan Anda');
			redirect(base_url('admin/usulan'),'refresh');
		}	
	}

	public function edit($id_usulan){
		$usulan = $this->usulan_model->detail($id_usulan);

		$valid 		= $this->form_validation;

		$valid->set_rules('judul', 'Judul', 'required|min_length[15]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 15 karakter'));

		$valid->set_rules('penulis', 'Penulis', 'required|min_length[6]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 6 karakter'));

		$valid->set_rules('penerbit', 'Penerbit', 'required|min_length[5]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 10 karakter'));

		$valid->set_rules('nama_pengusul', 'Nama Pengusul', 'required|min_length[6]',
					array('required'		=> '%s harus diisi',
						  'min_length'		=> '%s minimal 6 karakter'));

		$valid->set_rules('email_pengusul', 'Email', 'required|valid_email',
					array('required'		=> '%s harus diisi',
						  'valid_email'		=> '%s tidak valid'));

		if($valid->run()===FALSE){
			$data = array('title' 	=> 'Edit Usulan Buku',
						  'usulan'	=> $usulan,
						  'isi'		=> 'admin/usulan/edit' );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(	'id_usulan'		 => $id_usulan,
							'judul'			 => $i->post('judul'),
							'penulis' 		 => $i->post('penulis'),
							'penerbit'		 => $i->post('penerbit'),
							'keterangan'	 => $i->post('keterangan'),
							'nama_pengusul'	 => $i->post('nama_pengusul'),
							'email_pengusul' => $i->post('email_pengusul'),
							'ip_address'     => $this->input->ip_address(),
							'status_usulan'  => $i->post('status_usulan'),
			);
			$this->usulan_model->edit($data);
			$this->session->set_flashdata('sukses',' Data usulan telah diupdate');
			redirect(base_url('admin/usulan'),'refresh');
		}	
	}

	public function delete($id_usulan){
		if($this->session->userdata('username') == ""  && $this->session->userdata('akses_level')==""){
			$this->session->set_flashdata('sukses', ' Silakan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		//proteksi sebelum dihapus
		$data = array('id_usulan' => $id_usulan);
		$this->usulan_model->delete($data);
		$this->session->set_flashdata('sukses', ' Data telah dihapus');
		redirect(base_url('admin/usulan'),'refresh');
	}
}