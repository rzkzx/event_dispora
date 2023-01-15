<?php require APPROOT . '/views/layouts/header.php'; ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('https://dispora-kalsel.id/assets/frontend/img/banner-1/bg.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2><?= $data['title'] ?></h2>
            <p class="text-white">Form Pendaftaran Peserta Umum</p>
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

            <h2 class="title">Informasi Pribadi</h2><br>

            <div>
              <!-- Formulir Pendaftaran -->
              <div>
                <?php flash() ?>
                <form class="row g-3 needs-validation" method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" name="event_id" value="<?= $data['event']->id ?>">
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="validationCustom01" value="<?= $data['user']->nama ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukan nama lengkap anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" id="validationCustom02" value="<?= $data['user']->nik ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan NIK anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="validationCustom04" required name="jenis_kelamin">
                      <option value="Laki-Laki" <?php echo ($data['user']->jenis_kelamin == 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
                      <option value="Perempuan" <?php echo ($data['user']->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                      Mohon pilih jenis kelamin anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tempat_lahir" value="<?= $data['user']->tempat_lahir ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan tempat lahir anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom02 inputDate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control datetimepicker" name="tgl_lahir" id="validationCustom02" value="<?= $data['user']->tanggal_lahir ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan tanggal lahir anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Alamat Domisili</label>
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" name="alamat_dom" id="validationCustomUsername" value="<?= $data['user']->alamat_dom ?>" required>
                      <div class="invalid-feedback">
                        Mohon isi alamat domisili anda.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Alamat KTP</label>
                    <input type="text" class="form-control" name="alamat_ktp" id="validationCustom03" value="<?= $data['user']->alamat_ktp ?>" required>
                    <div class="invalid-feedback">
                      Mohon isi alamat Identitas anda.
                    </div>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="validationTooltip03" class="form-label">Pendidikan</label>
                    <input type="text" class="form-control" name="pendidikan" id="validationTooltip03" value="<?= $data['user']->pendidikan ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan jenjang pendidikan anda.
                    </div>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="validationTooltip03" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="validationTooltip03" value="<?= $data['user']->pekerjaan ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan pekerjaan anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nomor Hp</label>
                    <input type="text" class="form-control" name="no_hp" id="validationCustom01" value="<?= $data['user']->no_hp ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan nomor hp anda.
                    </div>
                  </div>
                  <div><br></div>

                  <h4>Persyaratan</h4><br>
                  <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Upload Identitas</label>
                    <div class="input-group has-validation">
                      <input type="file" class="form-control" name="identitas" aria-label="file example">
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Upload Berkas Syarat</label>
                    <div class="input-group has-validation">
                      <input type="file" class="form-control" name="syarat" aria-label="file example">
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
                  <div class="col-12">
                    <button class="btn btn-warning" type="submit">Daftar</button>
                  </div>
                </form>
              </div>
              <!-- End Formulir Pendaftaran -->
            </div>

          </article><!-- End blog post -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>