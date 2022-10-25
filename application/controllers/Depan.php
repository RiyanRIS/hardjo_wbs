<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// load base_url
		$this->load->helper(array('form', 'url','file','download'));
		$this->load->model('m_dashboard');
		$this->load->model('PengaduanModel', 'pengaduan');
		$this->load->library('email','upload','session','encrypt');
	}

	public function index()
	{
    $this->load->view('depan');
	}

	public function buat()
	{
    $this->load->view('buat');	
	}

	public function detail()
	{
		$pengaduan_jenis = $this->session->userdata('pengaduan')['pengaduan_jenis'];
		$pengaduan2 = [
			'pengaduan_jenis_baca' => jenis_gen($pengaduan_jenis),
		];

		$data = [
			'pengaduan2' => $pengaduan2,
			'pengaduan' => $this->session->userdata('pengaduan'),
		];
		$this->load->view('detail', $data);
	}

	public function pantau($kode = null)
	{
		$data = [];
		if($kode != null){
			$data['pengaduan'] = $this->pengaduan->findByKode($kode);
		}
		$data['kode'] = $kode;
		$this->load->view('pantau', $data);
	}

	public function statistik()
	{
		$data = [];
		
		// Diterima
		$data['rec'][0][1] = $this->pengaduan->findStatistik(0, 1);
		$data['rec'][0][2] = $this->pengaduan->findStatistik(0, 2);
		$data['rec'][0][3] = $this->pengaduan->findStatistik(0, 3);
		$data['rec'][0][4] = $this->pengaduan->findStatistik(0, 4);
		$data['rec'][0][5] = $this->pengaduan->findStatistik(0, 5);
		$data['rec'][0][6] = $this->pengaduan->findStatistik(0, 6);

		// Ditolak
		$data['rec'][9][1] = $this->pengaduan->findStatistik(9, 1);
		$data['rec'][9][2] = $this->pengaduan->findStatistik(9, 2);
		$data['rec'][9][3] = $this->pengaduan->findStatistik(9, 3);
		$data['rec'][9][4] = $this->pengaduan->findStatistik(9, 4);
		$data['rec'][9][5] = $this->pengaduan->findStatistik(9, 5);
		$data['rec'][9][6] = $this->pengaduan->findStatistik(9, 6);

		// Diproses
		$data['rec'][1][1] = $this->pengaduan->findStatistik(1, 1);
		$data['rec'][1][2] = $this->pengaduan->findStatistik(1, 2);
		$data['rec'][1][3] = $this->pengaduan->findStatistik(1, 3);
		$data['rec'][1][4] = $this->pengaduan->findStatistik(1, 4);
		$data['rec'][1][5] = $this->pengaduan->findStatistik(1, 5);
		$data['rec'][1][6] = $this->pengaduan->findStatistik(1, 6);

		// Selesai
		$data['rec'][2][1] = $this->pengaduan->findStatistik(2, 1);
		$data['rec'][2][2] = $this->pengaduan->findStatistik(2, 2);
		$data['rec'][2][3] = $this->pengaduan->findStatistik(2, 3);
		$data['rec'][2][4] = $this->pengaduan->findStatistik(2, 4);
		$data['rec'][2][5] = $this->pengaduan->findStatistik(2, 5);
		$data['rec'][2][6] = $this->pengaduan->findStatistik(2, 6);
		$this->load->view('statistik', $data);
	}

	function action($param = 'buat')
  {
    $post = $this->input->post(null, true);

    if($param == "buat"){
      $post['pengaduan_id'] = $this->db->query("SELECT NEWID() as id")->row()->id;
      $post['pengaduan_kode'] = $this->pengaduan->gentoken();
      $post['pengaduan_waktu_buat'] = date("Y-m-d H:i:s");

      if($_FILES['pengaduan_berkas']){
				for ($i=0; $i < count($_FILES['pengaduan_berkas']); $i++) {
					$ukuran_file = $_FILES['pengaduan_berkas']['size']; 
					if($ukuran_file <= 25000000){
						$nama_file = $_FILES['pengaduan_berkas']['name'];
						$newName = $post['pengaduan_kode'].".".pathinfo($nama_file, PATHINFO_EXTENSION); 
						$format = pathinfo($nama_file, PATHINFO_EXTENSION); 
						if( ($format == "jpg") or ($format == "jpeg") or ($format == "png") or ($format == "JPG") or ($format == "JPEG") or ($format == "PNG")or ($format == "doc") or ($format == "pdf") or ($format == "zip") ){
							$config['upload_path']        = './uploads/';
							$config['allowed_types']      = 'jpg|jpeg|png|JPG|JPEG|png|doc|pdf|zip';
							$config['file_name']          = $newName;
							$config['remove_spaces']      = FALSE;
							$config['overwrite']          = FALSE;
							
							$this->load->library('upload', $config);
							$this->upload->initialize($config);

							if(!$this->upload->do_upload('pengaduan_berkas'))
							{
								$error = array('error' => $this->upload->display_errors());
								print_r($error);
							} else {
								// Kondisi berhasil upload.
								$post['pengaduan_berkas'] = $newName;
							}
						} else {
							$msg = [
								'status' => false, 
								'errors' => [
									'pengaduan_berkas' => "Jenis file yang diperbolehkan adalah jpg, jpeg, png, doc, pdf ataupun zip."
								]
							];
							echo json_encode($msg); die();
						}
					} else {
						$msg = [
							'status' => false, 
							'errors' => [
								'pengaduan_berkas' => "Maksimal ukuran adalah 25Mb."
							]
						];
						echo json_encode($msg); die();
					}
				}
      }

      if($this->pengaduan->insert($post)){
        $this->session->set_flashdata('msg', [1, "Data berhasil ditambahkan"]);
        $userdata = [
					'pengaduan' => $post
				];
				$this->session->set_userdata($userdata);
        $msg = [
          'status' => true, 
          'url' => site_url("detail")
        ];
      } else {
        $msg = [
          'status' => false, 
          'errors' => [
            "pesan" => "data gagal ditambahkan"
          ]
        ];
      }
    }

    echo json_encode($msg);
  }
  
}