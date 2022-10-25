<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(['UserModel']);

		if(!$this->session->userdata('isLogin')){
			$this->session->set_flashdata(["msg" => [1, "Sesi anda sudah habis."]]);
			redirect(site_url("auth/login"));
			die();
		}
	}

	function index()
	{
		$data = [
			'title' => "Dashboard",

		];
		$this->load->view('user/index', $data);
	}

	public function akun()
	{
		$user = $this->UserModel->find($this->session->userdata('user')['user_id']);
		$data = [
			'title' => "Pengaturan Akun",
			'user' => $user[0],
		];
		$this->load->view('user/akun', $data);
	}

	// Kirim ulang kode verifikasi
	public function verifEmail($email = null)
	{
		if($email == null){
			$user = $this->UserModel->find($this->session->userdata('user')['user_id']);
			$email = $user[0]->user_email;
		}
		// Ahen, tolong buat kode kirim verifikasinya ke $email;

		// pesan respon[[sementara selalu true]]
		$msg  = [
			'status' => true,
			'pesan' => "Email verifikasi berhasil dikirim"
		];
		echo json_encode($msg);

	}

	function action($param = 'simpan_perubahan')
  {
    $post = $this->input->post(null, true);

    if($param == "simpan_perubahan"){
			$id = $post['user_id'] = $this->session->userdata('user')['user_id'];
			$post['user_emailValid'] = $this->session->userdata('user')['user_emailValid'];
			$password = $post['user_password'];
			$password2 = $post['user_password2'];

			unset($post['user_password2']);
			unset($post['user_password']);

			if($password != null || $password != ''){
				if($password != $password2){
					$msg = [
						'status' => false, 
						'errors' => [
							'user_password2' => "Konfirmasi password belum tepat."
						],
					];
				}else{
					$post['user_password'] = password_hash($password, PASSWORD_DEFAULT);
				}
			}

			if($this->UserModel->update($post, $id)){
				$ses = [
					'user' => $post
				];
				$this->session->set_userdata($ses);
				$msg = [
					'status' => true, 
					'url' => site_url("user/akun"),
				];
				$this->session->set_flashdata('msg', [1, 'Perubahan berhasil disimpan.']);
			} else {
				$msg = [
					'status' => false, 
					'errors' => $this->UserModel->getError()['message'],
				];
			}
		}

		echo json_encode($msg);
	}

}