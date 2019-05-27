<?php 
/**
 * 
 */
class Usulan_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('*');
		$this->db->from('usulan');
		$this->db->order_by('id_usulan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_usulan){
		$this->db->select('*');
		$this->db->from('usulan');
		$this->db->where('id_usulan',$id_usulan);
		$this->db->order_by('id_usulan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($usulanname, $password){
		$this->db->select('*');
		$this->db->from('usulan');
		$this->db->where(array('usulanname' => $usulanname, 
						   'password' => sha1($password)));
		$this->db->order_by('id_usulan','DESC');
		$query = $this->db->get();
		return $query->row();
	}



	//tambah
	public function tambah($data){
		$this->db->insert('usulan', $data);
	}

	public function edit($data){
		$this->db->where('id_usulan', $data['id_usulan']);
		$this->db->update('usulan', $data);
	}

	public function delete($data){
		$this->db->where('id_usulan', $data['id_usulan']);
		$this->db->delete('usulan', $data);
	}
}