<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		
		$this->load->model('M_Produk');
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
	}

	public function index()
	{
		$data['produk']=$this->M_Produk->getDataProduk();
		$data['page']='Produk.php';
		$this->load->view('Admin/menu',$data);
	}

	public function addProduk()
	{
		$data['page']='addProduk.php';
		$this->load->view('Admin/menu',$data);
	}

	public function simpanProduk()
	{
		
		$data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
//        jika anda mau, anda bisa mengatur tampilan pesan error dengan menambahkan element dan css nya
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');

		if($this->form_validation->run()==FALSE){
			$data['page']='addProduk.php';
			$this->load->view('Admin/menu',$data);
		}else{
			$upload = $this->M_Produk->upload();
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$this->M_Produk->inputdata($upload);
				$this->session->set_flashdata('success','Tambah produk berhasil');
				redirect('Produk');
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
				$this->session->set_flashdata('error',$data['message']);
				redirect('Produk');
			}

		}
	}

	//ubah atau edit dengan foto kamera
	public function ubahProduk($id){
		$where = array('id_produk' => $id);
		$data['produk'] = $this->M_Produk->getdataID($where,'produk')->result();
		$data['page']='editProduk.php';
		$this->load->view('admin/menu',$data);
	}

	public function proses_ubah($id)
	{

		$Gambar = $_FILES['image']['name'];      
		if ($Gambar != null) {
			$uploadphoto = $this->M_Produk->upload();
			if($uploadphoto['result'] == 'success'){ 
				// Jika proses uploadphoto sukses
				$this->M_Produk->updateProduk($id,$uploadphoto['file']['file_name']);
				$this->session->set_flashdata('success','Ubah data berhasil');
				redirect('Produk','refresh');
				
				}else{ // Jika proses uploadphoto gagal
					$data['message'] = $uploadphoto['error'];
					$this->session->set_flashdata('error',$data['message']);
					redirect('Produk','refresh');
				}
			}
			else{
				$this->M_Produk->updateProduk($id);
				$this->session->set_flashdata('success','Ubah data berhasil');
				redirect('Produk','refresh');
			}			
		}

		function hapus_produk($id){
			$where = array('id_produk' => $id);
			$this->M_Produk->hapus($where,'produk');
			redirect('Produk');
		}
	}

	?>