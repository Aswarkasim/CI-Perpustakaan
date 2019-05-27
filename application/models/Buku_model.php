<?php 
/**
 * 
 */
class Buku_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('buku.*, 
						  jenis.nama_jenis,
						  jenis.kode_jenis,
						  bahasa.nama_bahasa,
						  bahasa.kode_bahasa,
						  user.nama');
		$this->db->from('buku');

		//join 4 tabel (buku jenis user bahasa)
		$this->db->join('jenis', 'jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa', 'bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user', 'user.id_user = buku.id_user', 'LEFT');
		//end join
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	//buku
	public function buku(){
		$this->db->select('buku.*, 
						  jenis.nama_jenis,
						  jenis.kode_jenis,
						  bahasa.nama_bahasa,
						  bahasa.kode_bahasa,
						  user.nama');
		$this->db->from('buku');

		//join 4 tabel (buku jenis user bahasa)
		$this->db->join('jenis', 'jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa', 'bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user', 'user.id_user = buku.id_user', 'LEFT');
		//end join
		//where
		$this->db->where('buku.status_buku', 'Publish');
		//batasi tampil buku
		$this->db->limit(5);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function baru(){
		$this->db->select('buku.*,
						   jenis.nama_jenis,
						   jenis.kode_jenis,
						   bahasa.nama_bahasa,
						   bahasa.kode_bahasa,
						   user.nama');
		$this->db->from('buku');
		$this->db->join('jenis', 'jenis.id_jenis = buku.id_jenis', 'LEFT');
		$this->db->join('bahasa', 'bahasa.id_bahasa = buku.id_bahasa', 'LEFT');
		$this->db->join('user', 'user.id_user = buku.id_user', 'LEFT');
		$this->db->where('buku.status_buku', 'Publish');
		$this->db->limit(20);
		$this->db->order_by('id_buku', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//cari buku
	public function cari($keywords){
		$this->db->select('buku.*, 
						  jenis.nama_jenis,
						  jenis.kode_jenis,
						  bahasa.nama_bahasa,
						  bahasa.kode_bahasa,
						  user.nama');
		$this->db->from('buku');

		//join 4 tabel (buku jenis user bahasa)
		$this->db->join('jenis', 'jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa', 'bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user', 'user.id_user = buku.id_user', 'LEFT');
		//end join
		//where
		$this->db->where('buku.status_buku', 'Publish');
		//like
		$this->db->like('buku.judul_buku',$keywords);
		//batasi tampil buku
		$this->db->limit(5);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function read($id_buku){
		$this->db->select('buku.*, 
						  jenis.nama_jenis,
						  jenis.kode_jenis,
						  bahasa.nama_bahasa,
						  bahasa.kode_bahasa,
						  user.nama');
		$this->db->from('buku');

		//join 4 tabel (buku jenis user bahasa)
		$this->db->join('jenis', 'jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa', 'bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user', 'user.id_user = buku.id_user', 'LEFT');
		//end join
		//where
		$this->db->where('buku.status_buku', 'Publish');
		$this->db->where('id_buku', $id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail($id_buku){
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku',$id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($bukuname, $password){
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where(array('bukuname' => $bukuname, 
						   'password' => sha1($password)));
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}



	//tambah
	public function tambah($data){
		$this->db->insert('buku', $data);
	}

	public function edit($data){
		$this->db->where('id_buku', $data['id_buku']);
		$this->db->update('buku', $data);
	}

	public function delete($data){
		$this->db->where('id_buku', $data['id_buku']);
		$this->db->delete('buku', $data);
	}
}