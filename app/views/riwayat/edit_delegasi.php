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

        <div class="col-lg-12">

          <article class="blog-details">

            <h2 class="title">Data Pendaftaran Event</h2><br>

            <div>
              <!-- Formulir Pendaftaran -->
              <div>
                <?php flash() ?>
                <form class="row g-3 needs-validation" method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $data['riwayat']->id ?>">
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="validationCustom01" value="<?= $data['riwayat']->nama ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukan nama lengkap anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" id="validationCustom02" value="<?= $data['riwayat']->nik ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan NIK anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="asal_daerah" class="form-label">Asal Daerah Kab/Kota</label>
                    <select class="form-select" id="asal_daerah" required name="asal_daerah">
                      <option selected disabled value="">Pilih</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Balangan') ? 'selected' : '' ?>>Balangan</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Banjar') ? 'selected' : '' ?>>Banjar</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Banjarbaru') ? 'selected' : '' ?>>Banjarbaru</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Banjarmasin') ? 'selected' : '' ?>>Banjarmasin</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Barito Kuala') ? 'selected' : '' ?>>Barito Kuala</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Hulu Sungai Selatan') ? 'selected' : '' ?>>Hulu Sungai Selatan</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Hulu Sungai Tengah') ? 'selected' : '' ?>>Hulu Sungai Tengah</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Hulu Sungai Utara') ? 'selected' : '' ?>>Hulu Sungai Utara</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Kota Baru') ? 'selected' : '' ?>>Kota Baru</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Tabalong') ? 'selected' : '' ?>>Tabalong</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Tanah Bumbu') ? 'selected' : '' ?>>Tanah Bumbu</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Tanah Laut') ? 'selected' : '' ?>>Tanah Laut</option>
                      <option <?php echo ($data['riwayat']->asal_daerah == 'Tapin') ? 'selected' : '' ?>>Tapin</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="validationCustom04" required name="jenis_kelamin">
                      <option value="Laki-Laki" <?php echo ($data['riwayat']->jenis_kelamin == 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
                      <option value="Perempuan" <?php echo ($data['riwayat']->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                      Mohon pilih jenis kelamin anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tempat_lahir" value="<?= $data['riwayat']->tempat_lahir ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan tempat lahir anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom02 inputDate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control datetimepicker" name="tgl_lahir" id="validationCustom02" value="<?= $data['riwayat']->tanggal_lahir ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan tanggal lahir anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Alamat Domisili</label>
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" name="alamat_dom" id="validationCustomUsername" value="<?= $data['riwayat']->alamat_dom ?>" required>
                      <div class="invalid-feedback">
                        Mohon isi alamat domisili anda.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Alamat KTP</label>
                    <input type="text" class="form-control" name="alamat_ktp" id="validationCustom03" value="<?= $data['riwayat']->alamat_ktp ?>" required>
                    <div class="invalid-feedback">
                      Mohon isi alamat Identitas anda.
                    </div>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="validationTooltip03" class="form-label">Pendidikan</label>
                    <input type="text" class="form-control" name="pendidikan" id="validationTooltip03" value="<?= $data['riwayat']->pendidikan ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan jenjang pendidikan anda.
                    </div>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="validationTooltip03" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="validationTooltip03" value="<?= $data['riwayat']->pekerjaan ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan pekerjaan anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nomor Hp</label>
                    <input type="text" class="form-control" name="no_hp" id="validationCustom01" value="<?= $data['riwayat']->no_hp ?>" required>
                    <div class="invalid-feedback">
                      Mohon masukkan nomor hp anda.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $data['riwayat']->email ?>">
                    <div class="invalid-feedback">
                      Mohon masukkan email peserta.
                    </div>
                  </div>
                  <div><br></div>

                  <h4>Persyaratan</h4><br>
                  <div class="col-md-6 edit-data-pendaftaran">
                    <label for="identitas" class="form-label">File Identitas</label>
                    <div class="file-input-group">
                      <input type="file" class="d-none" name="identitas" id="identitas">
                      <?php
                      if ($data['riwayat']->upload_identitas) {
                        echo '<label id="labelIden">' . $data['riwayat']->upload_identitas . '</label>';
                      } else {
                        echo '<label id="labelIden">Tidak ada file identitas</label>';
                      }
                      ?>
                      <br>
                      <div class="btn-input-group">
                        <?php
                        if ($data['riwayat']->upload_identitas) {
                          echo '<a href="' . URLROOT . '/assets/file/identitas/' . $data['riwayat']->upload_identitas . '" class="btn btn-primary btn-sm">Download File</a>';
                          echo '<label for="identitas" class="btn btn-warning btn-sm" style="cursor:pointer;">Ganti File</label>';
                        } else {
                          echo '&nbsp;';
                          echo '<label for="identitas" class="btn btn-warning btn-sm" style="cursor:pointer;">Tambahkan File</label>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 edit-data-pendaftaran">
                    <label for="syarat" class="form-label">File Berkas Syarat</label>
                    <div class="file-input-group">
                      <input type="file" class="d-none" name="syarat" id="syarat">
                      <?php
                      if ($data['riwayat']->berkas_syarat) {
                        echo '<label id="labelSyarat">' . $data['riwayat']->berkas_syarat . '</label>';
                      } else {
                        echo '<label id="labelSyarat">Tidak ada berkas syarat</label>';
                      }
                      ?>
                      <br>
                      <div class="btn-input-group">
                        <?php
                        if ($data['riwayat']->berkas_syarat) {
                          echo '<a href="' . URLROOT . '/assets/file/syarat/' . $data['riwayat']->berkas_syarat . '" class="btn btn-primary btn-sm">Download File</a>';
                          echo '<label for="syarat" class="btn btn-warning btn-sm" style="cursor:pointer;">Ganti File</label>';
                        } else {
                          echo '&nbsp;';
                          echo '<label for="syarat" class="btn btn-warning btn-sm" style="cursor:pointer;">Tambahkan File</label>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="col-12">
                    <button class="btn btn-warning" type="submit">Perbarui Data</button>
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

</main>

<?php require APPROOT . '/views/layouts/footer.php'; ?>

<script>
  $(document).ready(function() {
    $('#identitas').change(function(e) {
      $('#labelIden').html(e.target.files[0].name);
    });

    $('#syarat').change(function(e) {
      $('#labelSyarat').html(e.target.files[0].name);
    });
  });
</script>