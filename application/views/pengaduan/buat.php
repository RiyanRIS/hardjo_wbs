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
<li class="breadcrumb-item"><a href="<?=site_url('pengaduan')?>">Pengaduan</a></li>
<li class="breadcrumb-item active"><?= ($title ?: "Dashboard") ?></li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">

<div class="card">
  <div class="card-body">
  <form method="post" controller="<?=site_url('pengaduan')?>" action="buat" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
    <div class="form-group" id="notifikasi_pengaduan_subjek">
      <label for="pengaduan_subjek">Subjek Aduan*</label>
      <input type="text" class="form-control" value="<?=$user->pengaduan_subjek?>" id="pengaduan_subjek" name="pengaduan_subjek" placeholder="" autocomplete="off" required="true" autofocus="true">
    </div>

    <div class="form-group" id="notifikasi_pangaduan_jenis">
      <label for="pangaduan_jenis">Jenis Aduan*</label>
      <select name="pengaduan_jenis" id="pangaduan_jenis" class="form-control" required="true">
        <option value="" selected="selected">Pilih Jenis Aduan ...</option>
        <option value="1">Bantuan Masyrakat</option>
        <option value="2">Pemungutan Liar</option>
        <option value="3">petugas tidak ramah</option>
        <option value="4">Tindakan KKN</option>
        <option value="5">Infrastruktur tidak baik</option>
        <option value="6">Layanan Kesehatan</option>
      </select>
    </div>

    <div class="form-group" id="notifikasi_pengaduan_deskripsi">
      <label for="pengaduan_deskripsi">Deskripsi Aduan*</label>
      <textarea name="pengaduan_deskripsi" id="pengaduan_deskripsi" cols="10" rows="5" class="form-control" placeholder="Tulis aduan anda...."></textarea>
    </div>

    <div class="form-group" id="notifikasi_pengaduan_berkas">
      <label for="pengaduan_berkas">Lampirkan File</label>
      <input type="file" class="form-control" id="pengaduan_berkas" name="pengaduan_berkas">
    </div>

    <button type="submit" class="btn btn-primary" id="submit"> <i class="fa fa-paper-plane"></i> Kirim</button>
    </form>
  </div>
</div>

</section>

<?php $this->load->view("user/_template/foot");?>
  
</body>
</html>
