<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?> 

  <section class="service-page">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="contact-page-title">
            <h2>Detail Aduan</h2>
            <p class="text-18">Halaman pantau aduan</p>
          </div>
        </div>
        <div class="col-12">
          <input type="text" class="text" name="kode">
          <button class="btn btn-primary submitnya">Submit</button>
        </div>
        <?php if($kode != null){?>
        <div class="col-12 mt-3">
          <table class="table table-bordered">
            <tr>
              <th>Kode Aduan</th>
              <td><strong>#<?=$pengaduan['pengaduan_kode']?></strong></td>
            </tr>
            <tr>
              <th>Status Aduan</th>
              <td><span class="badge badge-success"><?=$pengaduan['pengaduan_status']?></span></td>
            </tr>
            <tr>
              <th>Tanggal Aduan</th>
              <td><?=$pengaduan['pengaduan_tanggal_buat']?></td>
            </tr>
            <tr>
              <th>Jenis Aduan</th>
              <td><?=$pengaduan['pengaduan_jenis']?></td>
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
        <?php } ?>
      </div>
    </div>
  </section>

<?php $this->load->view("_template/foot.php"); ?>