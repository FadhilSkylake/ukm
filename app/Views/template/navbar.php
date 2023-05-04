<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UKM UNSUB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url(); ?>/front/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url(); ?>/front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/front/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url(); ?>/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url(); ?>/front/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
        <i class="fa fa-laptop-code fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
    </div>
    <!-- Spinner End -->


    <!-- Brand & Contact Start -->
    <div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="fw-bold text-primary m-0">
                        <img src="<?= base_url(); ?>/images/unsub.png" alt="" width="50" height="50">
                        </i>Unit Kegiatan Mahasiswa Universitas Subang
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
            </div>
            <!-- isi -->
        </div>
    </div>
    <!-- Brand & Contact End -->

    <div class="sticky-top">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
            <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto p-3 p-lg-0">
                    <a href="/home" class="nav-item nav-link">Home</a>
                    <a href="https://unsub.ac.id/" class="nav-item nav-link" target="_blank" rel="nofollow" title="Website Universitas Subang">Universitas Subang</a>
                    <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> -->
                    <a href="/formpendaftaran" class="nav-item nav-link">Daftar ke UKM</a>
                </div>
                <a href="/login" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Administrator</a>
            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Topbar Start -->
        <div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="row gx-0 align-items-center d-none d-lg-flex">
                <div class="col-lg-6 px-5 text-start">
                    <i class="fab fa-whatsapp-square"></i> <a class="small text-secondary" href="http://wa.me/6281221790705" target="_blank">Whatsapp</a></li>
                </div>
                <div class="col-lg-6 px-5 text-end">
                    <small>Follow us:</small>
                    <div class="h-100 d-inline-flex align-items-center">
                        <a class="btn-square text-primary border-end rounded-0" href="https://www.facebook.com/pages/Universitas-Subang/475343979280098" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn-square text-primary pe-0" href="https://www.instagram.com/unsub.official/" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->