<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?>    

<!-- SIGN UP FORM START -->

<section class="sign-up-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                    <form method="post" controller="<?=site_url('auth')?>" action="register" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="sign-up-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign-up-title">
                                            <h3>Daftarkan diri anda sekarang</h3>
                                            <p>Kami menjaga semua informasi yang anda berikan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group" id="notifikasi_user_name">
                                            <input type="text" name="user_name" class="form-control" required data-error="Please enter your Name" placeholder="Name" id="user_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group" id="notifikasi_user_email">
                                            <input type="email" name="user_email" class="form-control" required
                                                data-error="Please enter email" placeholder="Email Address" id="user_email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="notifikasi_user_password">
                                            <input class="form-control" type="password" name="user_password"
                                                placeholder="Password" id="user_password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="notifikasi_password2">
                                            <input class="form-control" type="password" name="password2"
                                                placeholder="Confirm Password" id="password2">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="notifikasi_user_nohp">
                                            <input class="form-control" type="tel" name="user_nohp" placeholder="Phone" id="user_nohp">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-secondary">
                                            Registrasi Sekarang
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            Sudah memiliki akun?
                                            <a href="<?=site_url('login')?>">Masuk Disini</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="image">
                            <img src="assets/img/register/1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SIGN UP PAGE START -->

<?php $this->load->view("_template/foot.php"); ?>


