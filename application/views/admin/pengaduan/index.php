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
    <div class="row">
        <div class="col-12">
            <div class="form" style="padding: 10px 0; width: 30%; float: right;">
                <form action="<?=base_url('pengaduan')?>" method="get" accept-charset="utf-8">
                    <div class="input-group mb-3">
                        <input type="text" name="pencarian" value="<?=@$_GET['pencarian']?>" class="form-control" placeholder="Pencarian Kode" aria-describedby="button-addon1">
                        <div class="input-group-prepend">
                            <button class="btn" type="submit" id="button-addon1" style="border-radius: 0 10px 10px 0; background-color: #5298db;">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12">
            <?php $this->view('messages'); ?>
        </div>
    </div>
    <?php if(!empty($record)): ?>
        <?php foreach ($record as $key => $value){ ?>
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
                                    <p><?=$value->pengaduan_kode?></p>
                                </div>
                            </div>
                            <div class="kontak-info">
                                <div class="kontak-info-item">
                                    <!-- <i>
                                        <img src="<?=site_url('assets/images/icon/svg_primary/phone.svg') ?>" alt="" width="50%">
                                    </i> -->
                                    <h4>Tanggal Pengaduan</h4>
                                    <p><?=tanggal_jam_indo($value->pengaduan_waktu_buat)?></p>
                                </div>
                            </div>
                            <div class="kontak-info">
                                <div class="kontak-info-item">
                                    <!-- <i>
                                        <img src="<?=site_url('assets/images/icon/svg_primary/phone.svg') ?>" alt="" width="50%">
                                    </i> -->
                                    <h4>Status Pengaduan</h4>
                                    <p style="border-bottom: 1px solid #5298db;">
                                        <?=status_gen($value->pengaduan_status)?> 
                                        <span type="button" class="badge badge-info btn_change_status" data-id_pengaduan="<?=$value->pengaduan_id?>" data-pengaduan_status="<?=$value->pengaduan_status?>" style="margin-bottom: 14px">
                                            <i class="fa fa-sync"></i> Change Status
                                        </span>
                                    </p>
                                    <style type="text/css" media="screen">
                                        .comment .badge {
                                            padding-left: 9px;
                                            padding-right: 9px;
                                            -webkit-border-radius: 9px;
                                            -moz-border-radius: 9px;
                                            border-radius: 9px;
                                            margin-top: 6px;
                                        }

                                        .comment .label-warning[href],
                                        .comment .badge-warning[href] {
                                            background-color: #c67605;
                                        }
                                        .comment #lblCartCount {
                                            font-size: 12px;
                                            background: #ff0000;
                                            color: #fff;
                                            padding: 0 5px;
                                            vertical-align: top;
                                            margin-left: -10px; 
                                        }
                                    </style>
                                    <!-- <div class="comment">
                                        <i class="fa fa-comments" style="margin-top: 10px"></i>
                                        <span class='badge badge-warning' id='lblCartCount'> 1 </span>
                                        <span style="font-size: 15px">14 Coment</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="kontak-form">
                                
                                <form method="post" action="kotak_frontend" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group" id="notifikasi_subjek">
                                                <label for="subjek">Subjek</label>
                                                <input type="text" name="subjek" id="subjek" value="<?=$value->pengaduan_subjek?>" class="form-control" placeholder="Subjek" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group" id="notifikasi_pengaduan_jenis">
                                                <label for="subjek">Jenis Pengaduan</label>
                                                <input type="text" name="pengaduan_jenis" value="<?=jenis_gen($value->pengaduan_jenis)?>" id="pengaduan_jenis" class="form-control" placeholder="Jenis Pegaduan" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="notifikasi_pengaduan_nama_terlapor">
                                                <label for="subjek">Nama Terlapor</label>
                                                <input type="text" name="pengaduan_nama_terlapor" value="<?= ucfirst($value->pengaduan_nama_terlapor)?>" id="pengaduan_nama_terlapor" class="form-control" placeholder="Nama Pelapor" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="<?=base_url('pengaduan/detail/'.$value->pengaduan_id)?>" class="btn btn-primary" style="border-radius: 30px; background-color: #5298db !important">
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
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination " style="float: right !important;">
                        <?= pagination($jumlah_hal, $hal_aktif, base_url('pengaduan?pencarian='.@$_GET['pencarian'])); ?>
                    </ul>
                </nav>
            </div>
        </div>
    <?php else: ?>
        <center>Data tidak ditemukan</center>
    <?php endif; ?>
</section>

