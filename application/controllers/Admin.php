<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel']);
    if(!$this->session->userdata('isAdmin')){
			$this->session->set_flashdata(["msg" => [1, "Sesi anda sudah habis."]]);
			redirect(site_url("auth/admin"));
			die();
		}
	}

  function index()
  {
    $data = [
      "title" => "Dashboard"
    ];
    $this->load->view("admin/index");
  }
}