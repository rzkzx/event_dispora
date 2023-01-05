<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $data['title'] ?> - Dinas Pemuda dan Olahraga Prov. Kalsel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?= URLROOT; ?>/front/img/logo/kalsel-small.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= URLROOT; ?>/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= URLROOT; ?>/front/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact - v1.1.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:dispora.provkalsel@gmail.com">dispora.provkalsel@gmail.com</a></i>
        <i class="bi bi-telephone d-flex align-items-center ms-4"><span>0511 - 3264511</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.youtube.com/@DISPORAPROVKALSELBERGERAK" class="youtube"><i class="bi bi-youtube"></i></a>
        <a href="https://www.instagram.com/dispora.provkalsel/" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?= URLROOT; ?>/front/img/logo/dispora-kalsel.png" alt="logo">
      </a>
      <!-- navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= URLROOT; ?>/beranda">Beranda</a></li>
          <li class="dropdown"><a href="#profil"><span>Tentang</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
          </li>
          <li><a href="<?= URLROOT; ?>/tentang">Sejarah Dinas</a></li>
          <li><a href="<?= URLROOT; ?>/tentang">Visi dan Misi</a></li>
          <li><a href="<?= URLROOT; ?>/tentang">Profil Kepala Dinas</a></li>
          <li><a href="<?= URLROOT; ?>/tentang">Struktur Organisasi</a></li>
        </ul>
        </li>
        <li class="dropdown"><a href="#event"><span>Event</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
        </li>
        <li><a href="<?= URLROOT; ?>/event">Event Umum</a></li>
        <li><a href="<?= URLROOT; ?>/event/khusus">Event Khusus</a></li>
        </ul>
        </li>
        <li><a href="<?= URLROOT; ?>/beranda#contact">Kontak</a></li>
        <li><a href="login.html">Login</a></li>
        </ul>
      </nav><!-- navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->