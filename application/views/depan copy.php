<?php
$url_login = site_url("login");

if($this->session->userdata('isLogin')){
  $url_login = site_url("pengaduan");
}

?>

<?php $this->load->view("_template/head.php"); ?>

<?php $this->load->view("_template/atas.php"); ?>    

        <!-- BANNER START -->

        <div class="banner">
            <img src="assets/img/banner/1.jpg" alt="WBS RSPAU dr. S. Hardjolukito">
        </div>

        <!-- Slider section end -->


        <!-- APPOINTMENT START -->

        <section class="appointment-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="appointment-title text-center">
                            <h2>Selamat Datang di <span>Whistle Blowing System</span></h2>
                            <h3>RSPAU dr. S. HARDJOLUKITO</h3>
                            <p style="font-size: 18px;">
                                <b>Whistleblowing System (WBS)</b> adalah sistem pelaporan pelanggaran yang terjadi di lingkungan pekerjaan dan melibatkan peran serta seluruh personel dalam proses pelaporan dan pengungkapannya.
                                WBS merupakan bagian dari sistem pengendalian internal dalam mencegah praktik penyimpangan dan kecurangan serta memperkuat penerapan Good Corporate Governance (GCG).
                                Anda tidak perlu khawatir terungkapnya identitas diri Anda karena RSPAU dr. S. Hardjolukito akan <b>MERAHASIAKAN IDENTITAS DIRI ANDA</b>.
                                RSPAU dr. S. Hardjolukito menghargai informasi yang Anda laporkan. Fokus kami kepada materi informasi yang Anda laporkan.
                            </p>
                            <!-- <div class="section-btn">
                                <a href="javascript:void(0);" class="apointment-btn btn-secondary-filled btn btn-secondary">TATA CARA PENGADUAN<i
                                class="ti-angle-double-down"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="service-section" style="padding-top:0px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>Tata cara <span>Pengaduan</span> </h2>
                            <p style="font-size: 18px;text-align: left;">
                            Tata cara pengaduan melalui aplikasi WBS RSPAU dr. S. Hardjolukito sebagai berikut: </p>
                            <ol style="font-size: 18px;text-align: left;padding-left: 40px;font-weight: 300">
                            <li>Terlebih dahulu periksa kelengkapan pengaduan meliputi: jenis penyimpangan, terdapat penjelasan dimana, kapan kejadian tersebut terjadi, terdapat nama pejabat / pegawai RSPAU dr. S. HARDJOLUKITO yang melakukan atau terlibat penyimpangan, kronologis atau cara kejadian tersebut dilakukan, dilengkapi dengan bukti (dokumen, gambar atau rekaman yang mendukung kejadian tersebut).</li>
                            <br/>
                            <li>Jika pengaduan tersebut telah lengkap, tahap berikutnya adalah klik tombol Masuk / Daftar untuk mendaftarkan akun Saudara dengan melengkapi data-data seperti Nama, Nomor Hp dan Alamat Email yang masih aktif.</li>
                            <br/>
                            <li>Kemudian langkah selanjutnya adalah Buat Pengaduan, dengan melengkapi data, subjek pengaduan, jenis pengaduan, deskripsi pengaduan serta melampirkan bukti-bukti bisa berupa foto atau dokumen lainnya.</li>
                            <br/>
                            <li>Saudara dapat memantau pengaduan yang pernah dikirim dan membuat pengaduan baru melalui halaman akun Saudara dengan Masuk terlebih dahulu.</li>
                            <br/>
                            <li>Kami tidak meminta data pribadi yang berhubungan dengan Saudara secara langsung kecuali jika tindak lanjut dari pengaduan tersebut membutuhkan data pribadi Saudara.</li>
                            </ol>
                            <br/>
                            <p style="font-size: 18px;text-align: left;">
                            Sebagai bentuk terimakasih kami terhadap laporan yang Saudara kirim, kami berkomitmen untuk merespon laporan Saudara selambat-lambatnya 7 (tujuh) hari kerja sejak laporan dikirim.
                            </p>
                            <div class="section-btn">
                                <a href="<?=$url_login?>" class="apointment-btn btn btn-secondary">BUAT PENGADUAN <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- APPOINTMENT END -->

        <!-- SERVICE START -->

        <section class="service-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>Jenis <span>Pelanggaran</span> </h2>
                            <p>
                                Laporkan segala kegiatan yang berindikasi pelanggaran di lingkungan RSPAU dr. S. Hardjolukito. Bentuk materi pelanggaran yang dilaporkan:
                            </p>
                            <div class="section-border">
                                <div class="icon">
                                    <i class="fas fa-tint"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 col-sm-6">
                        <div class="item-block-01 text-center">
                            <div class="item-content">
                                <div class="icon">
                                    <span class="xicon-hand color-icon"></span>
                                </div>
                                <h5><a href="#">Bantuan Masyarakat</a></h5>
                                <p>
                                    Pengaduan mengenai bantuan masyarakat
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item-block-01 text-center">
                            <div class="item-content">
                                <div class="icon">
                                    <span class="xicon-medical-book color-icon"></span>
                                </div>
                                <h5><a href="#">Pemungutan Liar</a></h5>
                                <p>
                                    Pengaduan mengenai pemungutan liar
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item-block-01 text-center">
                            <div class="item-content">
                                <div class="icon">
                                    <span class="xicon-stethoscope1 color-icon"></span>
                                </div>
                                <h5><a href="#">Layanan Kesehatan</a></h5>
                                <p>
                                    Pengaduan mengenai layanan kesehatan
                                </p>
                                
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-4 col-sm-6">
                        <div class="item-block-01 text-center">
                            <div class="item-content">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <h5><a href="#">Tindakan KKN</a></h5>
                                <p>
                                    Pengaduan mengenai tindakan Korupsi, Kolusi dan Nepotisme
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item-block-01 text-center">
                            <div class="item-content">
                                <div class="icon">
                                    <span class="xicon-hospital color-icon"></span>
                                </div>
                                <h5><a href="#">Infrastruktur Tidak Baik</a></h5>
                                <p>
                                    Pengaduan mengenai infrastruktur yang tidak baik
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item-block-01 text-center">
                            <div class="item-content">
                                <div class="icon">
                                    <span class="xicon-mind color-icon"></span>
                                </div>
                                <h5><a href="#">Petugas Tidak Ramah</a></h5>
                                <p>
                                    Pengaduan mengenai petugas yang tidak ramah
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICE END -->

        <!-- ABOUT SECTION START -->

        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-2">
                            <h2>Frequently <span>Asked</span> Questions</h2>
                            <p>
                                Pertanyaan yang sering diajukan 
                            </p>
                            <div class="section-border">
                                <div class="icon">
                                    <i class="fas fa-tint"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="item-block-06">
                            <div class="item-content d-flex text-right">
                                <div class="icon ">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class=" ">
                                    <h6><a href="faq1.html">Apa saja yang disebut dengan perbuatan dugaan tindak pidana korupsi?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-block-06">
                            <div class="item-content d-flex text-right">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan perbuatan merugikan keuangan Negara?</a></h6>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="item-block-06">
                            <div class="item-content d-flex text-right">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan suap menyuap?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-block-06">
                            <div class="item-content d-flex text-right">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan korupsi yang berhubungan dengan kecurangan (perbuatan curang)?</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="item-block-06">
                            <div class="item-content d-flex text-left">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan penyalahgunaan/penggelapan dalam jabatan?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-block-06">
                            <div class="item-content d-flex text-left">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan pemerasan?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-block-06">
                            <div class="item-content d-flex text-left">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan gratifikasi?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-block-06">
                            <div class="item-content d-flex text-left">
                                <div class="icon">
                                    <span class="xicon-chat-bubble color-icon"></span>
                                </div>
                                <div class="">
                                    <h6><a href="#">Apa yang dimaksud dengan korupsi yang berhubungan dengan konflik kepentingan?</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ABOUT SECTION END -->

        <!-- GALLERY SECTION START -->

        <section class="gallery-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-3">
                            <h2>Alur <span>Pengaduan</span></h2>
                            <p>
                                Alur Proses Penanganan Laporan WBS 
                            </p>
                            <div class="section-border">
                                <div class="icon">
                                    <i class="fas fa-tint"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="item-block-01">
                            <a data-fancybox="gallery" href="assets/img/alur-wbs.jpg"><center>
                                <img src="assets/img/alur-wbs.jpg" style="width: 50%;" alt="Alur WBS"></center>
                                <div class="overlay">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>

        <!-- GALLERY SECTION END -->

        <!-- CONTACT SECTION START -->


        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-top-bar-side d-flex">
                            <div class="">
                                <i class="fas fa-info"></i>
                            </div>
                            <h4 style="color: white;">
                                IDENTITAS ANDA DIJAMIN KERAHASIAANNYA
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-top-bar d-lg-flex align-items-center text-md-right text-center">
                            <div class="icon ml-auto">
                                <a href="https://www.facebook.com/rspau.hardjolukito" data-toggle="tooltip" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://twitter.com/RspauH" data-toggle="tooltip" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/hardjo_insta/" data-toggle="tooltip" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://rspauhardjolukito.co.id/" data-toggle="tooltip" title="Website RS" target="_blank"><i class="fas fa-globe-asia"></i></a>
                            </div>
                            <div class="bttn ">
                                <a href="<?=$url_login?>" class="btn btn-secondary-filled"></i>BUAT PENGADUAN<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
               
                <hr>
            </div>
        </section>


        <!-- CONTACT SECTION END -->

<?php $this->load->view("_template/foot.php"); ?>    
       