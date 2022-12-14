<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta
        content="Wisata jogja murah,  reholtransport, rehol, sewa mobil, sewa mobil murah jogja, rehol sewa mobil, wisata rehol, wisata murah, jasa antar jemput, travel agen jogja, sewa mobil bandara "
        name="keywords">
    <meta
        content="REHOL TRANSPORT menyediakan layanan Paket Wisata , Sewa Mobil dan Informasi Wisata. Kami memiliki tarif standar dan ramah di kantong, sehingga kalian bisa merasakan liburan bersama kami, dengan guide dan driver yang ramah dan berkualitas."
        name="description">
    <meta name="author" content="Luthfi, Jaxid, Ajax, Luthfi website, Ach Luthfi Imron Juhari">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon/favicon.ico'); ?>">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Jockey+One" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/cust/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/cust/') ?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/cust/') ?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>reholtransport.jogja@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+62 811 255 661</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" target="_blank"
                            href="https://www.facebook.com/PaketWisataJogjaKita/">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" target="_blank"
                            href="https://www.instagram.com/wisatajogja_reholtransport/">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="<?= base_url(''); ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/slide/'); ?>logo.png" alt="" width="120" height="50"
                        class="d-inline-block align-text-top">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="<?= base_url(); ?>" class="nav-item nav-link">Home</a>
                        <a href="<?= base_url(); ?>#about" class="nav-item nav-link">Tentang</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layanan</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="<?= base_url('hero/paket'); ?>" class="dropdown-item">Paket Wisata</a>
                                <a href="<?= base_url('hero/bookingmobil'); ?>" class="dropdown-item">Sewa Mobil</a>
                                <a href="<?= base_url('hero/destination'); ?>" class="dropdown-item">Destinasi Wisata
                                </a>
                            </div>
                        </div>
                        <a target="_blank" href="https://blog.reholtransport.com/" class="nav-item nav-link">Blog</a>
                        <a href="<?= base_url(); ?>#contact" class="nav-item nav-link">Kontak</a>
                        <a href="<?= base_url('hero/reviews'); ?>#contact" class="nav-item nav-link">Penilaian</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->