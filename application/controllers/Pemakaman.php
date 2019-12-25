<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaman extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = array();
		$r = $this->db->order_by('tgl_input','desc')->get('pemakaman')->result_array();
		foreach ($r as $x) {
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();

			$data['data'][] = array(
				'nama_pemakaman' => $x['nama_pemakaman'],
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'tarif_retribusi' => 'Rp.'.str_replace(",", ".", number_format($x['tarif_retribusi'])),
				'latlng' => $x['latlng'],
				'id' => $x['id'],
				'foto' => $foto['nama_file'],
				'tgl_input' => $x['tgl_input']
			);
		}
		$this->load->view('backend/template/header');
		$this->load->view('backend/pemakaman',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$data['id'] = uniqid();
		$data['tgl_input'] = date('Y-m-d H:i:s');

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
                		'tabel' => 'pemakaman'
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
            unset($data['latitude']);
            unset($data['longitude']);

            $this->db->insert('pemakaman',$data);

            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data Pemakaman berhasil disimpan.</div>');

            // echo 'berhasil';

            redirect('pemakaman');
        }else{
        	echo 'nofile';
        }
	}

	function hapus($id){
		$data = $this->db->where('id_fk',$id)->get('files')->result_array();
		foreach ($data as $d) {
			unlink('./uploads/'.$d['nama_file']);
		}
		$this->db->where('id',$id)->delete('pemakaman');
		$this->db->where('id_fk',$id)->delete('files');
		redirect('pemakaman');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('pemakaman')->row_array();
		$kec = $this->db->where('id_desa',$data['id_desa'])->get('desa')->row_array();
		$r = explode(';', $data['latlng']);
		unset($data['latlng']);
		$data['latitude'] = $r[0];
		$data['longitude'] = $r[1];
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
                		'tabel' => 'pemakaman'
                	);

                	$this->db->insert('files',$filedata);
                	echo 'berhasil';

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

		}

		$data['latlng'] = $data['latitude'].';'.$data['longitude'];
        unset($data['latitude']);
        unset($data['longitude']);

        $this->db->where('id',$data['id'])->update('pemakaman',$data);

        $this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data Pemakaman berhasil diperbarui.</div>');

        redirect('pemakaman');

	}

}
