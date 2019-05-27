<?php 
/**
 * 
 */
class Peminjaman_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('peminjaman.*,
						  buku.judul_buku,
						  buku.kode_buku,
						  buku.nomor_seri,
						  buku.penerbit,
						  anggota.nama_anggota');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//peminjaman anggota
	public function anggota($id_anggota){
		$this->db->select('peminjaman.*,
						  buku.judul_buku,
						  buku.kode_buku,
						  buku.nomor_seri,
						  buku.penerbit,
						  anggota.nama_anggota');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
		$this->db->where('peminjaman.id_anggota', $id_anggota);
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function limit_peminjaman_anggota($id_anggota){
		$this->db->select('peminjaman.*,
						  buku.judul_buku,
						  buku.kode_buku,
						  buku.nomor_seri,
						  buku.penerbit,
						  anggota.nama_anggota');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
		$this->db->where('peminjaman.id_anggota', $id_anggota);
		$this->db->where('peminjaman.status_kembali <> ', 'Sudah');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('id_peminjaman',$id_peminjaman);
		//$this->db->where('peminjaman.id_anggota', $id_anggota);
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($peminjamanname, $password){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where(array('peminjamanname' => $peminjamanname, 
						   'password' => sha1($password)));
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->row();
	}



	//tambah
	public function tambah($data){
		$this->db->insert('peminjaman', $data);
	}

	public function edit($data){
		$this->db->where('id_peminjaman', $data['id_peminjaman']);
		$this->db->update('peminjaman', $data);
	}

	public function delete($data){
		$this->db->where('id_peminjaman', $data['id_peminjaman']);
		$this->db->delete('peminjaman', $data);
	}
}