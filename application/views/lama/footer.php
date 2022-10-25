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

<!-- Dropzone Plugin Js -->
<script src="<?= base_url('assets/plugins/dropzone/dropzone.js');?>"></script>

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
<script type="text/javascript">
    $(document).ready(function(){
 
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>pengaduan/simpan_pengaduan',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Berhasil.");
                   }
                 });
            });
         
 
    });
     
</script>
<script>
    // Add restrictions
    Dropzone.autoDiscover = false;

var file= new Dropzone(".dropzone",{
url: "<?php echo base_url('pengaduan/simpan_pengaduan') ?>",
maxFilesize: 5,
maxFiles: 1,
method:"post",
acceptedFiles:".zip,image/*",
paramName:"userfile",
dictInvalidFileType:"Jenis file ini tidak dizinkan",
addRemoveLinks:true,
/* autoProcessQueue:true,
ProcessQueue:true, */

});

/* $('#submit').click(function() {
    var myDropzone = Dropzone.forElement(".dropzone");
    myDropzone.processQueue();
    myDropzone.autoProcessQueue();
}); */

    </script>
<script>
    document.getElementById("centeralign-textbox").style.textAlign = "center";
</script>
</body>

</html>
