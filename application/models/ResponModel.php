<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResponModel extends CI_Model {

  private $msg;
  function __construct()
  {
    parent::__construct();
  }

  public function find($id = null)
  {
    if($id == null){
      $query = "SELECT * FROM wbs_respon";
    } else {
      $query = "SELECT * FROM wbs_respon WHERE respon_id = '$id'";
    }
    $data = $this->db->query($query);
    if($data){
      return $data->result();
    } else {
      return null;
    }
  }

  public function findByPengaduan($id)
  {
    $query = "SELECT * FROM wbs_respon WHERE respon_pengaduan_id = '$id'";
    $data = $this->db->query($query);
    if($data){
      return $data->result();
    } else {
      return null;
    }
  }

  public function insert($post)
  {
    return $this->db->insert('wbs_respon', $post);
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