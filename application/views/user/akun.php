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

<?php if(!$this->session->userdata('user')['user_emailValid']){ ?>
  <div class="alert alert-danger" role="alert">
    PERHATIAN, akun anda belum aktif! <br>Silahkan aktifkan akun dengan mengeklik tombol <i>Kirim ulang kode verifikasi</i> dibawah atau <a id="kirimulang" href="<?=site_url('user/verifEmail')?>">Klik Disini</a>. <br> Setelah itu cek kotak masuk di email anda untuk melanjutkan proses verifikasi akun anda.
  </div>
<?php } else if($this->session->userdata('user')['user_nik'] == null) { ?> 
  <div class="alert alert-danger" role="alert">
    PERHATIAN, lengkapi data diri anda terlebih dahulu.
  </div>
<?php } else { ?>
  <div class="alert alert-success" role="alert">
    Terimakasih, akun anda berhasil diverifikasi.
  </div>
<?php } ?>

<div class="card">
  <div class="card-body">
    <form method="post" controller="<?=site_url('user')?>" action="simpan_perubahan" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
    <div class="form-group" id="notifikasi_user_name">
      <label for="user_name">Nama Lengkap*</label>
      <input type="text" class="form-control" value="<?=$user->user_name?>" id="user_name" name="user_name" placeholder="Masukkan Nama Lengkap" autocomplete="off" required="true">
    </div>

    <div class="form-group" id="notifikasi_user_nik">
      <label for="user_nik">Nomor Induk Keluarga*</label>
      <input type="text" class="form-control" value="<?=$user->user_nik?>" id="user_nik" name="user_nik" placeholder="350401xxxxxxxxxx" autocomplete="off" required="true">
    </div>

    <div class="form-group" id="notifikasi_user_email">
      <label for="user_email">Alamat Email*</label>
      <input type="email" class="form-control" value="<?=$user->user_email?>" id="user_email" name="user_email" placeholder="my@mail.com" autocomplete="off" required="true">
      <?php if(!$this->session->userdata('user')['user_emailValid']){ ?>
        <small class="text-muted"><a id="kirimulang" href="<?=site_url('user/verifEmail')?>"><i>*Kirim ulang kode verifikasi</i></a></small>
      <?php } ?>
    </div>

    <div class="form-group" id="notifikasi_user_nohp">
      <label for="user_nohp">No. Handphone*</label>
      <input type="text" class="form-control" value="<?=$user->user_nohp?>" id="user_nohp" name="user_nohp" placeholder="08xxx" autocomplete="off" required="true">
    </div>

    <div class="form-group" id="notifikasi_user_nohp">
      <label for="user_nohp">Alamat Lengkap*</label>
      <textarea name="user_alamat" id="user_alamat" cols="10" rows="5" class="form-control" placeholder="Jl. Merpati No. 16 Rt. 2 Rw. 9 Banguntapan, Bantul, DIY"><?=$user->user_alamat?></textarea>
    </div>

    <div class="form-group" id="notifikasi_user_jk">
    <label for="user_nohp">Jenis Kelamin*</label>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="L" type="radio" id="customRadio1" name="user_jk" <?=($user->user_jk == "L" ? " checked=''" : "")?> required="">
        <label for="customRadio1" class="custom-control-label">Laki-laki</label>
      </div>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="P" type="radio" id="customRadio2" name="user_jk" <?=($user->user_jk == "P" ? " checked=''" : "")?> required="">
        <label for="customRadio2" class="custom-control-label">Perempuan</label>
      </div>
    </div>

    <div class="form-group" id="notifikasi_user_password">
      <label for="user_password">Ubah Passsword</label>
      <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Kosongi jika tidak merubah password" autocomplete="off">
      <small class="text-muted"><span style="color:red">*kosongi jika tidak merubah password</span></small>
    </div>

    <div class="form-group" id="notifikasi_user_password2">
      <label for="user_password2">Konfirmasi Passsword</label>
      <input type="password" class="form-control" id="user_password2" name="user_password2" placeholder="Konfirmasi password" autocomplete="off">
    </div>
    
    <button type="submit" class="btn btn-primary" id="submit">Simpan Perubahan</button>
    </form>
  </div>
</div>

</section>

<?php $this->load->view("user/_template/foot");?>
<script>
  $('#kirimulang').click(function (e){
    e.preventDefault();
    let url = $(this).attr('href');
    let email = $('#user_email').val()
    $.ajax({
      url: url + '/' + email,
      dataType: 'json',
      success: (res, status) => {
        if(res.status){
          $.notify(res.pesan, 'success')
        } else {
          $.notify(res.pesan, 'danger')
        }
      }

    })
  })
</script>
</body>
</html>
