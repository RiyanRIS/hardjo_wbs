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
        border: 2px solid #5298db;
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

    /*.kontak .kontak-info-item i{
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
    }*/

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
        height: 43px;
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
    <?php if(!empty($record_head)): ?>
        <div class="card kontak" style="border-radius: 10px;">
            <div class="card-body">
                <div class="row"> 
                    <div class="col-lg-4 col-md-5">
                        
                        <div class="kontak-info">
                            <div class="kontak-info-item">
                                <!-- <i>
                                    <img src="<?=site_url('assets/images/icon/svg_primary/phone.svg') ?>" alt="" width="50%">
                                </i> -->
                                <h4>Kode Pengaduan</h4>
                                <p><?=$record_head->pengaduan_kode?></p>
                            </div>
                        </div>
                        <div class="kontak-info">
                            <div class="kontak-info-item">
                                <!-- <i>
                                    <img src="<?=site_url('assets/images/icon/svg_primary/phone.svg') ?>" alt="" width="50%">
                                </i> -->
                                <h4>Tanggal Pengaduan</h4>
                                <p><?=tanggal_jam_indo($record_head->pengaduan_waktu_buat)?></p>
                            </div>
                        </div>
                        <div class="kontak-info">
                            <div class="kontak-info-item">
                                <!-- <i>
                                    <img src="<?=site_url('assets/images/icon/svg_primary/phone.svg') ?>" alt="" width="50%">
                                </i> -->
                                <h4>Status Pengaduan</h4>
                                <p style="border-bottom: 1px solid #5298db;">
                                    <?=status_gen($record_head->pengaduan_status)?>
                                    <span type="button" class="goto_comment">
                                        <i class="fa fa-comments" style="margin-top: 10px; margin-left: 10px;"></i>
                                        <!-- <span class='badge badge-warning' id='lblCartCount'> 1 </span> -->
                                        <span style="font-size: 15px">14 Coment</span>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="file-content mt-3">
                            <span style="border-bottom: 1px solid black">
                                File Upload Oleh User
                            </span>

                            

                        </div>

                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="kontak-form">
                            
                            <form method="post" action="kotak_frontend" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group" id="notifikasi_subjek">
                                            <label for="subjek">Subjek</label>
                                            <input type="text" name="subjek" id="subjek" value="<?=$record_head->pengaduan_subjek?>" class="form-control" placeholder="Subjek" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" id="notifikasi_pengaduan_jenis">
                                            <label for="subjek">Jenis Pengaduan</label>
                                            <input type="text" name="pengaduan_jenis" value="<?=jenis_gen($record_head->pengaduan_jenis)?>" id="pengaduan_jenis" class="form-control" placeholder="Jenis Pegaduan" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" id="notifikasi_pengaduan_tanggal">
                                            <label for="pengaduan_tanggal">Tanggal Kejadian</label>
                                            <input type="text" name="pengaduan_tanggal" id="pengaduan_tanggal" value="<?=$record_head->pengaduan_tanggal?>" class="form-control" placeholder="Subjek" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group" id="notifikasi_pengaduan_nama_terlapor">
                                            <label for="subjek">Nama Terlapor</label>
                                            <input type="text" name="pengaduan_nama_terlapor" value="<?= ucfirst($record_head->pengaduan_nama_terlapor)?>" id="pengaduan_nama_terlapor" class="form-control" placeholder="Nama Pelapor" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group" id="notifikasi_pengaduan_pengaduan_lokasi">
                                            <label for="pengaduan_lokasi">Lokasi Kejadian</label>
                                            <input type="text" name="pengaduan_lokasi" id="pengaduan_lokasi" value="<?=$record_head->pengaduan_lokasi?>" class="form-control" placeholder="Subjek" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group" id="notifikasi_pengaduan_pengaduan_deskripsi">
                                            <label for="pengaduan_deskripsi">Lokasi Kejadian</label>
                                            <textarea name="" class="form-control" style="height: 300px;"><?=$record_head->pengaduan_deskripsi?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style type="text/css" media="screen">
            ul{
                list-style-type: none;
             }

            .chat {
                width: 100%;
                float: left;
                background: #F2F5F8;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                color: #434651;
            }
            .chat .chat-header {
                padding: 20px;
                border-bottom: 2px solid white;
            }
            .chat .chat-header img {
                float: left;
            }
            .chat .chat-header .chat-about {
                float: left;
                padding-left: 10px;
                margin-top: 6px;
            }
            .chat .chat-header .chat-with {
                font-weight: bold;
                font-size: 16px;
            }
            .chat .chat-header .chat-num-messages {
                color: #92959E;
            }
            .chat .chat-header .fa-star {
                float: right;
                color: #D8DADF;
                font-size: 20px;
                margin-top: 12px;
            }
            .chat .chat-history {
                padding: 30px 30px 20px;
                border-bottom: 2px solid white;
                overflow-y: scroll;
                height: 350px;
            }
            .chat .chat-history .message-data {
                margin-bottom: 15px;
            }
            .chat .chat-history .message-data-time {
                color: #a8aab1;
                padding-left: 6px;
            }
            .chat .chat-history .message {
                color: white;
                padding: 10px 20px;
                line-height: 26px;
                font-size: 16px;
                border-radius: 7px;
                margin-bottom: 30px;
                width: 90%;
                position: relative;
            }
            .chat .chat-history .message:after {
                bottom: 100%;
                left: 7%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
                border-bottom-color: #86BB71;
                border-width: 10px;
                margin-left: -10px;
            }
            .chat .chat-history .my-message {
                background: #86BB71;
            }
            .chat .chat-history .other-message {
                background: #94C2ED;
            }
            .chat .chat-history .other-message:after {
                border-bottom-color: #94C2ED;
                left: 93%;
            }
            .chat .chat-message {
                padding: 30px;
            }
            .chat .chat-message textarea {
                width: 100%;
                border: none;
                padding: 10px 20px;
                font: 14px/22px "Lato", Arial, sans-serif;
                margin-bottom: 10px;
                border-radius: 5px;
                resize: none;
            }
            .chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
                font-size: 16px;
                color: gray;
                cursor: pointer;
            }
            .chat .chat-message button {
                float: right;
                color: #94C2ED;
                font-size: 16px;
                text-transform: uppercase;
                border: none;
                cursor: pointer;
                font-weight: bold;
                background: #F2F5F8;
            }

            .chat .chat-message button:hover {
                color: #75b1e8;
            }

            .online, .offline, .me {
                margin-right: 3px;
                font-size: 10px;
            }

            .online {
                color: #86BB71;
            }

            .offline {
                color: #E38968;
            }

            .me {
                color: #94C2ED;
            }

            .align-left {
                text-align: left;
            }

            .align-right {
                text-align: right;
            }

            .float-right {
                float: right;
            }

            .clearfix:after {
                visibility: hidden;
                display: block;
                font-size: 0;
                content: " ";
                clear: both;
                height: 0;
            }
        </style>

        <!-- Start Comment -->
        <div class="card kontak" style="border-radius: 10px;">
            <div class="card-header">
                Comment
            </div>
            <div class="card-body">
                <div class="row" id="content_comment_detail"> 
                    <div class="chat">
                        
                        <div class="chat-history">
                            <?php if(!empty($record_comment)): ?>
                                <ul>
                                    <?php foreach($record_comment as $key => $value){ ?>
                                        <?php if($value->respon_dari == 2 ) : ?>
                                            <li>
                                                <div class="message-data">
                                                    <span class="message-data-name"><i class="fa fa-circle online"></i> User</span>
                                                    <span class="message-data-time"><?=indo_date($value->respon_waktu)."". substr($value->respon_waktu, 10, 6)?></span>
                                                </div>
                                                <div class="message my-message">
                                                    <?= $value->respon_komentar ?>
                                                </div>
                                            </li>
                                        <?php else: ?>
                                            <li class="clearfix">
                                            <div class="message-data align-right">
                                                <span class="message-data-time" ><?=indo_date($value->respon_waktu)."". substr($value->respon_waktu, 10, 6)?></span> &nbsp; &nbsp;
                                                <span class="message-data-name" >Admin</span> <i class="fa fa-circle me"></i>
                                          
                                            </div>
                                            <div class="message other-message float-right">
                                                <?= $value->respon_komentar ?>
                                            </div>
                                        </li>
                                        <?php endif ?>
                                    <?php } ?>
                                </ul>
                            <?php else: ?>
                                <center>Tidak Ada Comment</center>
                            <?php endif; ?>
                        </div> <!-- end chat-history -->
      
                        <form action="<?=base_url('pengaduan/detail/'.@$this->uri->segment(3))?>" method="post" accept-charset="utf-8">
                            <div class="chat-message clearfix">
                                <textarea name="balas_comment" id="balas_comment" placeholder ="Type your message" rows="3" required></textarea>
                                <button type="submit" name="submit_comment" class="btn btn-danger" style="background-color: green; color: white">
                                    <i class="fa fa-paper-plane"></i> Send
                                </button>
                            </div> <!-- end chat-message -->
                        </form>
      
                    </div> <!-- end chat -->

                </div>
            </div>
        </div>
        <!-- End Comment -->

    <?php else: ?>
        <center>Tidak Ada Comment</center>
    <?php endif; ?>
</section>

<?php $this->load->view("user/_template/foot");?>
  
</body>
</html>

