<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?> 

  <section class="service-page">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="contact-page-title">
            <h2>Detail Aduan</h2>
            <p class="text-18">Silahkan simpan dan jaga kerahasiaan kode aduan anda.</p>
          </div>
        </div>
        <div class="col-12 mt-3">
          <table class="table table-bordered">
            <tr>
              <th>Kode Aduan</th>
              <td><strong><?=$pengaduan['pengaduan_kode']?></strong></td>
            </tr>
            <tr>
              <th>Status Aduan</th>
              <td><span class="badge badge-success">Diterima</span></td>
            </tr>
            <tr>
              <th>Tanggal Aduan</th>
              <td><?=date("d F Y")?></td>
            </tr>
            <tr>
              <th>Jenis Aduan</th>
              <td><?=$pengaduan2['pengaduan_jenis_baca']?></td>
            </tr>
            <tr>
              <th>Nama Terlapor</th>
              <td><?=$pengaduan['pengaduan_nama_terlapor']?></td>
            </tr>
            <tr>
              <th>Lokasi Kejadian</th>
              <td><?=$pengaduan['pengaduan_lokasi']?></td>
            </tr>
            <tr>
              <th>Tanggal Perkiraan Kejadian</th>
              <td><?=$pengaduan['pengaduan_tanggal']?></td>
            </tr>
            <tr>
              <th>Waktu Perkiraan Kejadian</th>
              <td><?=$pengaduan['pengaduan_waktu']?></td>
            </tr>
            <tr>
              <th>Deskripsi Aduan</th>
              <td><?=$pengaduan['pengaduan_deskripsi']?></td>
            </tr>
            <tr>
              <th>Berkas</th>
              <td><?=$pengaduan['pengaduan_berkas']?></td>
            </tr>
          </table>
        <div>
      </div>
    </div>
  </section>

<?php $this->load->view("_template/foot.php"); ?>

<script>
  Swal.fire({
    title: 'Pengaduan berhasil dibuat!',
    html: 'Kode aduan anda adalah <strong><?=$pengaduan['pengaduan_kode']?></strong>. Silahkan simpan dan jaga kerahasiaan kode aduan anda.',
    icon: 'success',
    confirmButtonText: 'Ok'
  })
</script>
