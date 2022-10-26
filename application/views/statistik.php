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
            <h3>Statistik Pengaduan</h3>
            <p class="text-18">Berikut adalah statistik pengaduan yang diterima oleh aplikasi WBS RSPAU dr. S. Hardjolukito</p>
          </div>
        </div>
        <div class="col-12">
          <div class="alert alert-primary kekanan" role="alert">
        
          Pengaduan yang masuk melalui aplikasi WBS RSPAU dr. S. Hardjolukito akan ditindak lanjuti selambat-lambatnya 7 (tujuh) hari kerja terhitung sejak pengaduan diterima. Terdapat 4 (empat) kategori dalam penanganan pengaduan melalui WBS RSPAU dr. S. Hardjolukito yaitu:
          <ul>
            <li><strong>Pengaduan Diterima</strong> yaitu pengaduan yang memenuhi syarat sesuai dengan ketentuan yang telah ditetapkan dalam aplikasi WBS RSPAU dr. S. Hardjolukito.</li>
            <li><strong>Pengaduan Ditolak</strong> yaitu pengaduan yang tidak memenuhi syarat yang telah ditetapkan dalam aplikasi WBS RSPAU dr. S. Hardjolukito.</li>
            <li><strong>Pengaduan Diproses</strong> yaitu pengaduan yang memenuhi syarat dan mendapat respon dari verifikator administrator WBS RSPAU dr. S. Hardjolukito dimana pengaduan siap untuk diproses (ditindak lanjuti).</li>
            <li><strong>Pengaduan Selesai</strong> yaitu pengaduan yang telah selesai diproses.</li>
          </ul>
          </div>
        </div>
        <div class="col-12">
          <div id="container">
            <canvas id="canvas"></canvas>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php $this->load->view("_template/foot.php"); ?>
<script src="//chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
<script src="//www.chartjs.org/samples/2.6.0/utils.js"></script>

<script>
    window.onload = function() {
      var color = Chart.helpers.color;
      var barChartData = {
          labels: ["Bantuan Masyrakat", "Pemungutan Liar", "Petugas Tidak Ramah", "Tindakan KKN", "Infrastruktur Tidak Baik", "Layanan Kesehatan"],
          datasets: [{
              label: 'Diterima',
              backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
              borderColor: window.chartColors.black,
              borderWidth: 1,
              data: [
                  <?=$rec[0][1]?>,
                  <?=$rec[0][2]?>,
                  <?=$rec[0][3]?>,
                  <?=$rec[0][4]?>,
                  <?=$rec[0][5]?>,
                  <?=$rec[0][6]?>,
              ]
          }, {
              label: 'Ditolak',
              backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
              borderColor: window.chartColors.red,
              borderWidth: 1,
              data: [
                <?=$rec[9][1]?>,
                <?=$rec[9][2]?>,
                <?=$rec[9][3]?>,
                <?=$rec[9][4]?>,
                <?=$rec[9][5]?>,
                <?=$rec[9][6]?>,
              ]
          }, {
              label: 'Diproses',
              backgroundColor: color(window.chartColors.black).alpha(0.5).rgbString(),
              borderColor: window.chartColors.black,
              borderWidth: 1,
              data: [
                <?=$rec[1][1]?>,
                <?=$rec[1][2]?>,
                <?=$rec[1][3]?>,
                <?=$rec[1][4]?>,
                <?=$rec[1][5]?>,
                <?=$rec[1][6]?>,
              ]
          }, {
              label: 'Selesai',
              backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
              borderColor: window.chartColors.green,
              borderWidth: 1,
              data: [
                <?=$rec[2][1]?>,
                <?=$rec[2][2]?>,
                <?=$rec[2][3]?>,
                <?=$rec[2][4]?>,
                <?=$rec[2][5]?>,
                <?=$rec[2][6]?>,
              ]
          }]
        };

    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: ''
            }
        }
    });
};

</script>