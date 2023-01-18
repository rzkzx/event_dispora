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
                  <a href="<?= URLROOT; ?>/admin/user/peserta">Akun Peserta</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $data['title'] ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <div class="card-box mb-30">
        <div class="pd-20 mb-10">
          <h4 class="text-blue h4">Detail Akun Peserta</h4>
        </div>
        <div class="pb-20">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Foto Profil</h6>
              </div>
              <div class="col-6">
                <img src="<?= URLROOT ?>/assets/images/user/<?= $data['peserta']->foto ?>" alt="foto user peserta" style="max-height:200px;max-width:200px;" />
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Nama Lengkap</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->nama ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Username</h6>
              </div>
              <div class="col-6">
                <p><?= $data['user']->username ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">NIK</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->nik ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Jenis Kelamin</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->jenis_kelamin ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Tempat Lahir</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->tempat_lahir ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Tanggal Lahir</h6>
              </div>
              <div class="col-6">
                <p><?= dateID($data['peserta']->tanggal_lahir) ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Alamat Domisili</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->alamat_dom ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Alamat KTP</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->alamat_ktp ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Pendidikan</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->pendidikan ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Pekerjaan</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->pekerjaan ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Nomor Handphone</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->no_hp ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>