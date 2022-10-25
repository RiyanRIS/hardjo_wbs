<!-- FOOTER START -->

 <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-content align-items-center text-center">
                            <p>Copyright © 2022 <a href="#">INFOLAHTA RSPAU dr. S. HARDJOLUKITO</a>
                            </p>
                           <!--  <div class="footer-link d-md-flex text-center">
                                <a href="#">Terms & Condition</a>
                                <a href="#">Privacy Policy</a>
                                <a href="#">Cookies</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- FOOTER END -->

      
        <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="//rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.fancybox.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.nice-select.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.countup.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.waypoints.js"></script>
        <script src="<?=base_url()?>assets/js/coreNavigation-1.1.3.min.js"></script>
        <script src="<?=base_url()?>assets/js/popper.min.js"></script>
        <script src="<?=base_url()?>assets/js/script.js"></script>

        <script>
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
            
  $('#myForm, #myForm1, #myForm2, #myForm3').submit(function(e){
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
                                $.notify(value, "danger");
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

    </body>


    </html>