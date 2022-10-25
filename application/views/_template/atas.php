</head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">
                <img src="<?=base_url()?>assets/img/logo/favicon.png" alt="preloader">
            </div>
        </div>
        <!-- Header Top Bar Start -->

        <!-- Header Start -->
        <header class="header">
            <nav class="">
                <!-- Mobile -->
                <div class="nav-header right">
                    <a href="#" class="brand d-lg-none d-block">
                        <img src="<?=base_url()?>assets/img/logo/logo.png" alt="" class="atas">
                    </a>
                    <button class="toggle-bar"><span class="fa fa-bars"></span></button>
                </div>
                <div class="header-btn">
                    <a href="<?=site_url()?>" class="btn btn-secondary"><i class="fas fa-home"></i><span style="color:#fff;">Beranda</span></a>
                    <a href="<?=site_url("statistik")?>" class="btn btn-secondary"><i class="fas fa-chart-line"></i><span style="color:#fff;">Statistik</span></a>
                    <a href="<?=site_url('pantau')?>" class="btn btn-secondary"><i class="fa fa-check"></i><span style="color:#fff;">Pantau Aduan</span></a>
                </div>
                <!-- Mobile -->
                
                <ul class="menu">
                    <div class="logo">
                        <a href="<?=site_url()?>"><img src="<?=base_url()?>assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <li><a href="<?=site_url()?>">Beranda</a></li>
                    <li><a href="<?=site_url("statistik")?>">Statistik</a></li>
                    <li><a href="<?=site_url('pantau')?>">Pantau Aduan</a></li>
                </ul>

            </nav>
        </header>
        <!-- Header End -->