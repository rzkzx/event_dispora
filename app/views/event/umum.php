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
          <li><?= $data['title'] ?></li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= services Section ======= -->
  <section id="agenda" class="services sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">


        <?php foreach ($data['event'] as $event) {
        ?>
          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="image ">
                <img src="<?= URLROOT ?>/assets/images/event/<?= $event->cover ?>" alt="<?= $event->nama ?> " class="img-fluid">
              </div>
              <h3><br> <?= $event->nama ?> </h3>
              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href="#"><?= $event->lokasi ?></a></li>
                </ul>
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-calendar-event"></i> <a href="#"><time datetime="2020-01-01"><?= dateID($event->tanggal) ?></time></a></li>
                </ul>
              </div><!-- End meta top -->
              <p><?php echo (strlen($event->deskripsi) > 90) ? substr($event->deskripsi, 0, 90) . "..." : $event->deskripsi; ?></p>
              <a href="<?= URLROOT ?>/event/detail/<?= $event->id ?>" class="readmore stretched-link" title="Detail">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
        <?php
        } ?>

      </div>
      <!-- event pagination -->
      <nav>
        <div class="services-pagination">
          <ul class="justify-content-center">
            <?php
            $totalPage = $data['totalPage'];
            $page = 1;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }
            $adjacents = "1";

            if ($totalPage <= 3) {
              for ($i = 1; $i <= $totalPage; $i++) {
                if ($i == $page) {
                  echo "<li class='active'><a>$i</a></li>";
                } else {
                  echo "<li><a href='?page=$i'>$i</a></li>";
                }
              }
            } else if ($totalPage > 5) {
              if ($page <= 2) {
                for ($i = 1; $i < 4; $i++) {
                  if ($i == $page) {
                    echo "<li class='active'><a>$i</a></li>";
                  } else {
                    echo "<li><a href='?page=$i'>$i</a></li>";
                  }
                }
                echo "<li><a>...</a></li>";
                echo "<li><a href='?page=$totalPage'>$totalPage</a></li>";
              } elseif ($page > 2 && $page < $totalPage - 2) {
                echo "<li><a href='?page=1'>First</a></li>";
                echo "<li><a>...</a></li>";
                for (
                  $i = $page - $adjacents;
                  $i <= $page + $adjacents;
                  $i++
                ) {
                  if ($i == $page) {
                    echo "<li class='active'><a>$i</a></li>";
                  } else {
                    echo "<li><a href='?page=$i'>$i</a></li>";
                  }
                }
                echo "<li><a>...</a></li>";
                echo "<li><a href='?page=$totalPage'>$totalPage</a></li>";
              } else {
                echo "<li><a href='?page=1'>First</a></li>";
                echo "<li><a>...</a></li>";
                for (
                  $i = $totalPage - 3;
                  $i <= $totalPage;
                  $i++
                ) {
                  if ($i == $page) {
                    echo "<li class='active'><a>$i</a></li>";
                  } else {
                    echo "<li><a href='?page=$i'>$i</a></li>";
                  }
                }
              }
            }
            ?>
          </ul>
        </div>
      </nav>

    </div>
  </section><!-- End Our Services Section -->




</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>