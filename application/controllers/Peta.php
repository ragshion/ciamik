<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('backend/template/header');
		$this->load->view('backend/peta');
		$this->load->view('backend/template/footer');
	}

	function latlng(){
		$z = $this->db->select('*')->from('ipal')->get('')->result_array();
		foreach ($z as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();

			$data['ipal'][] = array(
				'lokasi' => $x['lokasi'],
				'kapasitas' => $x['kapasitas'],
				'latlng' => $x['latlng'],
				'luas' => $x['luas'],
				'foto' => $foto['nama_file']
			);
		}

		$z = $this->db->select('*')->from('jalan')->get('')->result_array();
		foreach ($z as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$data['jalan'][] = array(
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'latlng' => $x['latlng_awal'],
				'kondisi_baik' => $x['kondisi_baik'],
				'kondisi_rusak' => $x['kondisi_rusak'],
				'status' => $x['status'],
				'foto' => $foto['nama_file']
			);
		}

		$z = $this->db->select('*')->from('pamsimas')->get('')->result_array();
		foreach ($z as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$data['pamsimas'][] = array(
				'lokasi' => $x['lokasi'],
				'kapasitas' => $x['kapasitas'],
				'latlng' => $x['latlng'],
				'foto' => $foto['nama_file']
			);
		}

		$z = $this->db->select('*')->from('pemakaman')->get('')->result_array();
		foreach ($z as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$data['pemakaman'][] = array(
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'tarif' => $x['tarif_retribusi'],
				'latlng' => $x['latlng'],
				'foto' => $foto['nama_file']
			);
		}

		$z = $this->db->select('*')->from('pertamanan')->get('')->result_array();
		foreach ($z as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$data['pertamanan'][] = array(
				'nama_taman' => $x['nama_taman'],
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'latlng' => $x['latlng'],
				'foto' => $foto['nama_file']
			);
		}

		$z = $this->db->select('*')->from('perumahan')->get('')->result_array();
		foreach ($z as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$data['perumahan'][] = array(
				'nama_perumahan' => $x['nama_perumahan'],
				'nama_pengembang' => $x['nama_pengembang'],
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'kisaran_harga' => $x['kisaran_harga'],
				'id_type' => $x['id_type'],
				'latlng' => $x['latlng'],
				'foto' => $foto['nama_file']
			);
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}

}