<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// load base_url
		$this->load->model(['AuthModel']);

	}

  public function login()
	{
    $this->load->view('auth/login');
	}

    public function admin(){
        $post = $this->input->post(null, true);
        if(isset($post['login'])){
            $username = $post['username'];
            $password = $post['password'];

            $anggota = $this->db->query("
                SELECT * FROM wbs_admin WHERE username = '$username'
            ")->row();
            
            if(empty($anggota)) {
                $this->session->set_flashdata('danger', 'Username/Password anda salah!!!');
                redirect(site_url('admin'),'refresh');
            }

            if(!password_verify($password, $anggota->password)) {
                $this->session->set_flashdata('danger', 'Username/Password anda salah!!!');
                redirect(site_url('admin'),'refresh');
            }

            $this->updateLastLogin($username);

            $data = [
                'id_admin'      => $anggota->id,
                'username'      => $anggota->username,
                'nama_admin'      => $anggota->nama,
                'role_admin'      => $anggota->role,
                'isLogin'       => true,
                'isAdmin'       => true,
            ];

            $this->session->set_userdata($data);
            redirect('admin/dashboard','refresh');
            die();
        }
        // die('a');
        $this->load->view('auth/admin');

	}

  function updateLastLogin($username)
  {
    $post = [
      'lastlogin' => date("Y-m-d H:i:s"),
    ];
    return $this->AuthModel->update_last_login($post, $username);
  }

    public function registrasi()
	   {
            $this->load->view('auth/registrasi');
	   }

  public function logout()
  {
    $set_sesion = [
      'isLogin' => false,
      'isAdmin' => false,
    ];
    $this->session->set_userdata($set_sesion);
    $this->session->set_flashdata(['msg' => [1, "Proses logout berhasil"]]);
    redirect(site_url('auth/admin'), 'refresh');
  }

  function action($param = 'login')
  {
    $post = $this->input->post(null, true);

    if($param == "login"){
      if($this->AuthModel->login($post['email'], $post['password'])){
			  $this->session->set_flashdata('msg', [1, 'Proses masuk berhasil.']);
        $msg = [
          'status' => true, 
          'url' => site_url('user'),
        ];
      } else {
        $msg = [
          'status' => false, 
          'errors' => array(
            'password' => $this->AuthModel->getMsg()
          ),
        ];
      }
    } else if($param == "register"){
      if($post['user_password'] != $post['password2']){
        $msg = [
          'status' => false, 
          'errors' => array(
            'password2' => 'Konfirmasi password belum tepat'
          ),
        ];
      } else {
        $post['id'] = $this->db->query("SELECT NEWID() as id")->row()->id;
        $post['user_password'] = password_hash($post['user_password'], PASSWORD_DEFAULT);
        unset($post['password2']);
        if($this->AuthModel->insert($post)){
          // Ahen, tolong buat kode kirim verifikasinya ke $post['user_email'];

          $msg = [
            'status' => true, 
            'url' => site_url("login"),
          ];
					$this->session->set_flashdata('success', 'Pendaftaran berhasil, silahkan masuk untuk melanjutkan.');
        } else {
          $msg = [
            'status' => false, 
            'errors' => $this->AuthModel->getError()['message'],
          ];
        }
      }
    } else {
      $msg = [
        'status' => false, 
        'errors' => 'Parameter tidak valid',
      ];
    }

    echo json_encode($msg);
  }

  function logout_admin(){
    
  }

}