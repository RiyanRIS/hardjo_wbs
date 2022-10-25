<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <?php $this->load->view('header'); ?>
    <section>
        <div class="container-fluid">
            <div class="text-center">
                <img src="<?= base_url('assets/logo-rspau.png');?>" style="padding-top:15px; margin-bottom:-15px;" />
                <h3 class="stroke">WHISTLE BLOWING SYSTEM</h3>
                <!-- <h3 class="stroke2">(WHISTLE BLOWING SYSTEM)</h3> -->
                <h4 class="stroke">RSPAU dr. S. HARDJOLUKITO</h4>
            </div>
           
       <!-- Tabs With Icon Title -->
       <div class="row row-centered">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-centered">
                    <div class="card">
                     <div class="header">
                           <!--  <h2>
                            SISTEM PENGADUAN PELANGGARAN
                            </h2>
-->
                        </div> 
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a href="javascript:void(0);" data-toggle="tab">
                                        <i class="material-icons">contacts</i> <b>ISI IDENTITAS</b> <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="javascript:void(0);" data-toggle="tab">
                                        <i class="material-icons">email</i> <b>VERIFIKASI EMAIL</b> <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </li>
                                <li role="presentation" class="active">
                                    <a href="#pengaduan" data-toggle="tab">
                                        <i class="material-icons">edit</i> <b>TULIS PENGADUAN</b>
                                    </a>
                                </li>
                               
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="pengaduan">
                               
                                <?= form_open(base_url('pengaduan/simpan_pengaduan'), array('enctype'=>'multipart/form-data')); ?>
                            <?= $this->session->flashdata('msg');?>
                            <?= validation_errors(); ?>
                           <?php foreach($data as $row){?>
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="nama"  value="<?= $row['nama']; ?>">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-3 form-control-label">
                                        <label>Uraian :</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-8 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea rows="8" class="form-control no-resize" minlength="20" name="uraian" required oninvalid="this.setCustomValidity('Uraian terlalu singkat atau belum diisi')" oninput="setCustomValidity('')"><?= $this->session->userdata('uraian'); ?></textarea>
                                            <script>
                        CKEDITOR.replace( 'uraian' );
                </script>    
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                              <!--   <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Lampirkan File :</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                                   
                                        <div class="dz-message" style="background-color:white; padding: 20px 20px; margin-top:-5px">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Klik disini untuk upload file.</h3>
                                    <label>Ukuran maksimal 5 MB<br/>Jika file lebih dari satu harap dimasukkan dalam ZIP</label>
                                </div>
                                <div class="fallback">
                                    <input name="userfile" type="file" multiple/>
                                </div>
                                
                                    </div> -->
                                    <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Lampirkan File :</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                         
                                    <input name="userfile" type="file"/><br/>
                                    <small><b>Ukuran file maksimal 5 MB, file yang diperbolehkan jpg, jpeg, png, doc, pdf, zip</b> </small>
                               </div>
                                
                                    </div>
                                   
                                </div> 
                                <?php } ?>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-8 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
                                   <!--  <input type="submit" class="btn btn-info waves-effect" name="submit" id="submit" value="KIRIM PENGADUAN"> -->
                                   <!--  <i class="material-icons">send</i>
                                    <span>KIRIM PENGADUAN</span> -->
                                    <button type="submit" class="btn btn-info waves-effect" >
                                    <i class="material-icons">send</i>
                                    <span>KIRIM PENGADUAN</span>
                                </button>
                                    </div>
                                </div>
                                
                                <?= form_close(); ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
            &copy; Copyright 2020. All Rights Reserved by INFOLAHTA RSPAU Hardjolukito
            </div>
            <!-- #END# Tabs With Icon Title -->
    </section>
   <!-- <footer id="sticky-footer">
    <div class="container text-center" style="padding-bottom:10px;padding-top:10px;">
      <b><small>&copy; Copyright 2020. All Rights Reserved by INFOLAHTA RSPAU Dr. S. HARDJOLUKITO</small></b>
    </div>
  </footer>
 -->

<!-- Jquery Core Js -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>

<!-- Select Plugin Js -->
<script src="<?= base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js');?>"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="<?= base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js');?>"></script>

<!-- Dropzone Plugin Js -->
<script src="<?= base_url('assets/plugins/dropzone/dropzone.js');?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?= base_url('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js');?>"></script>

<!-- Multi Select Plugin Js -->
<script src="<?= base_url('assets/plugins/multi-select/js/jquery.multi-select.js');?>"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="<?= base_url('assets/plugins/jquery-spinner/js/jquery.spinner.js');?>"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="<?= base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js');?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url('assets/plugins/node-waves/waves.js');?>"></script>

<!-- Custom Js -->
<script src="<?= base_url('assets/js/admin.js');?>"></script>


<!-- Demo Js -->
<script src="<?= base_url('assets/js/demo.js');?>"></script>

<script>
    // Add restrictions
    Dropzone.autoDiscover = false;

var file= new Dropzone(".dropzone",{
url: "<?php echo base_url('Pengaduan/simpan_pengaduan') ?>",
maxFilesize: 5,
maxFiles: 1,
method:"post",
acceptedFiles:".zip,image/*",
paramName:"userfile",
dictInvalidFileType:"Jenis file ini tidak dizinkan",
addRemoveLinks:true,
/* autoProcessQueue:true,
ProcessQueue:true, */

});

/* $('#submit').click(function() {
    var myDropzone = Dropzone.forElement(".dropzone");
    myDropzone.processQueue();
    myDropzone.autoProcessQueue();
}); */

    </script>

</body>

</html>

    