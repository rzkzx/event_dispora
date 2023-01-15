<?php require APPROOT . '/views/admin/inc/header.php'; ?>

<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
      <div class="page-header">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="title">
              <h4><?= $data['title'] ?></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= URLROOT; ?>/admin/">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?= URLROOT; ?>/admin/saran">Kritik dan Tanya</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $data['title'] ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <!-- Simple Datatable start -->
      <div class="card-box mb-30">
        <div class="pd-20 mb-10">
          <h4 class="text-blue h4">Detail Kritik dan Tanya</h4>
          <div class="">
            <a href="<?= URLROOT; ?>/admin/saran" class="btn btn-outline-dark btn-sm">
              Kembali
            </a>
          </div>
        </div>
        <div class="pb-20">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Nama Lengkap</h6>
              </div>
              <div class="col-6">
                <p><?= $data['saran']->nama ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Nomor Handphone</h6>
              </div>
              <div class="col-6">
                <p><?= $data['saran']->no_hp ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Email</h6>
              </div>
              <div class="col-6">
                <p><?= $data['saran']->email ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Pesan atau Pertanyaan</h6>
              </div>
              <div class="col-6">
                <p style="text-align: justify;">
                  <?= $data['saran']->pesan ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>