<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

  private $msg;
  function __construct()
  {
    parent::__construct();
  }

  public function find($id = null)
  {
    if($id == null){
      $query = "SELECT * FROM wbs_users";
    } else {
      $query = "SELECT * FROM wbs_users WHERE user_id = '$id'";
    }
    $data = $this->db->query($query);
    if($data){
      return $data->result();
    } else {
      return null;
    }
  }

  function update($data, $id){
    $this->db->set($data);
    $this->db->where('user_id', $id);
    return $this->db->update('wbs_users');
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