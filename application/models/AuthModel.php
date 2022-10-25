<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

  private $msg;
  function __construct()
  {
    parent::__construct();
  }

  public function insert($post)
  {
    return $this->db->insert('wbs_users', $post);
  }

  public function login($email, $password)
  {
    $query = "SELECT * FROM wbs_users WHERE user_email = '$email'";
    $recordByEmail = $this->db->query($query)->result_array();
    if(count($recordByEmail) == 0){
      $this->msg = "Kombinasi email dan password belum tepat";
      return false;
    } else {
      if(password_verify($password, $recordByEmail[0]['user_password'])){
        $set_sesion = [
          'isLogin' => true,
          'isAdmin' => false,
          'user' => $recordByEmail[0]
        ];
        $this->session->set_userdata($set_sesion);
        return true;
      } else {
        $this->msg = "password belum tepat";
        return false;
      }
    }
  }

  public function getError()
  {
    return $this->db->error();
  }

  public function getMsg()
  {
    return $this->msg;
  }

}
