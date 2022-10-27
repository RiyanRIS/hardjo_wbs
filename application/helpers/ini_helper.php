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

function pagination($jml_halaman, $hal_aktif, $link_paginaton){
    //PREV BUTTON
   
      if ((int)$hal_aktif == "1") {
        $html = '<li class="page-item"><a disabled class="page-link" data-abc="true"><i class="fa fa-angle-left"></i></a></li>';
      }else{
        $html = '<li class="page-item"><a class="page-link" href="'.$link_paginaton.'&page='. ($hal_aktif-1).'" data-abc="true"><i class="fa fa-angle-left"></i></a></li>';
      }
       
      //PAGE PREV 
      if ((int)$hal_aktif > 1){
        for ($i=(int)$hal_aktif-2; $i < (int)$hal_aktif; $i++) { 
          if ((int)$i < (int)$hal_aktif && (int)$i > 0) {
          $html = @$html.'<li class="page-item"><a class="page-link" href="'.$link_paginaton.'&page='.$i.'" data-abc="true">'.$i.'</a></li>';
          }
        }
      } 
       
      //PAGE ACTIVE
      $html = @$html.'<li class="page-item active"><a href="javascript:void(0)" disabled class="page-link">'.$hal_aktif.'</a></li>';

      //PAGE NEXT    
      if ((int)$hal_aktif < (int)$jml_halaman){
        for ($i= (int)$hal_aktif+1; $i < (int)$hal_aktif+3; $i++) { 
          if ($i > (int)$hal_aktif && $i <= (int)$jml_halaman) {
            $html = @$html.'<li class="page-item"><a class="page-link" href="'.$link_paginaton.'&page='.$i.'" data-abc="true">'.$i.'</a></li>';
          }
        }
      } 
      
      //NEXT BUTTON
      if ( (int)$hal_aktif == (int)$jml_halaman){
        $html = @$html.'<li class="page-item"><a disabled class="page-link" data-abc="true"><i class="fa fa-angle-right"></i></a></li>';
      }else{
        $html = @$html.'<li class="page-item"><a class="page-link" href="'.$link_paginaton.'&page='.($hal_aktif+1).'" data-abc="true"><i class="fa fa-angle-right"></i></a></li>';
      }

      return $html;
    }