<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?>    

<!-- SIGN UP FORM START -->
        <section class="sign-up-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form method="post" controller="<?=site_url('auth')?>" action="login" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="sign-up-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign-up-title">
                                            <h3>Selamat Datang</h3>
                                            <p>Silahkan Login Dengan Akun Kamu Untuk Melanjutkan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" id="notifikasi_email">
                                            <input type="email" name="email" id="email" class="form-control" required
                                                data-error="Please enter email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="notifikasi_password">
                                            <input class="form-control" id="password" type="password" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <input checked="true" type="checkbox">
                                            Tetap terhubung
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-secondary">
                                            Masuk Sekarang
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <p class="account-desc">
                                            Tidak punya akun?
                                            <a href="<?=site_url("registrasi")?>">Registrasi Disini</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="image">
                            <img src="<?=base_url()?>assets/img/register/1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SIGN UP PAGE START -->
<?php $this->load->view("_template/foot.php"); ?>    
