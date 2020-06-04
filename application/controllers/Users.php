<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	var $API ="";

	//konstruktor (statement yang selalu dipanggil pada setiap function)
	function __construct() {
		parent::__construct();
		$this->API="http://192.168.63.92:8081/laundry-enterprise/rest/index.php";

		//load model Users_m
		$this->load->model('m_users');
		// $this->load->library('curl');

		//load helper form 
		$this->load->helper('form');	
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
	}

	/* index (fungsi yang akan berjalan jika tidak ada fungsi yang dipangggil)
	jika url = ".[]/users" maka fungsi index yang dijalankan */ 
	public function index()
	{
		$data['users']=$this->m_users->getDataUsers();
		$data['page']='User.php';
		$this->load->view('Admin/menu',$data);
	}


	public function tambah()
	{
		$data['message'] = "";
		$data['level'] = $this->db->get('level')->result();
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('firstname','First Name','required|alpha');
		$this->form_validation->set_rules('lastname','Last Name','required|alpha');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','Password','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'users/tambah.php'
			$this->load->view('admin/users/tambah.php',$data); 
		}
		// jika kita sudah melalukan submit
		else{
			$upload = $this->m_users->upload();
			if($upload['result'] == "success"){ // Jika proses upload sukses
				//memanggil fungsi insertData pada model
				$this->m_users->insertData($upload['file']['file_name']);
				//redirect / pergi ke halaman 'users'
				redirect('Users');
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
				$this->load->view('admin/users/tambah.php',$data); 
			}
		}
	}

	/*$id adalah parameter
	contoh penggunakan users/ubah/1 
	*/ 
	public function ubah($id)
	{
		$data['message'] = "";
		$data['level'] = $this->db->get('level')->result();
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('firstname','First Name','required');
		$this->form_validation->set_rules('lastname','Last Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','Password','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		

		//memberikan data berisi data yang sesuai dengan $id
		$data['getData'] = $this->m_users->getDataWhereId($id)[0];

		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'users/ubah.php'
			$this->load->view('admin/users/ubah',$data);
		}
		// jika kita sudah melalukan submit
		else{
			if ($_FILES['image']['name'] == "")
			{
				//memanggil fungsi insertData pada model
				$this->m_users->updateData($id);
			//redirect / pergi ke halaman 'users'
				redirect('Users');
			}
			else
			{
				$upload = $this->m_users->upload();
				if($upload['result'] == "success"){ 
					$this->curl->simple_put($this->API.'/Users', $set, array(CURLOPT_BUFFERSIZE => 10));
					redirect('Users');
				}else{ 
					$data['error_upload'] = $upload['error'];
					$this->load->view('admin/users/ubah',$data);
				}
			}
		}
	}

	/*$id adalah parameter
	contoh penggunakan users/hapus/1 
	*/ 
	public function hapus($id)
	{
		//memanggil fungsi hapusData pada model
		$this->curl->simple_delete($this->API.'/Users', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
		redirect('Users','refresh');
	}
}
