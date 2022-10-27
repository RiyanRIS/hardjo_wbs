<?php

function is_active($arr, $butuhnya){

  if(is_array($arr)){
    if(in_array($butuhnya, $arr)){
      echo "active";
    }
  } else {
    if($arr == $butuhnya){
      echo "active";
    }
  }
}

function jenis_gen($kode)
{
  switch($kode){
    case 1:
      return "Bantuan Masyrakat";
    case 2:
      return "Pemungutan Liar";
    case 3:
      return "Petugas Tidak Ramah";
    case 4:
      return "Tindakan KKN";
    case 5:
      return "Infrastruktur Tidak Baik";
    case 6:
      return "Layanan Kesehatan";
    default:
      return "Error, value not found";
  }
}

function status_gen($kode)
{
  switch($kode){
    case 0:
      return '<span class="badge badge-primary">Diterima</span>';
    case 1:
      return '<span class="badge badge-warning">Diproses</span>';
    case 2:
      return '<span class="badge badge-success">Selesai</span>';
    case 9:
      return '<span class="badge badge-danger">Ditolak</span>';
  }
}

function tanggal_jam_indo($tanggal_sblm){
  $tanggal = date("Y-m-j", strtotime($tanggal_sblm));

  $bulan = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0] . ', ' . date("G:i:s", strtotime($tanggal_sblm));
}

function indo_date($date){
  $d = substr($date,8,2);
  $m = substr($date,5,2);
  $y = substr($date,0,4);
  return $d.'-'.$m.'-'.$y;
}