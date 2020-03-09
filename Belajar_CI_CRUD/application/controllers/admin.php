<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		//untuk mengetahui user sudah berhasil login
		if($this->session->userdata('status') != "login"){ //untuk mengecek user sudah memiliki session
			redirect(base_url("login")); //jika user tidak memiliki session maka dialihkan ke halaman login
		}
	}

	function index(){
		$this->load->view('v_admin'); //dilempar ke view v_admin
	}
}