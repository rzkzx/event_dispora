<?php require APPROOT . '/views/layouts/header.php'; ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('https://dispora-kalsel.id/assets/frontend/img/banner-1/bg.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2><?= $data['title'] ?></h2>
            <p class="text-white">Form Pendaftaran Peserta Delegasi</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="<?= URLROOT ?>/beranda">Home</a></li>
          <li><a href="<?= URLROOT ?>/event/detail/<?= $data['id'] ?>">Detail Event</a></li>
          <li><?= $data['title'] ?></li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-12">

          <article class="blog-details">

            <h2 class="title">Informasi Peserta</h2><br>

            <div>
              <!-- Formulir Pendaftaran -->
              <div>
                <?php flash() ?>
                <form class="row g-3 needs-validation" method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" name="event_id" value="<?= $data['event']->id ?>">
                  <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="" name="nama" required>
                    <div class="invalid-feedback">
                      Mohon Masukkan nama lengkap peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="" required>
                    <div class="invalid-feedback">
                      Mohon masukkan nomot identitas peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="asal_daerah" class="form-label">Asal Daerah Kab/Kota</label>
                    <select class="form-select" id="asal_daerah" required name="asal_daerah">
                      <option selected disabled value="">Pilih</option>
                      <option>Balangan</option>
                      <option>Banjar</option>
                      <option>Banjarbaru</option>
                      <option>Banjarmasin</option>
                      <option>Barito Kuala</option>
                      <option>Hulu Sungai Selatan</option>
                      <option>Hulu Sungai Tengah</option>
                      <option>Hulu Sungai Utara</option>
                      <option>Kota Baru</option>
                      <option>Tabalong</option>
                      <option>Tanah Bumbu</option>
                      <option>Tanah Laut</option>
                      <option>Tapin</option>
                    </select>
                    <div class="invalid-feedback">
                      Mohon pilih jenis kelamin peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jk" required name="jenis_kelamin">
                      <option selected disabled value="">Pilih</option>
                      <option>Perempuan</option>
                      <option>Laki-laki</option>
                    </select>
                    <div class="invalid-feedback">
                      Mohon pilih jenis kelamin peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="" required>
                    <div class="invalid-feedback">
                      Mohon masukkan tempat lahir peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="" required>
                    <div class="invalid-feedback">
                      Mohon masukkan tanggal lahir peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="alamat_dom" class="form-label">Alamat Domisili</label>
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" id="alamat_dom" name="alamat_dom" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Mohon isi alamat domisili peserta.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                    <input type="text" class="form-control" id="alamat_ktp" name="alamat_ktp" required>
                    <div class="invalid-feedback">
                      Mohon isi alamat KTP peserta.
                    </div>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                    <div class="invalid-tooltip">
                      Mohon masukkan jenjang pendidikan peserta.
                    </div>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    <div class="invalid-tooltip">
                      Mohon masukkan pekerjaan peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="">
                    <div class="invalid-feedback">
                      Mohon masukkan nomor handphone peserta.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="">
                    <div class="invalid-feedback">
                      Mohon masukkan email peserta.
                    </div>
                  </div>
                  <div><br></div>

                  <h4>Persyaratan</h4><br>
                  <div class="col-md-6">
                    <label for="identitas" class="form-label">Upload Identitas</label>
                    <div class="input-group has-validation">
                      <input type="file" class="form-control" name="identitas" id="identitas" aria-label="file example" required>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="syarat" class="form-label">Upload Berkas Syarat</label>
                    <div class="input-group has-validation">
                      <input type="file" class="form-control" id="syarat" name="syarat" aria-label="file example" required>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                      <label class="form-check-label" for="invalidCheck">
                        Saya setuju telah memasukkan data dengan benar
                      </label>
                      <div class="invalid-feedback">
                        Anda harus setuju sebelum melanjutkan
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 mt-4">
                      <button class="btn btn-warning" type="submit">
                        <i class="bi bi-plus-circle"></i> Daftarkan Peserta
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </article><!-- End blog post -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>