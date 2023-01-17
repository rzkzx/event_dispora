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
          <li><?= $data['title'] ?></li>
        </ol>
      </div>
    </nav>
  </div>

  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <?php flash() ?>
      <div class="row g-5">

        <div class="col-lg-4">

          <div class="sidebar">

            <div class=" profile-card pt-4 d-flex flex-column align-items-center">
              <div class="foto rounded-circle overflow-hidden" style="width: 200px; height: 200px;">
                <img src="<?= URLROOT; ?>/assets/images/user/<?php echo ($_SESSION['foto']) ? $_SESSION['foto'] : 'man.png'; ?>" alt="Profile Image" style="object-fit:cover;width:100%;height:100%;max-width:100%;">
              </div>
              <div class="text-nama text-center" style="border:1px solid #ebeef4;margin-top:10px;padding:20px;border-radius:10px;">
                <h6 class="text-uppercase"><?= $_SESSION['nama'] ?></h6>
                <h6 style="font-weight:normal;"><?= $_SESSION['username']  ?></h6>
              </div>
            </div>
          </div><!-- End Blog Sidebar -->
        </div>
        <div class="col-lg-8">
          <div class="sidebar">
            <div class="mb-2 text-center">
              <h4>DAFTAR RIWAYAT EVENT</h4>
              <hr>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Tanggal Pelaksanaan</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data['riwayat'] as $riwayat) {
                    if ($data['event'][$no]->aktif) {
                      $badge = 'warning';
                      $status = 'Berlangsung';
                    } else {
                      $badge = 'success';
                      $status = 'Berakhir';
                    }
                  ?>
                    <tr>
                      <th scope="row"><?= $no ?></th>
                      <td><?= $data['event'][$no]->nama ?></td>
                      <td><?= dayID($data['event'][$no]->tanggal) ?>, <?= dateID($data['event'][$no]->tanggal) ?></td>
                      <td>
                        <span class="rounded-pill badge bg-<?= $badge ?> text-dark"><?= $status ?></span>
                      </td>
                      <td>
                        <a href="<?= URLROOT ?>/riwayat/detail/<?= $riwayat->id ?>" class="btn btn-outline-primary">Detail</a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div><!-- End Blog Sidebar -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>