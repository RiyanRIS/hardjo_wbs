<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?>    

<div class="banner">
    <a href="<?=site_url('buat')?>">
        <img src="assets/img/banner/1.jpg" alt="WBS RSPAU dr. S. Hardjolukito">
    </a>
</div>

       <?php $this->load->view("bagian/selamatdatang")?>
       <?php $this->load->view("bagian/kriteria")?>
       <?php $this->load->view("bagian/tatacara")?>
       <?php $this->load->view("bagian/jenis")?>
       <?php $this->load->view("bagian/alur")?>
       <?php $this->load->view("bagian/kontak")?>

<?php $this->load->view("_template/foot.php"); ?>    
       