<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?> 
<style>
  .contact-form .text-select{
    font-family: "Inter";
    font-size: 14px;
    color: #373737;
    font-weight: 300;
    width: 100%;
    padding: 0px 15px;
    outline: none;
    border: 1px solid #b7b7b7;
    margin-top: 30px;
    border-radius:0px;
  }

  .nice-select span{
    color: #373737;
    font-weight: 300;
  }

  .nice-select ul.list {
    width:100%;
  }
</style>
<section class="service-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-page-title">
                            <h3>BUAT PENGADUAN</h3>
                            <p class="text-18">Berikut ini adalah formulir pengaduan aplikasi WBS RSPAU dr. S. Hardjolukito</p>
                        </div>
                    </div>
                <div class="col-12">
            <div class="alert alert-primary kekanan" role="alert">
                Anda melihat atau mengetahui dugaan Pelanggaran yang dilakukan pegawai RSPAU dr. S. Hardjolukito. Silahkan melapor. Jika laporan anda memenuhi syarat/kriteria, maka akan diproses lebih lanjut.
            </div>
                <form method="post" controller="<?=site_url('depan')?>" action="buat" id="myForm22" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-form">
                        <select name="pengaduan_jenis" id="pangaduan_jenis" class="text-select" required="true">
                            <option value="" selected="selected">--- Pilih Jenis Pelanggaran ---</option>
                            <option value="1">Bantuan Masyrakat</option>
                            <option value="2">Pemungutan Liar</option>
                            <option value="3">petugas tidak ramah</option>
                            <option value="4">Tindakan KKN</option>
                            <option value="5">Infrastruktur tidak baik</option>
                            <option value="6">Layanan Kesehatan</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                          <input class="text" name="pengaduan_nama_terlapor" id="pengaduan_nama_terlapor" placeholder="Nama Terlapor*" autocomplete="off" required="true" autofocus="true">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-form">
                          <input class="text" name="pengaduan_lokasi" id="pengaduan_lokasi" placeholder="Lokasi Kejadian*" autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                          <input class="text" name="pengaduan_tanggal" id="pengaduan_tanggal" placeholder="Tanggal Perkiraan Kejadian*" autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                          <input class="text" name="pengaduan_waktu" id="pengaduan_waktu" placeholder="Waktu Perkiraan Kejadian*" autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-form">
                          <textarea name="pengaduan_deskripsi" id="pengaduan_deskripsi" cols="10" rows="5" required="true" class="text" placeholder="Tulis aduan anda disini...."></textarea>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div class="contact-form">
                        <input type="file" class="text" name="pengaduan_berkas[]" multiple="true" placeholder="Subjek Aduan" autocomplete="off" required="true">
                        <span style="color: #373737;font-weight: 300;">.jpg .png .jpeg .zip .pdf</span>
                        </div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="contact-form">
                        <input type="file" class="text" name="pengaduan_berkas" placeholder="Subjek Aduan" autocomplete="off" required="true">
                        <span style="color: #373737;font-weight: 300;">.jpg .png .jpeg .zip .pdf</span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="contact-form" style="padding-top: 30px;">
                      <div class="submit-btn">
                        <button class="btn" type="submit"><i class="fas fa-paper-plane"></i> Kirim Pengaduan</button>
                      </div>
                      </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </section>

<?php $this->load->view("_template/foot.php"); ?>   

<script>
  $('#myForm22').submit(function(e){
        e.preventDefault()
        var dataToSend  = new FormData(this)
        var formId = $(this)
        var action = $(formId).attr('action')
        var controller = $(formId).attr('controller')

        $.ajax({
            url      : controller+'/action/'+action,
            dataType : 'json',
            type     : 'post',
            data     : dataToSend,
            processData :false,
            contentType :false,
            cache       :false,
            beforeSend:function(){
                $('#loading').show()
            },
            complete:function(){
                $('#loading').hide()
            },
            success  : function(data){
                // console.log(data)
                // $('#pesan_notifikasi div').remove()
                $('.invalid-feedback').remove()
                $('.is-invalid').removeClass('is-invalid');

                if(typeof(data.file) != "undefined" && data.file !== null){
                    if(data.file == false){
                        $.each(data.error_file, function(key, value){
                            $('#'+key).addClass('is-invalid')
                            $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                        })
                    }else{
                        $.each(data.error_file, function(key, value){
                            $('#'+key).removeClass('is-invalid')
                            $('#notifikasi_'+key).append('')
                        })
                    }
                }else{
                    if(data.status){
                        window.location.replace(data.url);
                    }else{
                        if(data.errors){
                            $.each(data.errors, function(key, value){
                                $('#'+key).addClass('is-invalid')

                                Swal.fire({
        title: 'Terjadi kesalahan!',
        text: value,
        icon: 'error',
        confirmButtonText: 'Ok'
      })
                                // $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{

                            if(data.status == false){
                                $.confirm({
                                    title: 'errors',
                                    content: 'Terjadi kesalahan sistem, silahkan coba kembali',
                                    type: 'red',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Oke',
                                            btnClass: 'btn-red',
                                            action: function(){
                                                $('#loading').hide()
                                            }
                                        },
                                        close: function () {
                                                $('#loading').hide()
                                        }
                                    }
                                });
                            }
                            $.each(data.errors, function(key, value){
                                $('#'+key).removeClass('is-invalid')
                                $('#notifikasi_'+key).append('')
                            })
                        }
                        $('html,body').animate({scrollTop: $('body').offset().top},'fast');
                    }
                }
            }
        })
    })
</script>
