<?php require APPROOT . '/views/layouts/header.php'; ?>


<main id="main">

  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('https://dispora-kalsel.id/assets/frontend/img/banner-1/bg.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2><?= $data['title'] ?></h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="<?= URLROOT ?>/beranda">Home</a></li>
          <li><a href="<?= URLROOT ?>/riwayat">Riwayat Event</a></li>
          <li><a href="<?= URLROOT ?>/riwayat/detail/<?= $data['event']->id ?>">Data Pendaftaran Event</a></li>
          <li><?= $data['title'] ?></li>
        </ol>
      </div>
    </nav>
  </div>

  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="service-item  position-relative">
              <div class="image">
                <img src="<?= URLROOT; ?>/assets/images/event/<?= $data['event']->cover ?>" alt="img" class="img-fluid" style="max-width:100%;height:100%;object-fit:cover;">
              </div>
              <h3><br> <?= $data['event']->nama ?> </h3>
              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href="#"> &nbsp;<?= $data['event']->lokasi ?></a></li>
                </ul>
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-calendar-event"></i> <a href="#"><time datetime="2020-01-01"> &nbsp;<?= dayID($data['event']->tanggal) ?>, <?= dateID($data['event']->tanggal) ?></time></a></li>
                </ul>
              </div><!-- End meta top -->
              <p style="text-align:justify;"><?php echo (strlen($data['event']->deskripsi) > 90) ? substr($data['event']->deskripsi, 0, 90) . "..." : $data['event']->deskripsi; ?></p>
              <a href="<?= URLROOT; ?>/event/detail/<?= $data['event']->id ?>" class="readmore stretched-link" title="Detail">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Blog Sidebar -->
        </div>
        <div class="col-lg-8">
          <div class="sidebar">
            <div class="text-center mb-4 text-uppercase">
              <h4 style="font-weight:bolder;">Data Pendaftaran Event</h4>
              <hr>
            </div>
            <div class="container">
              <?php flash() ?>
              <div class="row">
                <div class="col">
                  <h6><b>Nama Lengkap</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->nama ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>NIK</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->nik ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Jenis Kelamin</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->jenis_kelamin ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Asal Daerah</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->asal_daerah ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Tempat Lahir</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->tempat_lahir ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Tanggal Lahir</b></h6>
                </div>
                <div class="col">
                  <p><?= dateID($data['peserta']->tanggal_lahir) ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Alamat KTP</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->alamat_ktp ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Alamat Domisili</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->alamat_dom ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Pendidikan</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->pendidikan ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Pekerjaan</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->pekerjaan ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Email</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->email ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h6><b>Nomor Handphone</b></h6>
                </div>
                <div class="col">
                  <p><?= $data['peserta']->no_hp ?></p>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                  <h6><b>Identitas</b></h6>
                </div>
                <div class="col">
                  <?php
                  if ($data['peserta']->upload_identitas) {
                    echo '<a href="' . URLROOT . '/assets/file/identitas/' . $data['peserta']->upload_identitas . '">' . $data['peserta']->upload_identitas . '</a>';
                  } else {
                    echo '<p class="text-danger">Tidak ada berkas identitas</p>';
                  }
                  ?>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                  <h6><b>Syarat</b></h6>
                </div>
                <div class="col">
                  <?php
                  if ($data['peserta']->berkas_syarat) {
                    echo '<a href="' . URLROOT . '/assets/file/syarat/' . $data['peserta']->berkas_syarat . '">' . $data['peserta']->berkas_syarat . '</a>';
                  } else {
                    echo '<p class="text-danger">Tidak ada berkas syarat</p>';
                  }
                  ?>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <h6><b>Status</b></h6>
                </div>
                <div class="col">
                  <?php
                  if ($data['peserta']->status == 'menunggu') {
                    $badge = 'warning';
                  } elseif ($data['peserta']->status == 'diterima') {
                    $badge = 'success';
                  } else {
                    $badge = 'danger';
                  }
                  ?>
                  <span class="badge rounded-pill bg-<?= $badge ?> text-dark text-uppercase"><?= $data['peserta']->status ?></span>
                </div>
              </div>
              <div class="mt-4">
                <?php
                if ($data['event']->aktif) {
                  echo '<a href="' . URLROOT . '/riwayat/detail/' . $data['event']->id . '/edit/' . $data['peserta']->id . '" class="btn btn-warning">Edit Data Pendaftaran</a>';
                }
                ?>
              </div>
            </div>
          </div><!-- End Blog Sidebar -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->


<?php require APPROOT . '/views/layouts/footer.php'; ?>