<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

  private $msg;
  function __construct()
  {
    parent::__construct();
  }

  public function find($id = null)
  {
    if($id == null){
      $query = "SELECT * FROM wbs_admin";
    } else {
      $query = "SELECT * FROM wbs_admin WHERE id = '$id'";
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
    $this->db->where('id', $id);
    return $this->db->update('wbs_admin');
  }

  function insert($post)
  {
    return $this->db->insert('wbs_admin', $post);
  }

  function validUsername($username, $username_lama = false)
  {
    $data = $this->db->query("SELECT * FROM wbs_admin WHERE username = '$username'")->result_array();
    if(count($data) == 0){
      return true;
    } else {
      if($username_lama){
        if($data[0]['username'] == $username_lama){
          return true;
        }
      }
      return false;
    }
  }

  function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('wbs_admin');
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