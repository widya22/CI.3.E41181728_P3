<?php 

class M_data extends CI_Model{
	function tampil_data(){
		/*
		untuk mengambil data dari database dengan parameter nama tabel yaitu user
		jadi data yang diambil dari database akan dikebalikan ke pemanggil fungsi dengan return
		*/
		return $this->db->get('user');  
	}

	//input data ke database
	function input_data($data,$table){ 
		$this->db->insert($table,$data);
	}

	//menghapus data dari database
	function hapus_data($where,$table){
		$this->db->where($where); //menyeleksi query 
		$this->db->delete($table);//untuk menghapus record
	}

	//mengedit data dari database
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

		//mengupdate data dari database
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}