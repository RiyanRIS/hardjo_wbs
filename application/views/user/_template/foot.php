</div>

<footer class="main-footer">
<div class="float-right d-none d-sm-block">
<b>Version</b> 3.2.0
</div>
<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="//rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
// $.notify("Hello World", "success");
<?php

if($this->session->flashdata('msg')){
    $pesan = $this->session->flashdata('msg');
    if($pesan[0] == 1){ ?>
        $.notify('<?=$pesan[1]?>', "success");
    <?php } else { ?>
        $.notify('<?=$pesan[1]?>', "danger");
<?php
    }
}
?>

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
