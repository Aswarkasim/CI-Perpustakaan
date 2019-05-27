<?php 
/**
 * 
 */
class Berita_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	//banner/slider
	public function slider(){
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array('jenis_berita'	=>'slider',
								'status_berita'	=>'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slide
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function berita(){
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array('jenis_berita'	=>'Berita',
								'status_berita'	=>'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slide
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	//berita lain
	public function berita_lain(){
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array('status_berita'	=>'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slide
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	//read berita
	public function read($slug_berita){
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array('slug_berita'	=> $slug_berita,
								'status_berita'	=>'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slide
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}


	public function detail($id_berita){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data){
		$this->db->insert('berita', $data);
	}

	public function edit($data){
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita', $data);
	}

	public function delete($data){
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita', $data);
	}
}
