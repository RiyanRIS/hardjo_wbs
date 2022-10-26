<?php $this->load->view("user/_template/head");?>

<?php $this->load->view("user/_template/atas");?>
<?php $this->load->view("user/_template/nav");?>

<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ($title ?: "Dashboard") ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url('user')?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= ($title ?: "Dashboard") ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<style type="text/css" media="screen">
    /* ====================
            KONTKA
     ======================*/

    .kontak{
        /*background-color: #f7f7f7;*/
        background-color: #ffffff;
        border: 1px solid black;
    }

    .kontak .kontak-info h3{
        font-size: 22px;
        color: black;
        font-weight: 900;
        margin: 0 0 40px;
    }

    .kontak .kontak-info-item{
        position: relative;
        padding-left: 0px;
    }

    .kontak .kontak-info-item i{
        position: absolute;
        height: 40px;
        width: 40px;
        left: 0;
        top: 0;
        border-radius: 50%;
        font-size: 16px;
        color: red;
        border: 1px solid yellow;
        text-align: center;
        line-height: 38px;
    }

    .kontak .kontak-info-item h4{
        font-size: 18px;
        font-weight: 400;
        /*margin: 40px 0 5px 0;*/
        margin: 10px 0 0px 0;
        color: black;
    }

    .kontak .kontak-info-item p{
        font-size: 16px;
        font-weight: 300;
        margin: 0;
        line-height: 26px;
        color: black;
    }

    .kontak .kontak-form .kontak-group{
        margin-bottom: 25px;
    }

    .kontak .kontak-form label{
        margin-left: 15px;
    }

    .kontak .kontak-form .form-control{
        height: 52px;
        border: 1px solid transparent;
        box-shadow:  2px 3px 5px #5298db;
        border-radius: 30px;
        padding: 0 24px;
        color: #6c757d;
        background-color: #f7f7f7;
        transition: all 0.5s ease;
    }

    .kontak .kontak-form textarea.form-control{
        height: 140px;
        padding-top: 12px;
        resize: none;
    }
    .kontak .kontak-form .form-control:focus{
        border-color: #5298db;
    }
</style>

<section class="content">
    <?php if(!empty($record)): ?>
        <?php foreach ($record as $key => $value){ ?>
            <div class="card kontak" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-4 col-md-5">
                            <div class="kontak-info">
                                <div class="kontak-info-item">
                                    <!-- <i>
                                        <img src="<?=site_url('assets/images/icon/svg_primary/envelope.svg') ?>" alt="" width="50%">
                                    </i> -->
                                    <h4>E-mail</h4>
                                    <p><?=$value->email?></p>
                                </div>
                            </div>
                            <div class="kontak-info">
                                <div class="kontak-info-item">
                                    <!-- <i>
                                        <img src="<?=site_url('assets/images/icon/svg_primary/phone.svg') ?>" alt="" width="50%">
                                    </i> -->
                                    <h4>Kode Pengaduan</h4>
                                    <p><?=$value->pengaduan_kode?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="kontak-form">
                                
                                <form method="post" action="kotak_frontend" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group" id="notifikasi_nama">
                                                <label for="subjek">Subjek</label>
                                                <input type="text" name="subjek" id="subjek" class="form-control" placeholder="Subjek" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group" id="notifikasi_email">
                                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="" class="btn btn-primary" style="border-radius: 30px; background-color: #5298db !important">
                                                detail Pengaduan
                                            </a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php else: ?>
    <?php endif; ?>
</section>

<?php $this->load->view("user/_template/foot");?>
  
</body>
</html>
