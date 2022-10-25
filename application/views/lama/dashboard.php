<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <?php $this->load->view('header'); ?>
    <section>
        <div class="container-fluid">
       
       <!-- Tabs With Icon Title -->
       <div class="row row-centered" style="padding-top: 15px;">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-centered">
                    <div class="card">

                         <div class="header">
                         <div class="text-center" >
                         <?= $this->session->flashdata('berhasil');?> 
                <img src="<?= base_url('assets/logo-rspau.png');?>"/>
                <h3 class="stroke">Whistleblowing System</h3>
                <!-- <h3 class="stroke2">(WHISTLE BLOWING SYSTEM)</h3> -->
                <h3 class="stroke">RSPAU dr. S. Hardjolukito</h3>
              
            </div>
           
                            <div style="line-height: 30px;text-align: left;padding-top: 20px;">
                            <b>
                            <i>Whistleblowing System</i> (WBS) adalah sistem pelaporan pelanggaran yang terjadi di lingkungan pekerjaan dan melibatkan peran serta seluruh personel dalam proses pelaporan dan pengungkapannya.
                            WBS merupakan bagian dari sistem pengendalian internal dalam mencegah praktik penyimpangan dan kecurangan serta memperkuat penerapan <i>Good Corporate Governance (GCG)</i>.
                           </b>
                           <br/>
                           <b>
                           Anda tidak perlu khawatir terungkapnya identitas diri Anda karena RSPAU dr. S. Hardjolukito akan <span style="color: red;">MERAHASIAKAN IDENTITAS DIRI ANDA</span> sebagai whistleblower.
                           RSPAU dr. S. Hardjolukito menghargai informasi yang Anda laporkan.
                           Fokus kami kepada materi informasi yang Anda Laporkan.
                           </b>
                           <br/><br/>
                           <h4 style="text-align: center;color: black;">KRITERIA PENGADUAN</h4>
                           <b>
                            Pelanggaran yang dapat dilaporkan melalui <i>Whistleblowing System</i> adalah sebagai berikut:
                            <ol>
                                <li>Benturan Kepentingan.</li>
                                <li>Korupsi.</li>
                                <li>Kecurangan.</li>
                                <li>Pencurian/Penggelapan.</li>
                                <li>Pelanggaran dalam Proses Pengadaan Barang dan Jasa.</li>
                                <li>Penyalahgunaan jabatan/kewenangan.</li>
                                <li>Suap/gratifikasi.</li>
                            </ol>
                            </b>
                            <h4 style="text-align: center;color: black;">UNSUR PENGADUAN</h4>
<b>
Pengaduan Whistle Blowing System (WBS) harus memenuhi unsur:
<br/>
<h5>What</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apa indikasi pelanggaran yang diketahui
<br/>
<h5>Where</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Dimana perbuatan tersebut dilakukan
            <br/>
            <h5>When</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Kapan perbuatan tersebut dilakukan
            <br/>
            <h5>Who</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Siapa saja yang terlibat dalam perbuatan tersebut
            <br/>
            <h5>How</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Bagaimana perbuatan tersebut dilakukan (modus, cara, dsb.)
            <br/>
            </b>
                            </div>
                        </div>
                        <h4 style="color: black;">FORMULIR WHISTLEBLOWING SYSTEM</h4>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation" class="active" >
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">contacts</i> <b>ISI IDENTITAS</b> <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </li>
                                <li role="presentation"%">
                                    <a href="javascript:void(0);" data-toggle="tab">
                                        <i class="material-icons">email</i> <b>VERIFIKASI EMAIL</b> <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </li>
                                <li role="presentation" >
                                    <a href="javascript:void(0);" data-toggle="tab">
                                        <i class="material-icons">edit</i> <b>TULIS PENGADUAN</b>
                                    </a>
                                </li>
                               
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                               <?= $this->session->flashdata('msg');?> 
                               
                                <div class="note"><i class="material-icons">lock</i><small><b>Mohon isikan dengan data yang benar, kerahasiaan identitas Anda terjaga.</b></small></div>
                            <form method="post" action="<?= base_url('pengaduan/verifyemail');?>" >
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                        <label>NIP/NIK :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nik" maxlength="25" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Mohon isi NIP/NIK')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                        <label>Nama :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama" class="form-control" maxlength="35" placeholder="" required oninvalid="this.setCustomValidity('Mohon isi Nama')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                        <label>Telp/HP :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" class="form-control" maxlength="35" placeholder="" required oninvalid="this.setCustomValidity('Mohon isi nomor telepon')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                        <label>Email :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" max="35" class="form-control" maxlength="35" placeholder="" required oninvalid="this.setCustomValidity('Mohon isi alamat email')" oninput="setCustomValidity('')">
                                           
                                            </div>
                                            <small style="color:red">Kode Verifikasi akan dikirimkan melalui email</small>
                                        </div>
                                    </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-6 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
                                    <button type="submit" class="btn btn-info waves-effect">
                                    <i class="material-icons">send</i>
                                    <span>MINTA KODE VERIFIKASI</span>
                                </button>
                                      
                                    </div>
                                </div>
                            </form>
                                </div>
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

</body>

</html>

   