<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perumahan extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	function changeha(){
		$data = $this->db->get('perumahan')->result_array();
		foreach ($data as $d) {
			if (strpos($d['luas'], ",")) {
				$luas = str_replace(",", ".", $d['luas']);
			}else{
				$luas = $d['luas'];
			}
			$x = array(
				'luas' => $luas
			);

			$this->db->where('id',$d['id'])->update('perumahan',$x);
		}
	}

	public function index(){
		$data['data'] = array();
		$r = $this->db->order_by('tgl_input','desc')->get('perumahan')->result_array();
		foreach ($r as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$type = '';
			$tipe = explode(";", $x['id_type']);

			for ($i=0; $i < count($tipe); $i++) { 
				$type = $type.'Tipe '.$tipe[$i].'<br/>';
			}

			if (strpos($x['kisaran_harga'], "-")) {
				$zxc = explode("-", $x['kisaran_harga']);
				$kisaran_harga = 'Rp.'.str_replace(",", ".", number_format($zxc[0])).' - '.' Rp.'.str_replace(",", ".", number_format($zxc[1]));
			}else{
				$kisaran_harga = '0';
			}

			if (strpos($x['luas'], ".")) {
				$luas = (float)$x['luas']*10000;
			}else{
				$luas = $x['luas'];
			}

			$data['data'][] = array(
				'nama_perumahan' => $x['nama_perumahan'],
				'nama_pengembang' => $x['nama_pengembang'],
				'lokasi' => $x['lokasi'],
				'luas' => $luas,
				// 'luas' => $x['luas'],
				'id_type' => $type,
				'kisaran_harga' => $kisaran_harga,
				'latlng' => $x['latlng'],
				'id' => $x['id'],
				'foto' => $foto['nama_file'],
				'tgl_input' => $x['tgl_input'],
				'penanggung_jawab' => $x['penanggung_jawab'],
				'tahun' => $x['tahun'],
				'jumlah' => $x['jumlah']
			);
		}
		$this->load->view('backend/template/header');
		$this->load->view('backend/perumahan',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$data['id'] = uniqid();
		$data['tgl_input'] = date('Y-m-d H:i:s');

		$tipe = '';
		foreach ($data['tipe'] as $key) {
			$tipe = $tipe.';'.$key;
		}

		$data['id_type'] = ltrim($tipe, ';');

		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|PNG';
                // $config['allowed_types'] = '*';
                // $config['file_name'] = strtotime(date('Y-m-d h:i:s')).'-'.$data['nik'].'-'.$x.'.'.$ext;
				
				$config['file_name'] = $data['id'].$x.'.jpg';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('userFile')){
                	$filedata = array(
                		'nama_file' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s'),
                		'id_fk' => $data['id'],
                		'tabel' => 'perumahan'
                	);

                	$this->db->insert('files',$filedata);
                	echo 'berhasil';

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

            $data['latlng'] = $data['latitude'].';'.$data['longitude'];
            $data['username'] = 'admin';
            $data['kisaran_harga'] = $data['mulai_dari'].'-'.$data['sampai_dengan'];
            unset($data['latitude']);
            unset($data['longitude']);
            unset($data['mulai_dari']);
            unset($data['sampai_dengan']);
            unset($data['tipe']);

            $this->db->insert('perumahan',$data);

            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data Perumahan berhasil disimpan.</div>');

            // echo 'berhasil';

            redirect('perumahan');
        }else{
        	echo 'nofile';
        }
	}

	function hapus($id){
		$data = $this->db->where('id_fk',$id)->get('files')->result_array();
		foreach ($data as $d) {
			unlink('./uploads/'.$d['nama_file']);
		}
		$this->db->where('id',$id)->delete('perumahan');
		$this->db->where('id_fk',$id)->delete('files');
		redirect('perumahan');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('perumahan')->row_array();
		$kec = $this->db->where('id_desa',$data['id_desa'])->get('desa')->row_array();
		$r = explode(';', $data['latlng']);
		unset($data['latlng']);
		$data['latitude'] = $r[0];
		$data['longitude'] = $r[1];
		$x = explode("-", $data['kisaran_harga']);
		$data['mulai_dari'] = $x[0];
		$data['sampai_dengan'] = $x[1];
		$data['kecamatan'] = $kec['id_kecamatan'];
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$data['id'] = $this->input->post('xid');
		unset($data['xid']);

		if ($_FILES['userFiles']['name'][0] == "") {
			// echo 'kosong';
		}else{
			// echo 'ora koosng';
			$del = $this->db->where('id_fk',$data['id'])->get('files')->result_array();
			foreach ($del as $d) {
				unlink('./uploads/'.$d['nama_file']);
			}
			$this->db->where('id_fk',$id)->delete('files');

			$filesCount = count($_FILES['userFiles']['name']);

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|PNG';
                // $config['allowed_types'] = '*';
                // $config['file_name'] = strtotime(date('Y-m-d h:i:s')).'-'.$data['nik'].'-'.$x.'.'.$ext;
				
				$config['file_name'] = $data['id'].$x.'.jpg';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('userFile')){
                	$filedata = array(
                		'nama_file' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s'),
                		'id_fk' => $data['id'],
                		'tabel' => 'perumahan'
                	);

                	$this->db->insert('files',$filedata);
                	echo 'berhasil';

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

		}

		$tipe = '';
		foreach ($data['tipe'] as $key) {
			$tipe = $tipe.';'.$key;
		}

		$data['id_type'] = ltrim($tipe, ';');

		$data['latlng'] = $data['latitude'].';'.$data['longitude'];
        $data['kisaran_harga'] = $data['mulai_dari'].'-'.$data['sampai_dengan'];
        unset($data['latitude']);
        unset($data['longitude']);
        unset($data['mulai_dari']);
        unset($data['sampai_dengan']);
        unset($data['tipe']);

        $this->db->where('id',$data['id'])->update('perumahan',$data);

        $this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data Perumahan berhasil diperbarui.</div>');

        redirect('perumahan');

	}

}
