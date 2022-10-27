<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaduanModel extends CI_Model {

  private $msg;
  function __construct()
  {
    parent::__construct();
  }

  public function find($id = null)
  {
    if($id == null){
      $query = "SELECT * FROM wbs_pengaduan";
    } else {
      $query = "SELECT * FROM wbs_pengaduan WHERE pengaduan_id = '$id'";
    }
    $data = $this->db->query($query);
    if($data){
      return $data->result();
    } else {
      return null;
    }
  }


    function get_all($where = null, $limit = null, $offset = null){

        if(isset($_GET['pencarian'])){
            $where = "pengaduan_kode LIKE '%$_GET[pencarian]%' ";
        }

        // print_r($limit."-".$offset); die();

        $string = " 
            SELECT *
            FROM wbs_pengaduan
            WHERE ".@$where."
            ORDER BY pengaduan_kode ASC
            offset $offset rows 
            fetch next $limit rows only
        ";

        // echo $string;
        $record = $this->db->query($string)->result();
        $count_row = $this->db->query("
            SELECT COUNT(*) as total 
            FROM wbs_pengaduan  
            WHERE pengaduan_kode LIKE '%".@$_GET[pencarian]."%'
        ")->row()->total;
        return ['record'=>$record, 'count_row'=>$count_row];
    }

  public function findByUser($id)
  {
    $query = "SELECT * FROM wbs_pengaduan WHERE pengaduan_user_id = '$id'";
    $data = $this->db->query($query);
    if($data){
      return $data->result();
    } else {
      return null;
    }
  }

  public function findByKode($kode)
  {
    $query = "SELECT * FROM wbs_pengaduan WHERE pengaduan_kode = '$kode'";
    $data = $this->db->query($query);
    if($data){
      return $data->result_array();
    } else {
      return null;
    }
  }

  public function findStatistik($status, $jenis)
  {
    $query = "SELECT * FROM wbs_pengaduan WHERE pengaduan_status = '$status' AND pengaduan_jenis = '$jenis'";
    $data = $this->db->query($query);
    if($data){
      return count($data->result_array());
    } else {
      return 0;
    }
  }

  public function insert($post)
  {
    return $this->db->insert('wbs_pengaduan', $post);
  }

  public function getError()
  {
    return $this->db->error();
  }

  public function getMsg()
  {
    return $this->msg;
  }

  public function gentoken()
  {
    do{
      $rand = $this->generateRandomString(6);
    }while($this->isKodeExists($rand));
    return $rand;
  }

  // cek kode sudah terdaftar apa belum
  // return "true" jika sudah terdaftar
  function isKodeExists($kode)
  {
    $rec = $this->db->query("SELECT * FROM wbs_pengaduan WHERE pengaduan_kode = '$kode'");
    $record = $rec->result_array();
    if(count($record) == 0){
      return false;
    } else {
      return true;
    }
  }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    function change_status($data, $where){
        $this->db->trans_begin();
            $this->db->set($data);
            $this->db->where($where);
            $this->db->update('wbs_pengaduan');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return FALSE;
        }else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return TRUE;
        }
    }

}