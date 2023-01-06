<?php require APPROOT . '/views/layouts/header.php'; ?>

<main id="main">

  <section class="login-page section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container" data-aos="fade-up">
      <!-- login -->
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Selamat Datang</h5><br>
              </div>

              <?php flash(); ?>
              <form class="row g-3 needs-validation" action="" method="post">
                <div class="col-12">
                  <label for="username" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <input type="text" name="username" class="form-control" id="username" required>
                    <div class="invalid-feedback">Mohon masukkan username anda!</div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" required>
                  <div class="invalid-feedback">Mohon masukkan password anda!</div>
                </div>
                <div class="col-12">
                  <button class="btn btn-outline-dark w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Belum punya akun? <a href="<?= URLROOT; ?>/auth/register">Buat akun</a></p>
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

</main><!-- End #main -->

<?php require APPROOT . '/views/layouts/footer.php'; ?>