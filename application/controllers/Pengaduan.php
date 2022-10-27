<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->model(['PengaduanModel']);
		if(!$this->session->userdata('isLogin')){
			$this->session->set_flashdata(["msg" => [1, "Sesi anda sudah habis."]]);
			redirect(site_url("auth/login"));
			die();
		}
	}

    function index(){
        $limit = 20;
        if(@$_GET['page'] != "" || !empty($_GET['page'])) {
            $offset = ($_GET['page'] - 1) * $limit;
            $hal_aktif = $_GET['page'];
        }else{
            $offset     = 0;
            $hal_aktif = 1;
        }

        // print_r("<pre>"); print_r($offset); die();

        $record = $this->PengaduanModel->get_all(@$where, $limit, $offset);
        $jumlah_hal = ceil($record['count_row']/$limit);
		$data = [
			'title'  => "List Pengaduan",
            "record" => $record['record'],
            "jumlah_hal" => $jumlah_hal,
            "hal_aktif" => $hal_aktif,
		];
		$this->load->view('admin/pengaduan/index', $data);
    }

  public function buat()
  {
    if(!$this->session->userdata('user')['user_emailValid']){
      $this->session->set_flashdata('msg', [0, "Status akun kamu belum aktif."]);
      redirect(site_url('user/akun'));
      die();
    } else if($this->session->userdata('user')['user_nik'] == null) { 
      $this->session->set_flashdata('msg', [0, "Silahkan lengkapi data terlebih dahulu."]);
      redirect(site_url('user/akun'));
      die();
    } else {
      $data = [
        'title' => "Buat Pengaduan"
      ];
		  $this->load->view('pengaduan/buat', $data);
    }
  }

  function action($param = 'buat')
  {
    if(!$this->session->userdata('user')['user_emailValid']){
      $this->session->set_flashdata('msg', [0, "Status akun kamu belum aktif."]);
      redirect(site_url('user/akun'));
      die();
    } else if($this->session->userdata('user')['user_nik'] == null) { 
      $this->session->set_flashdata('msg', [0, "Silahkan lengkapi data terlebih dahulu."]);
      redirect(site_url('user/akun'));
      die();
    } else {

    $post = $this->input->post(null, true);

    if($param == "buat"){
      $post['pengaduan_id'] = $this->db->query("SELECT NEWID() as id")->row()->id;
      $post['pengaduan_kode'] = "#" . time();
      $post['pengaduan_user_id'] = $this->session->userdata('user')['user_id'];
      $post['pengaduan_waktu'] = date("Y-m-d H:i:s");

      if($_FILES['pengaduan_berkas']){
        $ukuran_file = $_FILES['pengaduan_berkas']['size']; 
        if($ukuran_file <= 25000000){
          $nama_file = $_FILES['pengaduan_berkas']['name'];
          $nama = $this->session->userdata('user')['user_name'];
          $nma = str_replace(" ", "-", $nama);
          $newName = "pengaduan-".$nma."-".date('d-m-Y')."-".time().".".pathinfo($nama_file, PATHINFO_EXTENSION); 
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

      if($this->PengaduanModel->insert($post)){
        $this->session->set_flashdata('msg', [1, "Data berhasil ditambahkan"]);
        $msg = [
          'status' => true, 
          'url' => site_url("pengaduan")
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


    function change_status(){
        $post = $this->input->post(null, true);
        if(!$this->input->is_ajax_request()){
            $msg = [
                'status' => false,
                'pesan'  => 'Permintaan anda tidak dapat diprosesss',
                'url'    => base_url('pengaduan'),
            ];

            echo json_encode($msg); 
            die();
        }

        $data = [
            'pengaduan_status' => $post['val_status'],
        ];
        $query = $this->PengaduanModel->change_status($data, ['pengaduan_id'=>$post['pengaduan_id']]);
        if($query){
            $this->session->set_flashdata('success', 'Data Berhasil di Update');
            $msg = [
                'status' => true,
                'pesan'  => 'Data Berhasil di Update',
                'url'    => base_url('pengaduan'),
            ];
        }else{
            $this->session->set_flashdata('danger', 'Gagal Update, Silahkan untuk coba kembali');
            $msg = [
                'status' => false,
                'pesan'  => 'Gagal Update, Silahkan untuk coba kembali',
                'url'    => base_url('pengaduan'),
            ];
        }
        echo json_encode($msg); die(); 
        // print_r("<pre>"); print($a); die();
    }

    function detail($id_pegaduan){
        $record_head = $this->db->query("
            SELECT * 
            FROM wbs_pengaduan a
            -- JOIN wbs_respon b ON a.pengaduan_id=b.respon_pengaduan_id
            WHERE pengaduan_id = '$id_pegaduan'
            ORDER BY pengaduan_waktu_buat DESC
        ")->row();

        $record_comment = $this->db->query("
            SELECT * 
            FROM wbs_respon a
            -- JOIN wbs_respon b ON a.pengaduan_id=b.respon_pengaduan_id
            WHERE respon_pengaduan_id = '$id_pegaduan'
            ORDER BY respon_waktu ASC
        ")->result();
        
        $post= $this->input->post(null, true);
        if(isset($post['submit_comment'])){
            $id_respon = $this->db->query("SELECT NEWID() as id")->row()->id;
            $data_insert = [
                'respon_id'             => $id_respon,
                'respon_pengaduan_id'   => $id_pegaduan,
                'respon_dari'           => 1,
                'respon_komentar'       => $post['balas_comment'],
                'respon_waktu'          => date('Y-m-d H:i:s'),
            ];

            $this->db->insert('wbs_respon', $data_insert);
            redirect('pengaduan/detail/'.$id_pegaduan ,'refresh');
        }

        // print_r("<pre>"); print_r($record_comment); die();
        $data = [
            'title' => 'Detail Pengaduan',
            'record_head' => $record_head,
            'record_comment' => $record_comment,
        ];
        $this->load->view('admin/pengaduan/detail', $data);

    }

}