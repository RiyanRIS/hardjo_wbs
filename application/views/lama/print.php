<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LAPORAN PENGADUAN</title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/logo-rspau.png'); ?>">
  <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
  
</style>


</style>
  </head>
  <body>
    <!-- Content Wrapper. Contains page content -->
    <div>
      <br/>
        <center>
        <img src="<?= base_url('assets/logo-rspau.png'); ?>" width="70px" style="margin-bottom:-20px"/>
           <h3>LAPORAN PENGADUAN PELANGGARAN<br/>RSPAU dr. S. HARDJOLUKITO</h3>
           <hr />
            </center>
          <br/>
          <?php foreach ($data as $row) { ?>
          <table align="center" cellpadding="4" cellspacing="5" width="75%">
          <tbody>
         <tr>
         <td width="50%"><b>TGL LAPORAN</b></td>
         <td>:</td>
         <td ><?= date('d M Y',strtotime($row->timeinit)); ?> pukul <?= date('H:i',strtotime($row->timeinit)); ?> WIB</td>
         </tr>
         <tr>
         <td><b>NIK</b></td>
         <td>:</td>
         <td><?= $row->nik; ?></td>
         </tr>
         <tr>
         <td><b>NAMA</b></td>
         <td>:</td>
         <td><?= $row->nama; ?></td>
         </tr>
         <tr>
         <td><b>NO HP</b></td>
         <td>:</td>
         <td><?= $row->no_hp; ?></td>
         </tr>
         <tr>
         <td><b>EMAIL</b></td>
         <td>:</td>
         <td><?= $row->email; ?></td>
         </tr>
         <tr>
         <td><b>BERKAS</b></td>
         <td>:</td>
         <td><?php if(!empty($row->nama_berkas)){echo "Ada";}else{echo "Nihil"; } ?></td>
         </tr>
         <tr>
         <td><b>URAIAN</b></td>
         <td></td>
         <td></td>
         </tr>
         <tr>
         <td colspan="3" style="text-align:justify"><?= $row->uraian; ?></td>
         
         </tr>
          </tbody>
          </table>
          <?php } ?>
        </div>
        <!-- /.content-wrapper -->
        <script>
		window.print();
	</script>
        </body>
</html>
       