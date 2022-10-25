<?php $this->load->view("_template/head.php"); ?>
<style>
.kekanan ul{
  padding-left: 20px
}
</style>
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
          <div class="alert alert-primary kekanan" role="alert">
              Berikut ini adalah informasi untuk memantau pengaduan, yaitu:
                <ul>
                  <li>Fitur ini dapat digunakan untuk memantau tindak lanjut dari pengaduan Anda tanpa harus login sebelumnya.</li>
                  <li>Pastikan Anda telah mengirim pengaduan sebelumnya dan telah mendapat kode unik terhadap laporan tersebut.</li>
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
        <div class="col-12 mt-3">
          <table class="table table-bordered">
            <tr>
              <th>Kode Aduan</th>
              <td><strong>#<?=$pengaduan['pengaduan_kode']?></strong></td>
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
              <td><?=$pengaduan['pengaduan_berkas']?></td>
            </tr>
          </table>
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
    let value = $('#input1').val()
    window.location = '<?=site_url('pantau/')?>' + value
  });
</script>