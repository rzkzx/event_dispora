<?php require APPROOT . '/views/layouts/header.php'; ?>

<main id="main">
  <section class="login-page section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container" data-aos="fade-up">
      <!-- regis -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                <p class="text-center small">
                  Masukkan biodata anda untuk membuat akun
                </p>
              </div>
              <?php flash(); ?>
              <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="yourName" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="yourName" required />
                  <div class="invalid-feedback">
                    Mohon isi nama lengkap anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourEmail" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="yourEmail" required />
                  <div class="invalid-feedback">
                    Mohon isi alamat email anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" required />
                  <div class="invalid-feedback">
                    Mohon isi password anda!
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourPassword" class="form-label">Masukkan kembali password</label>
                  <input type="password" name="passwordConf" class="form-control" id="yourPassword" required />
                  <div class="invalid-feedback">
                    Mohon isi kembali password anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="text" name="nik" class="form-control" id="nik" required />
                  <div class="invalid-feedback">Mohon isi NIK anda!</div>
                </div>

                <div class="col-12">
                  <label for="jK" class="form-label">Jenis Kelamin</label>
                  <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <option value="Laki-Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <div class="invalid-feedback">Mohon isi jenis kelamin</div>
                </div>

                <div class="col-12">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required />
                  <div class="invalid-feedback">
                    Mohon isi tempat lahir anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required />
                  <div class="invalid-feedback">
                    Mohon isi tanggal lahir anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="alamat_dom" class="form-label">Alamat Domisili</label>
                  <input type="text" name="alamat_dom" class="form-control" id="alamat_dom" required />
                  <div class="invalid-feedback">
                    Mohon isi alamat doomisili anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                  <input type="text" name="alamat_ktp" class="form-control" id="alamat_ktp" required />
                  <div class="invalid-feedback">
                    Mohon isi alamat ktp anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="pendidikan" class="form-label">Pendidikan</label>
                  <input type="text" name="pendidikan" class="form-control" id="pendidikan" required />
                  <div class="invalid-feedback">
                    Mohon isi pendidikan anda!
                  </div>
                </div>

                <div class="col-12">
                  <label for="pekerjaan" class="form-label">Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required />
                  <div class="invalid-feedback">
                    Mohon isi pekerjaan anda!
                  </div>
                </div>
                <div class="col-12">
                  <label for="no_hp" class="form-label">Nomor Handphone</label>
                  <input type="text" name="no_hp" class="form-control" id="no_hp" required />
                  <div class="invalid-feedback">
                    Mohon isi nomor handphone anda!
                  </div>
                </div>
                <!-- boleh kada di isi -->
                <div class="col-12">
                  <label for="imageUpload" class="form-label">Foto Profil</label>
                  <input type="file" class="form-control" id="imageUpload" name="foto" onchange="return previewImage()" />
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required />
                    <label class="form-check-label" for="acceptTerms">Saya setuju telah mengisi data dengan benar
                      <div class="invalid-feedback">
                        anda harus setuju sebelum melanjutkan
                      </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-outline-dark w-100" type="submit">
                    Buat Akun
                  </button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">
                    Sudah punya akun? <a href="<?= URLROOT ?>/auth">Log in</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
          <div class="credits">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>

<script>
  function previewImage() {
    var inputFile = document.getElementById('imageUpload');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.png|\.jpg|\.jpeg)$/i;
    if (inputFile.files[0].size > 1000 * 1000) { // ini untuk ukuran1000000 untuk 1 MB.
      alert("Maaf. Foto Terlalu Besar ! Maksimal Upload 1mb");
      inputFile.value = '';
      return false;
    };
    if (!ekstensiOk.exec(pathFile)) {
      alert('Silakan upload file yang memiliki ekstensi .png/.jpg/.jpeg');
      inputFile.value = '';
      return false;
    } else {
      //Pratinjau gambar
      if (inputFile.files && inputFile.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          // $('#imagePrev').show();
          // $('#imagePreview').attr('src', e.target.result);
          // $('#imagePreview').hide();
          // $('#imagePreview').fadeIn(650);
        };
        reader.readAsDataURL(inputFile.files[0]);
      }
    }
  }
</script>