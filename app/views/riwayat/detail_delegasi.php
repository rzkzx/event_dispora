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
          <li><?= $data['title'] ?></li>
        </ol>
      </div>
    </nav>
  </div>

  <section id="participant" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">
        <div class="event">
          <article class="event-details">
            <div class="row g-0">
              <div class="col-6 col-md-4 post-img">
                <img src="<?= URLROOT; ?>/assets/images/event/<?= $data['event']->cover ?>" alt="cover event" class="img-fluid">
              </div><!-- End post img -->
              <div class="col-sm-6 col-md-8 judul">
                <h2 class="title"><?= $data['event']->nama ?></h2>
                <div class="meta-top d-flex" style="justify-content: space-between;font-weight:bold;">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-circle-fill"></i> <a href="#"><?= $data['event']->jenis ?></a></li>
                  </ul>
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href="#"><?= $data['event']->lokasi ?></a></li>
                  </ul>
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-calendar-event"></i> <a href="#"><time datetime="2020-01-01"><?= dayID($data['event']->tanggal) ?>, <?= dateID($data['event']->tanggal) ?></time></a></li>
                  </ul>
                </div>

                <div class="content">
                  <p style="text-align:justify;"><?php echo (strlen($data['event']->deskripsi) > 300) ? substr($data['event']->deskripsi, 0, 300) . "..." : $data['event']->deskripsi; ?></p>
                  <a href="<?= URLROOT; ?>/event/detail/<?= $data['event']->id ?>" class="" title="Detail">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
                <!-- End post content -->
              </div>
              <div class="meta-bottom">
              </div><!-- End meta bottom -->
            </div>
          </article><!-- End blog post -->
        </div>
        <div class="col-lg-12">
          <div class="sidebar">
            <div class="mb-2 text-center">
              <h4 style="font-weight:bolder;">PESERTA DIDAFTARKAN</h4>
              <hr>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data['peserta'] as $peserta) {
                    if ($peserta->status == 'diterima') {
                      $badge = 'success';
                    } elseif ($peserta->status == 'ditolak') {
                      $badge = 'danger';
                    } else {
                      $badge = 'warning';
                    }
                  ?>
                    <tr>
                      <th scope="row"><?= $no; ?></th>
                      <td><?= $peserta->nama ?></td>
                      <td><?= $peserta->nik ?></td>
                      <td><?= $peserta->jenis_kelamin ?></td>
                      <td>
                        <span class="badge rounded-pill bg-<?= $badge ?> text-dark text-uppercase"><?= $peserta->status ?></span>
                      </td>
                      <td>
                        <a href="<?= URLROOT ?>/riwayat/detail/<?= $data['event']->id ?>/peserta/<?= $peserta->id ?>" class="btn btn-link"><i class="bi bi-eye"></i></a>
                        <?php
                        if ($data['event']->aktif) {
                        ?>
                          <a href="<?= URLROOT ?>/riwayat/detail/<?= $data['event']->id ?>/edit/<?= $peserta->id ?>" class="btn btn-link"><i class="bi bi-pencil"></i></a>
                          <button type="button" class="btn btn-link" id="btnDelete" data-id="<?= $peserta->id ?>"><i class="bi bi-trash"></i></button>
                        <?php } ?>
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

<script>
  $(document).ready(function() {
    alertConfirmation();
  });

  function alertConfirmation() {
    $(document).delegate("#btnDelete", "click", function() {
      Swal.fire({
        icon: 'warning',
        title: 'Hapus data ini?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

          var id = $(this).attr('data-id');

          // Ajax config
          $.ajax({
            type: "POST", //we are using GET method to get data from server side
            url: '<?= URLROOT ?>/riwayat/detail/<?= $data['event']->id ?>/delete/' + id, // get the route value
            beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

            },
            success: function(response) { //once the request successfully process to the server side it will return result here
              // Reload lists of employees
              Swal.fire(response, response, 'success').then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              });
            }
          });

        } else if (result.isDenied) {
          Swal.fire('Perubahan tidak disimpan', '', 'info')
        }
      });
    });
  }
</script>