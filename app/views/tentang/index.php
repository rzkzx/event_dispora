<?php require APPROOT . '/views/layouts/header.php'; ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('https://dispora-kalsel.id/assets/frontend/img/banner-1/bg.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h4> <?= $data['title'] ?></h4>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Profil</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Profil Dinas Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">

      <!-- Slider -->
      <div class="position-relative h-100 mb-30">
        <div class="slides-1 portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img src="<?= URLROOT ?>/front/img/slide 1.png" alt="">
            </div>

            <div class="swiper-slide">
              <img src="<?= URLROOT ?>/front/img/slide 2.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="<?= URLROOT ?>/front/img/profil/paskib2.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="" alt="img">
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
      <!-- End -->


      <div class="row justify-content-between gy-4 mt-4">

        <!-- Kiri -->
        <div class="d-flex align-items-start tablist">
          <div class="col-lg-3">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Sejarah Dinas</button>
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profil Kepala Dinas</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Visi Dan Misi</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Struktur Organisasi</button>
            </div>
          </div>

          <!-- kanan -->
          <div class="col-lg-8">
            <div class="tab-content" id="v-pills-tabContent" style="text-align:justify;">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <p class="">
                  Dibentuk pada tahun 2017 pada masa pemerintahan Gubernur H. Sahbirin Noor, sebelumnya nomenklatur Dinas Pemuda dan Olahraga Provinsi Kalimantan adalah Dinas Pemuda Olahraga Kebudayaan dan Pariwisata Provinsi Kalimantan Selatan dan setelah diterbitkannya Perda Nomor 11 Tahun 2016, Disporabudpar Provkalsel dibentuk menjadi 2 (dua) dinas baru yaitu Dinas Pariwisata Provinsi Kalimantan Selatan dan Dinas Pemuda dan Olahraga Provinsi Kalimantan Selatan sedangkan untuk Urusan Kebudayaan menjadi bagian Dinas Pendidikan.
                </p>
                <p>
                  Beralamat di Jalan Pramuka Nomor 4 Banjarmasin, Dispora Provkalsel menempati gedung eks. Kantor Kanwil XII Depparpostel Kalimantan Selatan yang dibangun pada tahun 1997 dan diresmikan pada tanggal 28 Mei 1998 oleh Bapak Gubernur Kalimantan Selatan Drs. H. Hasan Aman, yakni sebagai tindak lanjut undang-undang Menparpostel yang mengharuskan untuk membangun kantor perwakilan sebagai wakil Pemerintah Pusat, sedangkan untuk Dinas Pariwisata Provinsi Kalimantan Selatan dan Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Selatan (bidang kebudayaan) bertempat di jalan Let. Jend. S. Parman No. 44 Banjarmasin atau eks Dinas Pendidikan Prov. Kalsel.
                </p>
              </div>

              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <p>
                  Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                </p>
                <p>
                  Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non aspernatur atque natus ut cum nam et. Praesentium error dolores rerum minus sequi quia veritatis eum. Eos et doloribus doloremque nesciunt molestiae laboriosam.
                </p>
                <p>
                  Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati earum et magnam animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque minus deserunt assumenda tempore. Delectus voluptas necessitatibus est.

                <p>
                  Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem libero. Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque praesentium rem et qui nesciunt.
                </p>
              </div>

              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <p>
                  Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                </p>
                <p>
                  Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non aspernatur atque natus ut cum nam et. Praesentium error dolores rerum minus sequi quia veritatis eum. Eos et doloribus doloremque nesciunt molestiae laboriosam.
                </p>
                <p>
                  Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati earum et magnam animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque minus deserunt assumenda tempore. Delectus voluptas necessitatibus est.

                <p>
                  Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem libero. Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque praesentium rem et qui nesciunt.
                </p>
              </div>

              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div>
                  <img src="<?= URLROOT ?>/front/img/profil/struktur-2021-dispora-kalsel.jpg" alt="" class="w-75">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <br><br><br><br>


    </div>
    </div>
  </section>
  <!-- End Profil Dinas Details Section -->

</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>