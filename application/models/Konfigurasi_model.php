<?php 

/**
 * 
 */
class Konfigurasi_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function listing(){
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	public function edit($data){
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}
}