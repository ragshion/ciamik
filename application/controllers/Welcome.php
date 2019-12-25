<?php

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('welcome_message');
	}

	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->db->where('username',$username)->where('password',md5($password))->get('user')->row_array();

		if($data){
			$resp = array(
				'status' => 'berhasil',
				'username' => $data['username'],
				'respon' => 'Berhasil Login'
			);
		}else{
			$resp = array(
				'status' => 'gagal',
				'respon' => 'username atau password salah'
			);
		}

		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	function load_kecamatan(){
		$resp = $this->db->order_by('nama_kecamatan','asc')->get('kecamatan')->result_array();
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	function load_type(){
		$resp = $this->db->get('type_perumahan')->result_array();
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	function load_desa(){
		$id_kecamatan = $this->db->where('nama_kecamatan', $this->input->post('kecamatan'))->get('kecamatan')->row_array();
		$resp = $this->db->where('id_kecamatan', $id_kecamatan['id_kecamatan'])->order_by('nama_desa','asc')->get('desa')->result_array();
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	function upload(){
		$target_dir = "uploads/tmp/";  
		$target_file_name = $target_dir .$this->input->get('nama_file').'.jpg';  
		$response = array();
		
		if (isset($_FILES["file"]))   
		{  
		   if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)){  
		    $success = true;  
		    $message = "Successfully Uploaded";

		    $resized_file = 'uploads/'.$this->input->get('nama_file').'.jpg';
		    smart_resize_image($target_file_name , null, 512 , 288 , true , $resized_file , true , false ,100);
		     
		    $data['id_fk'] = $this->input->get('id_fk');
		    $data['nama_file'] = $this->input->get('nama_file').'.jpg';
		    $data['tabel'] = $this->input->get('tabel');
		    $data['tgl_input'] = date('Y-m-d H:i:s');

		    $this->db->insert('files',$data);

		   }else{  
		    $success = false;  
		    $message = "Error while uploading";  
		   }  
		}  
		else   
		{  
		      $success = false;  
		      $message = "Required Field Missing";  
		}  
		$response["success"] = $success;  
		$response["message"] = $message;

		echo json_encode($response);  
	}

	function simpan(){
		$data = $this->input->post();
		$table = $data['tabel'];
		$data['username'] = 'admin';
		$id_kecamatan = $this->db->where('nama_kecamatan', $data['nama_kecamatan'])->get('kecamatan')->row_array();
		$id_desa = $this->db->where('id_kecamatan', $id_kecamatan['id_kecamatan'])->where('nama_desa',$data['nama_desa'])->get('desa')->row_array();
		$data['id_desa'] = $id_desa['id_desa'];

		unset($data['nama_kecamatan']);
		unset($data['nama_desa']);
		unset($data['tabel']);
		$data['tgl_input'] = date('Y-m-d H:i:s');

		$this->db->insert($table,$data);

		$resp = array(
			'respon' => 'Data Berhasil Disimpan'
		);
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	function hapus(){
		$id = $this->input->get('id');
		$tabel = $this->input->get('tabel');
		$files = $this->db->where('id_fk',$id)->get('files')->result_array();
		$this->db->where('id',$id)->delete($tabel);
		foreach ($files as $f) {
			unlink("uploads"."/".$f['nama_file']);
		}
		$this->db->where('id_fk',$id)->delete('files');
		$resp = array(
			'status' => 'berhasil'
		);
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	function detail(){
		$id = $this->input->get('id');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$tabel = $this->input->get('tabel');

		if ($tabel == 'ipal' | $tabel == 'pamsimas') {
			$data = $this->db->select('*')
				->from($tabel)
				->join('desa',$tabel.'.id_desa=desa.id_desa')
				->join('kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan')
				->where('id',$id)
				->get('')->row_array();
		}else{
			$data = $this->db->where('id',$id)->get($tabel)->row_array();
		}
		if ($tabel=='jalan') {
			$location = explode(";", $data['latlng_awal']);
			$jarak = distance($lat,$lng,$location[0],$location[1]);
			$data['jarak'] = number_format((float)$jarak, 2, '.', '')." km";
			$data['latlng'] = str_replace(";", ",", $data['latlng_awal']);
		}else{
			$location = explode(";", $data['latlng']);
			$jarak = distance($lat,$lng,$location[0],$location[1]);
			$data['jarak'] = number_format((float)$jarak, 2, '.', '')." km";
			$data['latlng'] = str_replace(";", ",", $data['latlng']);
		}
		

		header('Content-Type: application/json');
		$json_string = json_encode($data, JSON_PRETTY_PRINT);
		echo $json_string;
	}

	function load_files(){
		$id = $this->input->get('id');
		// $id = '6d84d65d-1ed7-413d-af5a-7395c244b07d';
		$data = $this->db->where('id_fk',$id)->order_by('nama_file','asc')->get('files')->result_array();

		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_perumahan(){
		$per = $this->db->get('perumahan')->result_array();
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			if ($foto) {
				$nama_file = $foto['nama_file'];
			}else{
				$nama_file = "";
			}

			$data[] = array(
				'id' => $p['id'],
				'nama_perumahan' => $p['nama_perumahan'],
				'nama_pengembang' => $p['nama_pengembang'],
				'lokasi' => $p['lokasi'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $nama_file,
				'tgl_input' => $p['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_perumahan(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('perumahan')
			->join('desa','perumahan.id_desa=desa.id_desa','left')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan','leftpu')
			->like('nama_perumahan',$key)
			// ->where("CONCAT(nama_perumahan,' ',lokasi,' ',luas,' ',nama_pengembang,' ',id_type,' ',nama_desa,' ',nama_kecamatan,' ',kisaran_harga) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'nama_perumahan' => $p['nama_perumahan'],
				'nama_pengembang' => $p['nama_pengembang'],
				'lokasi' => $p['lokasi'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_pemakaman(){
		$per = $this->db->get('pemakaman')->result_array();
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'nama_pemakaman' => $p['nama_pemakaman'],
				'tarif_retribusi' => $p['tarif_retribusi'],
				'lokasi' => $p['lokasi'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_pemakaman(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('pemakaman')
			->join('desa','pemakaman.id_desa=desa.id_desa')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan')
			->where("CONCAT(nama_pemakaman,' ',lokasi,' ',luas,' ',tarif_retribusi,' ',nama_desa,' ',nama_kecamatan) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'nama_pemakaman' => $p['nama_pemakaman'],
				'tarif_retribusi' => $p['tarif_retribusi'],
				'lokasi' => $p['lokasi'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_ipal(){
		$per = $this->db->select('*')
			->from('ipal')
			->join('desa','ipal.id_desa=desa.id_desa')
			->join('kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan')
			->get('')->result_array();

		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'lokasi' => $p['lokasi'],
				'kapasitas' => $p['kapasitas'].' m3',
				'desa_kec' => $p['status_keldes'].' '.$p['nama_desa'].', Kec. '.$p['nama_kecamatan'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_ipal(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('ipal')
			->join('desa','ipal.id_desa=desa.id_desa')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan')
			->where("CONCAT(lokasi,' ',kapasitas,' ',nama_desa,' ',nama_kecamatan) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'lokasi' => $p['lokasi'],
				'kapasitas' => $p['kapasitas'].' m3',
				'desa_kec' => $p['status_keldes'].' '.$p['nama_desa'].', Kec. '.$p['nama_kecamatan'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_pamsimas(){
		$per = $this->db->select('*')
			->from('pamsimas')
			->join('desa','pamsimas.id_desa=desa.id_desa')
			->join('kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan')
			->get('')->result_array();

		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'lokasi' => $p['lokasi'],
				'desa_kec' => $p['status_keldes'].' '.$p['nama_desa'].', Kec. '.$p['nama_kecamatan'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_pamsimas(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('pamsimas')
			->join('desa','pamsimas.id_desa=desa.id_desa')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan')
			->where("CONCAT(lokasi,' ',nama_desa,' ',nama_kecamatan) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'lokasi' => $p['lokasi'],
				'desa_kec' => $p['status_keldes'].' '.$p['nama_desa'].', Kec. '.$p['nama_kecamatan'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_taman(){
		$per = $this->db->select('*')
			->from('pertamanan')
			->join('desa','pertamanan.id_desa=desa.id_desa')
			->join('kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan')
			->get('')->result_array();

		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'nama_taman' => $p['nama_taman'],
				'lokasi' => $p['lokasi'],
				'luas' => $p['luas'].' m2',
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_taman(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('pertamanan')
			->join('desa','pertamanan.id_desa=desa.id_desa')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan')
			->where("CONCAT(lokasi,' ',nama_desa,' ',nama_kecamatan) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'lokasi' => $p['lokasi'],
				'nama_taman' => $p['nama_taman'],
				'luas' => $p['luas'].' m2',
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'tgl_input' => $p['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_rtlh(){
		$per = $this->db->select('*')
			->from('rtlh')
			->join('desa','rtlh.id_desa=desa.id_desa')
			->join('kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan')
			->order_by('rtlh.tgl_input')
			->get('')->result_array();

		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'pemilik' => $p['pemilik'],
				'lokasi' => $p['lokasi'],
				'luas' => $p['luas'].' m2',
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'status' => $p['status'],
				'tgl_input' => $p['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_rtlh(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('rtlh')
			->join('desa','rtlh.id_desa=desa.id_desa')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan')
			->where("CONCAT(lokasi,' ',nama_desa,' ',nama_kecamatan) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $p) {
			$location = explode(";", $p['latlng']);
			$foto = $this->db->where('id_fk',$p['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'id' => $p['id'],
				'pemilik' => $p['pemilik'],
				'lokasi' => $p['lokasi'],
				'luas' => $p['luas'].' m2',
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'foto' => $foto['nama_file'],
				'status' => $p['status'],
				'tgl_input' => $p['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	function show_publik(){
		$data = $this->db->get('pelayanan_publik')->result_array();
		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function show_jalan(){
		$per = $this->db->select('*')
			->from('jalan')
			->join('desa','jalan.id_desa=desa.id_desa')
			->join('kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan')
			->order_by('jalan.tgl_input')
			->get('')->result_array();

		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');

		foreach ($per as $x) {
			$location = explode(";", $x['latlng_awal']);
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'kondisi_baik' => $x['kondisi_baik'],
				'kondisi_rusak' => $x['kondisi_rusak'],
				'status' => $x['status'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'id' => $x['id'],
				'foto' => $foto['nama_file'],
				'tgl_input' => $x['tgl_input']
			);
		}

		sort_array_by_value('jarak',$data);
		$data = array_values($data);

		$index = 0;

		if(isset($_GET['index'])){
			$index = $_GET['index'];
		}

		$end = $index + 4;

		if($index > (count($data) -1)){
			echo json_encode(array());
			exit;
		}

		if($end > (count($data) -1)){
			$end = count($data) -1;
		}

		$resp = array();
		for($i=$index;$i<=$end;$i++){
			$resp[] = $data[$i];
		}
		
		header('Content-Type: application/json');
		$json_string = json_encode($resp, JSON_PRETTY_PRINT);
		
		echo $json_string;
	}

	function search_jalan(){
		$key = $this->input->get('key');
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
		$resp = $this->db->select('*')
			->from('jalan')
			->join('desa','jalan.id_desa=desa.id_desa','left')
			->join('kecamatan','kecamatan.id_kecamatan=desa.id_kecamatan','left')
			->where("CONCAT(lokasi,' ',nama_desa,' ',nama_kecamatan) LIKE '%".$key."%'", NULL, false)
			->get()->result_array();

		$data = array();

		foreach ($resp as $x) {
			$location = explode(";", $x['latlng_awal']);
			$foto = $this->db->where('id_fk',$x['id'])->limit(1)->order_by('nama_file','asc')->get('files')->row_array();
			$jarak = distance($lat,$lng,$location[0],$location[1]);

			$data[] = array(
				'lokasi' => $x['lokasi'],
				'luas' => $x['luas'],
				'kondisi_baik' => $x['kondisi_baik'],
				'kondisi_rusak' => $x['kondisi_rusak'],
				'status' => $x['status'],
				'jarak' => number_format((float)$jarak, 2, '.', '')." km",
				'id' => $x['id'],
				'foto' => $foto['nama_file'],
				'tgl_input' => $x['tgl_input']
			);
		}


		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

}
