<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  private $isSuperAdmin = false;

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel']);
		$this->load->model('AdminModel', 'admin');

    if($this->session->userdata('role_admin') == 1){
      $this->isSuperAdmin = true;
    }

    if(!$this->session->userdata('isAdmin')){
      $this->session->set_flashdata(["msg" => [1, "Sesi anda sudah habis."]]);
      redirect(site_url("auth/admin"));
      die();
		}
	}


  	function dashboard(){
	    $data = [
	      "title" => "Dashboard"
	    ];
	    $this->load->view("admin/dashboard");
  	}

  function hapus($id)
  {
    if(!$this->isSuperAdmin){
      $this->session->set_flashdata('msg', [0, 'Anda tidak memiliki akses ke halaman ini']);
      redirect(site_url('admin/dashboard'));
      die();
    }

    $data = $this->admin->find($id);
    if($data[0]->role == 1){
      $this->session->set_flashdata('user_msg', [0, 'Tidak dapat menghapus super admin']);
      redirect(site_url('admin/akun'));
      die();
    }
    $del = $this->admin->delete($id);
    $this->session->set_flashdata('user_msg', [1, 'Berhasil menghapus data']);
    redirect(site_url('admin/akun'));
  }

  function tambah()
  {
    if(!$this->isSuperAdmin){
      $this->session->set_flashdata('msg', [0, 'Anda tidak memiliki akses ke halaman ini']);
      redirect(site_url('admin/dashboard'));
      die();
    }

    $post = $this->input->post(null, true);

    if($post['password'] != $post['password2']){
      $this->session->set_flashdata('user_msg', [0, 'Konfirmasi password belum cocok']);
      redirect(site_url('admin/akun'));
      die();
    }

    if(!$this->admin->validUsername($post['username'])){
      $this->session->set_flashdata('user_msg', [0, 'Username sudah digunakan']);
      redirect(site_url('admin/akun'));
      die();
    }

    $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
    $post['id'] = $this->db->query("SELECT NEWID() as id")->row()->id;
    unset($post['password2']);

    $this->admin->insert($post);
    $this->session->set_flashdata('user_msg', [1, 'Berhasil menambah data']);
    redirect(site_url('admin/akun'));
  }

  function edit()
  {
    if(!$this->isSuperAdmin){
      $this->session->set_flashdata('msg', [0, 'Anda tidak memiliki akses ke halaman ini']);
      redirect(site_url('admin/dashboard'));
      die();
    }

    $post = $this->input->post(null, true);

    if($post['password'] != ''){
      if($post['password'] != $post['password2']){
        $this->session->set_flashdata('user_msg', [0, 'Konfirmasi password belum cocok']);
        redirect(site_url('admin/akun'));
        die();
      } else {
        $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        unset($post['password2']);
      }
    } else {
      unset($post['password']);
      unset($post['password2']);
    }

    if(!$this->admin->validUsername($post['username'], $post['username2'])){
      $this->session->set_flashdata('user_msg', [0, 'Username sudah digunakan']);
      redirect(site_url('admin/akun'));
      die();
    }

    $id = $post['id'];
    unset($post['id']);
    unset($post['username2']);

    $this->admin->update($post, $id);
    $this->session->set_flashdata('user_msg', [1, 'Berhasil mengubah data']);
    redirect(site_url('admin/akun'));
  }

  function getById($id)
  {
    $data = $this->admin->find($id);
    echo json_encode($data[0]);
  }


  function akun()
  {
    if(!$this->isSuperAdmin){
      $this->session->set_flashdata('msg', [0, 'Anda tidak memiliki akses ke halaman ini']);
      redirect(site_url('admin/dashboard'));
      die();
    }

    $admins = $this->admin->find();
		$data = [
			'title' => "Akun",
			'record' => $admins,
		];
		$this->load->view('admin/akun', $data);
  }
}