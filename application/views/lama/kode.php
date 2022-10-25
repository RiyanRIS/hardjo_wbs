<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <?php $this->load->view('header'); ?>
    <section style="padding-top:20px;padding-bottom: 109px;">
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
                       <!--  <div class="header">
                            <h2>
                            SISTEM PENGADUAN PELANGGARAN
                            </h2>
                           
                        </div> -->
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a href="#identitas" data-toggle="tab">
                                        <i class="material-icons">contacts</i> <b>ISI IDENTITAS</b> <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </li>
                                <li role="presentation"  class="active">
                                    <a href="#profile" data-toggle="tab">
                                        <i class="material-icons">email</i> <b>VERIFIKASI EMAIL</b> <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="javascript:void(0);" data-toggle="tab">
                                        <i class="material-icons">edit</i> <b>TULIS PENGADUAN</b>
                                    </a>
                                </li>
                               
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="identitas">
                               
                            <form method="post" action="<?= base_url('pengaduan/updateidentitas');?>" >
                           <?php foreach($data as $row){?>
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>NIP/NIK :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nik" maxlength="25" class="form-control" placeholder="" value="<?= $row['nik']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama" maxlength="35" class="form-control" placeholder="" value="<?= $row['nama']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Telpon / No HP :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" maxlength="35" class="form-control" placeholder="" value="<?= $row['no_hp']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Email :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" maxlength="35" class="form-control" placeholder="" value="<?= $row['email']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                    <div class="col-lg-offset-6 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <button type="submit" class="btn btn-info waves-effect">
                                    <i class="material-icons">send</i>
                                    <span>UBAH IDENTITAS</span>
                                </button>
                                    </div>
                                </div>
                            </form>
                                </div>
                               
                           
                        </div>
                        <div role="tabpanel" class="tab-pane fade in active" id="profile">
                        <?= $this->session->flashdata('msg');?>
                        
                        <br/><br/>
                                    <b>Masukkan kode verifikasi yang dikirim lewat email :</b>
                                   <form method="post" action="<?= base_url('pengaduan/verifykode');?>">
                                   <input type="hidden" name="id" class="form-control" placeholder="" value="<?= $row['id']; ?>">
                                   <?php } ?>
                                   <div class="row row-centered">
                                   
                                    <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7 col-centered">
                                        <div class="form-group form-group-lg">
                                            <div class="form-line focused">
                                            <input type="text" name="confkode" id="centeralign-textbox" maxlength="10" class="form-control" placeholder="" required >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-centered">
                                   
                                   <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7 col-centered">
                                       <div class="form-group">
                                          
                                           <button type="submit" class="btn btn-info waves-effect">
                                    <i class="material-icons">send</i>
                                    <span>KIRIM</span>
                                </button>
                                          
                                       </div>
                                   </div>
                               </div>
                                   </form>
                                </div>
                    </div>
                </div>
            </div>
            <div class="footer">
            &copy; Copyright 2020. All Rights Reserved by INFOLAHTA RSPAU HARDJOLUKITO
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
<!-- <script src="<?= base_url('assets/js/pages/forms/advanced-form-elements.js');?>"></script> -->

<!-- Demo Js -->
<script src="<?= base_url('assets/js/demo.js');?>"></script>


<script>
    document.getElementById("centeralign-textbox").style.textAlign = "center";
</script>
</body>

</html>

   