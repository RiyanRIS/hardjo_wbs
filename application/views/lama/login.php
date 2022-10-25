<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pengaduan Pelanggaran RSPAU dr. S. Hardjolukito</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/logo-rspau.png');?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900|Work+Sans:300" rel="stylesheet">
    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/plugins/node-waves/waves.css');?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/plugins/animate-css/animate.css');?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">

    <style>

body {
 font-family: 'Work Sans', sans-serif;
 
}

h1, h2, h3, h4, h5, h6 {
 font-family: 'Montserrat', sans-serif;
 
}
    .stroke {
      font-size: 26px;
      color: #000;
     margin-left:-15px;
     margin-right:-15px;
     /*  -webkit-text-stroke: 0.05em #2B7DBD; */
   }
   .stroke1 {
      font-size: 23px;
      color: #000;
     
      /* -webkit-text-stroke: 0.05em #2B7DBD; */
   }
   .stroke2 {
      font-size: 19px;
      color: #fff;
      margin-top:-5px;
      margin-bottom:-5px;
   }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
        <div class="text-center">
        <img src="<?= base_url('assets/logo-rspau.png');?>" style="padding-top:5px; margin-bottom:-15px;" />
        <h2 class="stroke">WHISTLEBLOWING SYSTEM</h2>
                <!-- <h3 class="stroke2">(WHISTLE BLOWING SYSTEM)</h3> -->
                <h2 class="stroke1">RSPAU dr. S. HARDJOLUKITO</h2>
                </div>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?= base_url('pengaduan/auth');?>">
                    <div class="msg"> <?= $this->session->flashdata('msg');?> </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                           <!--  <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label> -->
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">LOGIN</button>
                        </div>
                    </div>
                   <!--  <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/plugins/node-waves/waves.js');?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.js');?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/admin.js');?>"></script>
    <script src="<?= base_url('assets/js/pages/examples/sign-in.js');?>"></script>
</body>

</html>