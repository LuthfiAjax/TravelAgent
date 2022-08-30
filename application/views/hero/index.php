<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('assets/cust/') ?>img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                        <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?= base_url('assets/cust/') ?>img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                        <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div id="about" class="container-fluid py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100"
                        src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit19201280gsm/events/2021/04/17/6dc3580a-9575-40dd-9a27-3a35956856ff-1618594374684-63d07b695cbdd15bf4bb8b4a4766062c.jpg"
                        style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                    <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                    <p class="text-justify">REHOL TRANSPORT menyediakan layanan Paket Wisata Jogja, Sewa Mobil dan
                        Informasi wisata di Jogja.
                        Rasakan Petualangan (adventure) di Jogja bersama kami, pastikan liburan anda bersama guide dan
                        driver yang ramah dan berkualitas.</p>
                    <p class="text-justify">
                        Layanan kami yang profesional dan ramah akan memastikan anda memiliki liburan yang memuaskan dan
                        pengalaman yang tidak terlupakan bersama orang terdekat.
                    </p>
                    <p class="text-justify">
                        Rehol Transport telah berpengalaman dalam bidang pariwisata, telah melayani wisatawan domestik
                        dan wisatawan mancanegara dari berbagai belahan dunia.
                    </p>
                    <p class="text-justify">
                        Standar layanan tinggi kami telah terbukti memberikan kepuasan bagi Traveller yang telah
                        dilayani secara istimewa oleh staff, Driver, Tour Guide dan semua kami persiapkan dengan baik
                        demi kenyamanan dan kepuasan selama trip di Jogja.</p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid h-100"
                                src="https://c4.wallpaperflare.com/wallpaper/644/828/996/the-sun-rays-light-island-wallpaper-preview.jpg"
                                alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid h-100"
                                src="https://c1.wallpaperflare.com/preview/347/286/516/prambanan-indonesia-temple-candy.jpg"
                                alt="">
                        </div>
                    </div>
                    <a target="_blank"
                        href="https://api.whatsapp.com/send/?phone=6287717445647&text&type=phone_number&app_absent=0"
                        class="btn btn-primary mt-1"><i class="fab fa-whatsapp"></i> Info Selengkapnya!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid pb-5">
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                        style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-money-check-alt text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Competitive Pricing</h5>
                        <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                        style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-award text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Best Services</h5>
                        <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                        style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-globe text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Worldwide Coverage</h5>
                        <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

<!-- Service Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
            <h1>Destination & Travel Services</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item bg-white text-center mb-2 py-5 px-4">
                    <a class="text-decoration-none" href="<?= base_url('hero/destination'); ?>">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Destination</h5>
                    </a>
                    <p class="m-0">Kamu Bisa melihat dan merasakan indahnya destinasi wisata Indonesia dengan Kami,
                        ayo berpetualang..</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item bg-white text-center mb-2 py-5 px-4">
                    <a class="text-decoration-none" href="<?= base_url('hero/paket'); ?>">
                        <i class="fa fa-2x fa-globe-asia mx-auto mb-4"></i>
                        <h5 class="mb-2">Packages Traveling</h5>
                    </a>
                    <p class="m-0">Membuat Travelingmu lebih mudah dengan memilih paket Traveling dari kami</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item bg-white text-center mb-2 py-5 px-4">
                    <a class="text-decoration-none" href="<?= base_url('hero/bookingmobil'); ?>">
                        <i class="fa fa-2x fa-car mx-auto mb-4"></i>
                        <h5 class="mb-2">Car Booking</h5>
                    </a>
                    <p class="m-0">Kami siap mengantarkanmu ke penjuru Indonesia, pasti aman, pasti nyaman...</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Destination Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
            <h1>Explore Top Destination</h1>
        </div>
        <div class="row">
            <?php foreach($destinasi as $d) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img width="400" height="200" src="<?= base_url('assets/destination/'.$d['gambar_w']); ?>" alt="">
                    <a class="destination-overlay text-white text-decoration-none"
                        href="<?= base_url('hero/detail_destinasi/'.$d['id_wisata']); ?>">
                        <h5 class="text-white"><?= $d['nama_wisata']; ?></h5>
                        <span><?= $d['nama_lokasi']; ?></span>
                    </a>
                </div>
            </div>
            <br>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url('hero/destination/'); ?>" class="btn btn-primary mt-1"><i class="fab fa-buffer"></i>
            Check more destination</a>
    </div>
</div>
<!-- Destination Start -->


<!-- Packages Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
            <h1>Top Tour Packages</h1>
        </div>
        <div class="row">
            <?php foreach($paket as $p) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <a class="h5 text-decoration-none" href="<?= base_url('conpak/detail_paket/'.$p['id_paket']); ?>">
                        <img style="height: 200px; width: 350px;" class="img-fluid"
                            src="<?= base_url('assets/paket/'.$p['gambar_p']) ?>" alt="">
                    </a>
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i
                                    class="fas fa-book-reader text-primary mr-2"></i><?= $p['nama_kategori']; ?></small>

                            <small class="m-0"><i class="fa fa-user text-primary mr-2"></i><?= $p['orang']; ?>
                                Person</small>
                        </div>
                        <a class="h5 text-decoration-none"
                            href="<?= base_url('conpak/detail_paket/'.$p['id_paket']); ?>"><?= $p['nama_paket']; ?></a><br>
                        <div class="border-top mt-4 pt-4">
                            <small class="mt-3"><i class="fa fa-calendar-alt text-primary mr-2"></i><?= $p['durasi']; ?>
                                days</small>
                            <div class="d-flex justify-content-between">
                                <h5 class="m-0"><?= rupiah($p['harga']); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url('hero/paket/'); ?>" class="btn btn-primary mt-1"><i class="fab fa-buffer"></i>
            Check more Packages</a>
    </div>
</div>
<!-- Packages End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
            <h1>What Say Our Clients</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php foreach($testimoni as $t) : ?>
            <div class="text-center pb-4">
                <img class="img-fluid mx-auto" src="<?= base_url('assets/testimoni/'.$t['gambar_t']) ?>"
                    style="width: 100px; height: 100px;">
                <div class="testimonial-text bg-white p-4 mt-n5">
                    <p class="mt-5"><?= $t['pesan']; ?>
                    </p>
                    <h5 class="text-truncate"><?= $t['nama']; ?></h5>
                    <span><?= $t['profesi']; ?></span>
                    <span>
                        <p><?= $t['medsos']; ?> : <?= $t['akun']; ?></p>
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Contact Start -->
<div id="contact" class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
            <h1>Contact For Any Query</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div id="success"></div>
                    <form method="POST" action="<?= base_url('tampilan/pesan'); ?>">
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                    name="nama" required="required"
                                    data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <input type="email" class="form-control p-4" id="email" placeholder="Your Email"
                                    name="email" required="required"
                                    data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                name="subject" required="required"
                                data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message"
                                name="Message" required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->