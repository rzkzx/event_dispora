<?php require APPROOT . '/views/layouts/header.php'; ?>


<main id="main">

  <!-- ======= Breadcrumbs ======= -->
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
          <li><a href="<?= URLROOT ?>/event<?php echo ($data['event']->jenjang == 'Khusus') ? '/khusus' : ''; ?>">Event <?= $data['event']->jenjang ?></a></li>
          <li><?= $data['title'] ?></li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <section id="event-detail" class="event">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <article class="event-details">
          <div class="row g-0">
            <div class="col-6 col-md-4 post-img">
              <img src="<?= URLROOT ?>/assets/images/event/<?= $data['event']->cover ?>" alt="<?= $data['event']->nama ?>" class="img-fluid">
            </div><!-- End post img -->

            <div class="col-sm-6 col-md-8 judul">
              <?php
              if (!$data['event']->aktif) {
              ?>
                <a href="#" class="btn btn-danger px-4">Event telah berakhir</a>
                <?php
              } else {
                if (Middleware::isLoggedIn()) {
                  if ($data['event']->jenjang == 'Umum') {
                    if ($_SESSION['level'] == 'peserta') {
                      echo '<a href="<?= URLROOT ?>/event/pendaftaran/' . $data['event']->id . '" class="btn btn-warning px-4">Daftar Event</a>';
                    }
                  } else {
                    if ($_SESSION['level'] == 'panitia') {
                      echo '<a href="<?= URLROOT ?>/event/pendaftaran/' . $data['event']->id . '" class="btn btn-warning px-4">Daftar Event</a>';
                    }
                  }
                } else {
                ?>
                  <a href="<?= URLROOT ?>/auth" class="btn btn-warning px-4">Daftar Event</a>
              <?php
                }
              }
              ?>
              <h2 class="title"><?= $data['event']->nama ?></h2>
              <div class="meta-top d-flex" style="justify-content: space-between;font-weight:bold;">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-circle-fill"></i> <a href="#"><?= $data['event']->jenis ?></a></li>
                </ul>
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href="#"><?= $data['event']->lokasi ?></a></li>
                </ul>
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-calendar-event"></i> <a href="#"><time datetime="2020-01-01"><?= dateID($data['event']->tanggal) ?></time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p style="text-align:justify;"><?= $data['event']->deskripsi ?></p>
              </div>

              <!-- End post content -->
            </div>

            <div class="meta-bottom">
            </div><!-- End meta bottom -->
          </div>
        </article><!-- End blog post -->
      </div>

    </div>
    </div><!-- End post author -->

    </div> -->

    </div>
  </section>
</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>