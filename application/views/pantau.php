<?php $this->load->view("_template/head.php"); ?>
<style>
.kekanan ul{
  padding-left: 20px
}
.respon{
  width:70%;
  background-color: #51b8f2;
  margin: 10px 0px;
  padding-top: 10px;
}
.respon p{
  color: #fff;
}
.respon.konten-kiri{
  border-radius: 10px 10px 10px 0px;
}
.respon.konten-kiri em{
  float: right;
  text-align: right !important;
}

.respon.konten-kanan{
  float: right;
  text-align: right;
  border-radius: 10px 10px 0px 10px;
}
.respon.konten-kanan h5{
  text-align: right !important;
}
.respon.konten-kanan em{
  float: left;
  text-align: left !important;
}
</style>
<?php $this->load->view("_template/atas.php"); ?> 

  <section class="service-page">
    <div class="container">
      <div class="row">
      <div class="col-12">
          <div class="contact-page-title">
            <h3>Pantau Pengaduan</h3>
            <p class="text-18">Anda tidak perlu LOGIN untuk mengetahui status pengaduan, cukup dengan mencarinya berdasarkan kode unik.</p>
          </div>
        </div>
        <div class="col-12">
          <div class="alert alert-primary kekanan" role="alert">
              Berikut ini adalah informasi untuk memantau pengaduan, yaitu:
                <ul>
                  <li>Fitur ini dapat digunakan untuk memantau tindak lanjut dari pengaduan Anda tanpa harus login sebelumnya.</li>
                  <li>Pastikan Anda telah <a href="<?=site_url('buat')?>" style="color: #007bff ; text-decoration: none;">membuat pengaduan</a> sebelumnya dan telah mendapat kode unik terhadap laporan tersebut.</li>
                  <li>Silahkan mengisi formulir pencarian di bawah ini dengan data kode unik pengaduan Anda dan lanjutkan dengan menekan tombol "Cari Pengaduan".</li>
                  <li>Jagalah kerahasiaan kode unik pengaduan Anda agar tidak disalah gunakan oleh pihak yang tidak bertanggung jawab.</li>
                </ul>
          </div>
          <div class="input-group mb-3">
  <input type="text" class="form-control" id="input1" placeholder="Kode Unik Pengaduan..." auto-complete="false" autofocus="true" aria-label="Kode Unik Pengaduan..." value="<?=$kode?>">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" id="btn1" type="button">Cari Pengaduan</button>
  </div>
</div>
        </div>
        <?php if($kode != null){?>
        <?php if(count($pengaduan) != 0){ 
          $pengaduan = $pengaduan[0];
        ?>
        <hr>
        <div class="col-12 mt-3">
        <h5>Data Pengaduan</h5>
          <table class="table table-bordered">
            <tr>
              <th>Kode Aduan</th>
              <td><strong><?=$pengaduan['pengaduan_kode']?></strong></td>
            </tr>
            <tr>
              <th>Status Aduan</th>
              <td><?=status_gen($pengaduan['pengaduan_status'])?></td>
            </tr>
            <tr>
              <th>Tanggal Aduan</th>
              <td><?=date('d F Y H:i', strtotime($pengaduan['pengaduan_waktu_buat']))?></td>
            </tr>
            <tr>
              <th>Jenis Aduan</th>
              <td><?=jenis_gen($pengaduan['pengaduan_jenis'])?></td>
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
              <td><a target="_blank" style="color:#007bff" href="<?=site_url('uploads/' . $pengaduan['pengaduan_berkas'])?>"><?=$pengaduan['pengaduan_berkas']?></a></td>
            </tr>
          </table>
         
          <div class="mt-3">
        <hr>
        <div class="row">
            <div class="col-12">
              <h5>Respon Pengaduan</h5>
              <div class="alert alert-primary mb-3" role="alert">
                Anda dapat berkomunikasi dengan Admin melalui panel ini.
              </div>
            </div>
            <?php if(count($respon) == 0){ ?>
              <p style="color:red">Belum ada respon.</p>
              <?php } else {?>
                <?php foreach ($respon as $key => $value) { ?>
                <?php if($value->respon_dari == 1){?>
                  <div class="col-12">
              <div class="card respon konten-kiri">
                <div class="card-body">
                  <h5>Administrator</h5>
                  <p><?=$value->respon_komentar?></p>
                  <em><?=date("d F Y H:i", strtotime($value->respon_waktu))?></em>
                </div>
              </div>
            </div>
                <?php } else { ?>
                  <div class="col-12">
              <div class="card respon konten-kanan">
                <div class="card-body">
                  <h5>Anda</h5>
                  <p><?=$value->respon_komentar?></p>
                  <em><?=date("d F Y H:i", strtotime($value->respon_waktu))?></em>
                </div>
              </div>
            </div>
                <?php } // Penutup If Admin||User ?>
                <?php } // Penutup foreach ?>
            <?php } // Penutup If count ?>

            <div class="col-12">
              <div class="form-respon mt-3">
                <form method="post" controller="<?=site_url('depan')?>" action="pantau" id="myForm22" enctype="multipart/form-data" accept-charset="utf-8">
                  <input type="hidden" name="pengaduan_kode" value="<?=$pengaduan['pengaduan_kode']?>">
                  <textarea name="respon_komentar" id="respon_komentar" cols="10" rows="5" class="form-control" placeholder="Tulis respon pengaduan disini..."></textarea>
                  <button class="btn mt-3" type="submit"><i class="fas fa-paper-plane"></i> Kirim</button>
                </form>
              </div>
            </div>

          </div>
        </div>
        <div>
        <?php } else {?>
        <div class="col-12 mt-3">
          <h6 style="color:red">DATA PENGADUAN ANDA DENGAN KODE UNIK "<?=$kode?>" TIDAK DITEMUKAN.</h6>
        </div>
        <?php } }else{ ?>
          <div class="mb-5">&nbsp;</div>
        <?php } ?>
      </div>
    </div>
  </section>

<?php $this->load->view("_template/foot.php"); ?>

<script>

  $('#btn1').click(function (){
    kerjakan()
  })

  $('#input1').focus(function (){
    $(document).on('keypress', function(e) {
      if(e.which == 13) {
        kerjakan()
      }
    })
  })

  function kerjakan(){
    let value = $('#input1').val()
    window.location = '<?=site_url('pantau/')?>' + value
  }
</script>