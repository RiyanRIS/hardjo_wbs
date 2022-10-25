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
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Selamat datang di <i>Whistleblowing System RSPAU dr. S. Hardjolukito</i></h3>
  </div>
  <div class="card-body">
    <p><i>Whistleblowing System (WBS)</i> adalah sistem pelaporan pelanggaran yang terjadi di lingkungan pekerjaan dan melibatkan peran serta seluruh personel dalam proses pelaporan dan pengungkapannya. WBS merupakan bagian dari sistem pengendalian internal dalam mencegah praktik penyimpangan dan kecurangan serta memperkuat penerapan <i>Good Corporate Governance (GCG). </i></p>
    <p>Anda tidak perlu khawatir terungkapnya identitas diri Anda karena RSPAU dr. S. Hardjolukito akan <strong>MERAHASIAKAN IDENTITAS DIRI ANDA</strong> sebagai <i>whistleblower</i>. RSPAU dr. S. Hardjolukito menghargai informasi yang Anda laporkan. Fokus kami kepada materi informasi yang Anda Laporkan. </p>
    <h6>KRITERIA PENGADUAN</h6>
    <p>Pelanggaran yang dapat dilaporkan melalui <i>Whistleblowing System</i> adalah sebagai berikut:</p>
    <ul>
      <li>Benturan Kepentingan.</li>
      <li>Korupsi.</li>
      <li>Kecurangan.</li>
      <li>Pencurian/Penggelapan.</li>
      <li>Pelanggaran dalam Proses Pengadaan Barang dan Jasa.</li>
      <li>Penyalahgunaan jabatan/kewenangan.</li>
      <li>Suap/gratifikasi.</li>
    </ul>
    <a href="<?=site_url('pengaduan/buat')?>" class="btn btn-primary"><i class="fa fa-file"></i> Buat Aduan</a>
  </div>
</div>

</section>

<?php $this->load->view("user/_template/foot");?>
<script>
  
<?php 
if(!$this->session->userdata('user')['user_emailValid']){
?>
Swal.fire({
  title: 'Akun Belum Aktif!',
  html: 'Harap <a href="<?=site_url('user/akun')?>">verifikasi email</a> terlebih dahulu atau anda dapat menghubungi admin untuk mengaktifkan akun.',
  icon: 'error',
  confirmButtonText: 'Ok'
})
<?php } ?>
</script>
</body>
</html>
