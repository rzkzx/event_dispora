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
  <link href="<?= URLROOT; ?>/front/vendor/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= URLROOT; ?>/front/vendor/tata/tata.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/plugins/sweetalert2/sweetalert2.min.css" />

  <!-- Template Main CSS File -->
  <link href="<?= URLROOT; ?>/front/css/main.css" rel="stylesheet">

  <style>
    .avatar-upload {
      position: relative;
      max-width: 205px;
    }

    .avatar-upload .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }

    .avatar-upload .avatar-edit input {
      display: none;
    }

    .avatar-upload .avatar-edit label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid #d4d4d4;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all .2s ease-in-out;
    }

    .avatar-upload .avatar-edit label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit label i {
      color: #404258;
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }

    .avatar-preview {
      width: 180px;
      height: 180px;
      position: relative;
      border-radius: 100%;
      box-shadow: 0px 3px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-preview div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    /* edit-data-pendaftaran style */
    .edit-data-pendaftaran .file-input-group {
      border: 1px solid #2b2b2b;
      border-style: dashed;
      border-radius: 10px;
      padding: 10px;
    }

    .edit-data-pendaftaran .file-input-group .btn-input-group {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    /* flash alert styling */
    .alert-dismissible {
      position: relative;
    }

    .alert-dismissible button.close {
      background: none;
      border: none;
      font-weight: bold;
      font-size: 1.5rem;
      position: absolute;
      right: 1px;
      top: 0;
      color: #2b2b2b;
    }
  </style>
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
      <a href="<?= URLROOT ?>/beranda" class="logo d-flex align-items-center">
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
        <?php
        if (Middleware::isLoggedIn()) {
          if (Middleware::frontAuth()) {
        ?>
            <li class="dropdown pe-3">
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['nama'] ?></span>
              </a><!-- End Profile Iamge Icon -->
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= URLROOT; ?>/profil">
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= URLROOT; ?>/riwayat">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat Event</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= URLROOT; ?>/auth/logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                  </a>
                </li>
              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
          <?php
          } else {
          ?>
            <li><a href="<?= URLROOT; ?>/admin">Dashboard</a></li>
          <?php
          }
        } else {
          ?>
          <li><a href="<?= URLROOT; ?>/auth">Login</a></li>
        <?php
        }
        ?>

        </ul>
      </nav><!-- navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->