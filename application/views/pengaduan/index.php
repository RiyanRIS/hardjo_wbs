<?php $this->load->view("user/_template/head");?>

<?php $this->load->view("user/_template/atas");?>
<?php $this->load->view("user/_template/nav");?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><?= ($title ?: "Dashboard") ?></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="<?=site_url('user')?>">Home</a></li>
<li class="breadcrumb-item active"><?= ($title ?: "Dashboard") ?></li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">

<div class="card">
  <div class="card-body">
    <a href="<?=site_url('pengaduan/buat')?>" class="btn btn-primary"><i class="fa fa-file"></i> Buat Pengaduan</a>
    <hr>
    <div class="table-responsive">
      <table class="table table-stripped">
        <thead>
          <tr>
            <th>KODE</th>
            <th>ADUAN</th>
            <th>STATUS</th>
          </tr>
        </thead>
        <tbody>
<?php foreach ($record as $key => $v) { 
  if($v->pengaduan_status == 0){
    $stt = "<span class='badge badge-secondary'>Belum Diverifikasi</span>";
  } else if($v->pengaduan_status == 1){
    $stt = "<span class='badge badge-success'>Terverifikasi</span>";
  }
  ?>
  <tr>
    <td><?=$v->pengaduan_kode?></td>
    <td><?=$v->pengaduan_subjek?></td>
    <td><?=$stt?></td>
  </tr>
<?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</section>

<?php $this->load->view("user/_template/foot");?>
  
</body>
</html>