<!-- modal change status -->
<div class="modal" id="modal_change_status" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Status Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style type="text/css" media="screen">
                    
                    .wrapper .option{
                        background: #fff;
                        height: 100%;
                        /*width: 100%;*/
                        display: flex;
                        /*align-items: center;*/
                        /*justify-content: space-evenly;*/
                        margin: 0 10px;
                        border-radius: 5px;
                        cursor: pointer;
                        padding: 0 10px;
                        border: 2px solid lightgrey;
                        transition: all 0.3s ease;
                        margin-bottom: 20px;
                    }

                    .wrapper .option .dot{
                        height: 20px;
                        width: 20px;
                        background: #d9d9d9;
                        border-radius: 50%;
                        position: relative;
                        top: 5px;
                        margin-right: 20px;
                    }
                    .wrapper .option .dot::before{
                        position: absolute;
                        content: "";
                        top: 4px;
                        left: 4px;
                        width: 12px;
                        height: 12px;
                        background: #0069d9;
                        border-radius: 50%;
                        opacity: 0;
                        transform: scale(1.5);
                        transition: all 0.3s ease;
                    }

                    input[type="radio"]{
                        display: none;
                    }                 

                    #option-0:checked:checked ~ .option-0,
                    #option-1:checked:checked ~ .option-1,
                    #option-2:checked:checked ~ .option-2,
                    #option-9:checked:checked ~ .option-9{
                        border-color: #0069d9;
                        background: #0069d9;
                    }
                    #option-0:checked:checked ~ .option-0 .dot,
                    #option-1:checked:checked ~ .option-1 .dot,
                    #option-2:checked:checked ~ .option-2 .dot,
                    #option-9:checked:checked ~ .option-9 .dot{
                        background: #fff;
                    }
                    #option-0:checked:checked ~ .option-0 .dot::before,
                    #option-1:checked:checked ~ .option-1 .dot::before,
                    #option-2:checked:checked ~ .option-2 .dot::before,
                    #option-9:checked:checked ~ .option-9 .dot::before{
                        opacity: 1;
                        transform: scale(1);
                    }
                    .wrapper .option span{
                        font-size: 20px;
                        color: #808080;
                    }
                    #option-0:checked:checked ~ .option-0 span,
                    #option-1:checked:checked ~ .option-1 span,
                    #option-2:checked:checked ~ .option-2 span,
                    #option-9:checked:checked ~ .option-9 span{
                        color: #fff;
                    }
                </style>
                <div class="wrapper">
                    <input type="hidden" name="pengaduan_id" id="pengaduan_id">
                    <input type="radio" name="select" class="trigger_change" value="0" id="option-0">
                    <label for="option-0" class="option option-0">
                        <div class="dot"></div>
                        <span>Diterima</span>
                    </label>

                    <input type="radio" name="select" class="trigger_change" value="1" id="option-1">
                    <label for="option-1" class="option option-1">
                        <div class="dot"></div>
                        <span>Diproses</span>
                    </label>

                    <input type="radio" name="select" class="trigger_change" value="2" id="option-2">
                    <label for="option-2" class="option option-2">
                        <div class="dot"></div>
                        <span>Selesai</span>
                    </label>

                    <input type="radio" name="select" class="trigger_change" value="9" id="option-9">
                    <label for="option-9" class="option option-9">
                        <div class="dot"></div>
                        <span>Ditolak</span>
                    </label>

                    
                </div>  
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("user/_template/foot");?>
  
</body>
</html>


<script>
    $(".btn_change_status").click(function(){
        var pengaduan_id = $(this).data('id_pengaduan')
        var pengaduan_status = $(this).data('pengaduan_status')

        $("#pengaduan_id").val(pengaduan_id)
        $('#modal_change_status').modal('show')
        $('.wrapper').find('#option-'+pengaduan_status).prop('checked', true);
    })

    // proses chnage status nya
    $('.trigger_change').change(function(){
        var val_status = $("input[type='radio'][name='select']:checked").val();
        var pengaduan_id = $('#pengaduan_id').val()
        // alert(pengaduan_id)
        $.ajax({
            url      : "<?=base_url('pengaduan/change_status') ?>",
            dataType : 'json',
            type     : 'post',
            data     : {
                pengaduan_id : pengaduan_id,
                val_status : val_status
            },
            success  : function(response){
                if(response.status == true){
                    $('#pesan_notifikasi').prepend(notifikasi('success', response.pesan));
                }else{
                    $('#pesan_notifikasi').prepend(notifikasi('danger', response.pesan));
                }

                if(response.url != ''){
                    window.location.replace(response.url);
                }
                
                // delete notif in 7 seconds
                setTimeout(
                    function(){
                    $('#pesan_notifikasi div').remove()
                }, 7000);
            }
        })

    })


    function notifikasi(type, string){
        var notifikasi = `
            <div class="control-group">
                <div class="alert alert-`+type+`">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>`+string+`</strong>
                </div>
            </div>`
        return notifikasi
    }
</script>
