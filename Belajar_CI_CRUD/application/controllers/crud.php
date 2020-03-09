<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data'); //untuk membuka model m_data(untuk mengkases database)
		$this->load->helper('url');

	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result(); //menampilkan data dengan function tampil_data di m_data untuk mengambil data dari database
		$this->load->view('v_tampil',$data); //kemudian dilempar/parsinke view v_tampil
	}

	function tambah(){//saat function tambah dijalankan akan dilempar ke view v_input
		$this->load->view('v_input');
	}

	function tambah_aksi(){
		$nama = $this->input->post('nama'); //untuk menangkap inputan dari nama form input 
		$alamat = $this->input->post('alamat'); //untuk menangkap inputan dari alamat form input 
		$pekerjaan = $this->input->post('pekerjaan'); //untuk menangkap inputan dari pekerjaan form input 

		//data dijadikan array
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);

		//menginputkan data ke database dengan parameter pertama berupa data yang diinputkan dijadikan array,
		//sedangkan parameter keduanya nama tabel tempat menyimpan data inputan
		$this->m_data->input_data($data,'user'); 
		redirect('crud/index'); //mengalihkan pada crud index
	}

	function hapus($id){
		$where = array('id' => $id); //$id digunakan untuk menangkap data id yang di kirim melalui url dari link hapus
		$this->m_data->hapus_data($where,'user'); //4WHERE BERISI DATA ID DAN PARAMETR KEDUA ADALAH NAMA TABEL
		redirect('crud/index');
    }
    function edit($id){ //menjadikan id menjadi array
		$where = array('id' => $id); 
		//mengambil data menurut id menggunakan function edit_data pada model m_data
        $data['user'] = $this->m_data->edit_data($where,'user')->result(); //result digunakan untuk meng-geneate hasil query menjadi array
        $this->load->view('v_edit',$data); //dilempar pada view v_edit untuk menampilkan form data yang akan diedit
	}
	//menangkap data dari form edit
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
		
		//data dijadikan array data
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
		 
		//penentu lokasi data yang diupdate
        $where = array(
            'id' => $id
        );
		//untuk menghandle update data.
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
}