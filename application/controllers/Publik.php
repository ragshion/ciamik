<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->get('pelayanan_publik')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/publik',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		
		$this->session->set_flashdata('alert','<div class="alert alert-info alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data nomor pelayanan publik berhasil disimpan.</div>');
		$this->db->insert('pelayanan_publik',$data);
		redirect('publik');
	}

	function hapus($id){
		$this->db->where('id',$id)->delete('pelayanan_publik');
		redirect('publik');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('pelayanan_publik')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();

		$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data nomor pelayanan publik berhasil diperbarui.</div>');

		$this->db->where('id',$data['id'])->update('pelayanan_publik',$data);
		redirect('publik');
	}

	function desa(){
		$data = $this->db->where('id_kecamatan',$this->input->post('id'))->get('desa')->result_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}
