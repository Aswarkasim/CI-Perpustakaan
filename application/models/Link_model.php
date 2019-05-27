<?php 
/**
 * 
 */
class Link_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('*');
		$this->db->from('link');
		$this->db->order_by('id_link','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_link){
		$this->db->select('*');
		$this->db->from('link');
		$this->db->where('id_link',$id_link);
		$this->db->order_by('id_link','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data){
		$this->db->insert('link', $data);
	}

	public function edit($data){
		$this->db->where('id_link', $data['id_link']);
		$this->db->update('link', $data);
	}

	public function delete($data){
		$this->db->where('id_link', $data['id_link']);
		$this->db->delete('link', $data);
	}
}