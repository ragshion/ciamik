<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('backend/login');
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array (
			'username' => $username,
			'password' => sha1($password)
		);

		$cek = $this->db->where($where)->get('user')->row_array();
		if($cek){
			$data_session = array (
				'username' => $username,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('');
		}else{
			$this->session->set_flashdata("berhasil","alert('username atau password salah!');");
			redirect('login');
		}
	}

	function logout(){
		
		$this->session->sess_destroy();
		redirect('');
	}
}
