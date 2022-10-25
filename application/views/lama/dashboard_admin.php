<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
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

    <!-- Morris Chart Css-->
    <link href="<?= base_url('assets/plugins/morrisjs/morris.css');?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/styleadmin.css');?>" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css');?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/css/themes/all-themes.css');?>" rel="stylesheet" />
<style>
    body {
 font-family: 'Work Sans', sans-serif;
 
}

h1, h2, h3, h4, h5, h6 {
 font-family: 'Montserrat', sans-serif;
 
}
    </style>
</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand text-center" href="<?= base_url('pengaduan/dashboard_admin'); ?>">WHISTLEBLOWING SYSTEM RSPAU dr. S. HARDJOLUKITO</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/logo-rspau.png');?>" width="48" height="48" />
                </div>
                <div class="info-container">
                    <div class="name"><?= $this->session->userdata('username'); ?></div>
                    <div class="email"><?= $this->session->userdata('keterangan'); ?></div>
                  
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if($this->uri->segment(2)=="dashboard_admin"){echo "active";} else {}?>">
                        <a href="<?= base_url('pengaduan/dashboard_admin'); ?>">
                            <i class="material-icons">dashboard</i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(2)=="kotak_masuk"){echo "active";} else {}?>">
                        <a href="<?= base_url('pengaduan/kotak_masuk'); ?>">
                            <i class="material-icons">description</i>
<span>KOTAK MASUK</span><?php if (isset($unread)){ if ($unread != 0){?><span class="badge bg-cyan" style="color:white"><?php echo $unread;?> Unread</span> <?php }else{}} ?> 
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#logoutModal">
                            <i class="material-icons">exit_to_app</i>
                            <span>LOGOUT</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">INFOLAHTA RSPAU HARDJOLUKITO</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Logout</h4>
                        </div>
                        <form method="post" action="<?= base_url().'pengaduan/logout'?>">
                        <div class="modal-body">
                           Apakah Anda yakin akan keluar dari sistem ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-link waves-effect">Ya</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
                <div class="jam-digital">
                <h2> DASHBOARD PENGADUAN
           <?= longdate_indo(date('Y-m-d')); ?> 
	PUKUL <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span> WIB</h2>
  </div>

            
            <script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
        var waktu = new Date();
        currentHours = waktu.getHours();
        currentHours = ("0" + currentHours).slice(-2);
        currentMinutes = waktu.getMinutes();
        currentMinutes = ("0" + currentMinutes).slice(-2);
        currentSeconds = waktu.getSeconds();
        currentSeconds = ("0" + currentSeconds).slice(-2);
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = currentHours;
        document.getElementById("menit").innerHTML = currentMinutes;
        document.getElementById("detik").innerHTML = currentSeconds;
	}
</script>
            </div>
            
            <!-- Widgets -->
            <div class="row clearfix ">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
             
                    <button type="button" onclick="window.location='<?= base_url('pengaduan/kotak_masuk'); ?>'" class="info-box bg-pink hover-expand-effect">
                   
                        <div class="icon">
                            <i class="material-icons">feedback</i>
                        </div>  
                        <div class="content">
                            <div class="text">TOTAL KOTAK MASUK</div>
                            <div class="number count-to" data-from="0" data-to="<?php
              if (isset($total)) {echo $total;}
            ?>" data-speed="15" data-fresh-interval="20"></div>
            
                        </button>
                    </div>
                   
                 
                
                </div>

            <!-- #END# Widgets -->
           
            
          
    </section>

    <?php $this->load->view('footer-admin.php');?>