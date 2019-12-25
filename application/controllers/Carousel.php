<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->order_by('tgl_input','desc')->get('carousel')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/carousel',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$data['tgl_input'] = date('Y-m-d H:i:s');

		$config['upload_path'] = './assets/images/carousel/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = uniqid().'.jpg';

		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
			// $this->load->view('v_upload', $error);
		}else{
			$data['foto'] = $config['file_name'];
			$this->session->set_flashdata('alert','<div class="alert alert-info alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data carousel berhasil disimpan.</div>');
			$this->db->insert('carousel',$data);
			redirect('carousel');
		}
	}

	function hapus($id){
		$data = $this->db->where('id',$id)->get('carousel')->row_array();
		$this->db->where('id',$id)->delete('carousel');
		unlink('./assets/images/carousel/'.$data['foto']);
		redirect('carousel');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('carousel')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$data['id'] = $this->input->post('xid');
		unset($data['xid']);

		if ($_FILES['foto']['size'] == 0 && $_FILES['foto']['error'] == 0) {
			// echo 'kosong';
		}else{
			// echo 'ora koosng';

			$config['upload_path'] = './assets/images/carousel/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = uniqid().'.jpg';

			$this->load->library('upload', $config);
	 
			if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				// $this->load->view('v_upload', $error);
			}else{
				$data['foto'] = $config['file_name'];
				$u = $this->db->where('id',$data['id'])->get('carousel')->row_array();
				unlink('./assets/images/carousel/'.$u['foto']);	
			}
		}

		$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data carousel berhasil diperbarui.</div>');

		$this->db->where('id',$data['id'])->update('carousel',$data);
		redirect('carousel');
	}

	function desa(){
		$data = $this->db->where('id_kecamatan',$this->input->post('id'))->get('desa')->result_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}
