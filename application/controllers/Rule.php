<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Rule');
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
	}

	public function index()
	{
		$data['rule']=$this->M_Rule->getDataRule();
		$data['page']='Rule.php';
		$this->load->view('Admin/menu',$data);
	}

	public function addRule()
	{
		$data['page']='addRule.php';
		$this->load->view('Admin/menu',$data);
	}

	public function simpanRule()
	{
		
		$data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
//        jika anda mau, anda bisa mengatur tampilan pesan error dengan menambahkan element dan css nya
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('usia', 'usia', 'required');

		if($this->form_validation->run()==FALSE){
			$data['page']='addRule.php';
			$this->load->view('Admin/menu',$data);
		}else{
			$this->M_Rule->inputdata();
			$this->session->set_flashdata('success','Tambah Produk berhasil');
			redirect('Rule');
		}
	}

	//ubah atau edit dengan foto kamera
	public function ubahRule($id)
	{
		$where = array('id_rule' => $id);
		$data['rule'] = $this->M_Rule->getdataID($where,'rule')->result();
		$data['page']='editRule.php';
		$this->load->view('admin/menu',$data);
	}

	public function proses_ubah($id)
	{
			$this->M_Rule->updateRule($id);
			$this->session->set_flashdata('success','Ubah data berhasil');
				redirect('Rule','refresh');
			}			
		
	

		function hapus_Rule($id){
			$where = array('id_rule' => $id);
			$this->M_Rule->hapus($where,'rule');
			redirect('Rule','refresh');
		}
	}

	?>