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

  <!-- ======= Profile Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <?php flash() ?>
      <div class="row g-5">

        <div class="col-lg-4">

          <div class="sidebar">

            <div class=" profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= URLROOT; ?>/assets/images/user/<?php echo ($_SESSION['foto']) ? $_SESSION['foto'] : 'man.png'; ?>" alt="Profile Image" class="rounded-circle ">
              <h2><?= $_SESSION['nama'] ?></h2>
              <h3><?= $_SESSION['username'] ?></h3>
            </div>

          </div><!-- End Blog Sidebar -->

        </div>

        <div class="col-lg-8">

          <article class="blog-details">

            <!-- Bordered Tabs -->
            <div class="pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Informasi Pribadi</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Pengaturan Akun</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
            </div>


            <div class="tab-content pt-2">

              <!-- informasi pribadi -->
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5><br>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->nama ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">NIK</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->nik ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                  <div class="col-lg-9 col-md-8"><?= dateID($data['user']->tanggal_lahir) ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->tempat_lahir ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->jenis_kelamin ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat Domisili</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->alamat_dom ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat KTP</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->alamat_ktp ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Pendidikan</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->pendidikan ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->pekerjaan ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->no_hp ?></div>
                </div>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form>
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="assets/img/profile-img.jpg" alt="Profile">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $data['user']->nama ?>">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nik" type="text" class="form-control" id="nik" value="<?= $data['user']->nik ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="<?= $data['user']->tempat_lahir ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ttl" type="date" class="form-control" id="ttl" value="<?= $data['user']->tanggal_lahir ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="jenis-kelamin">
                        <option value="Laki-lLaki" <?php echo ($data['user']->jenis_kelamin == 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?php echo ($data['user']->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                      </select>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat Domisili</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?= $data['user']->alamat_dom ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat KTP</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?= $data['user']->alamat_ktp ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Pendidikan</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="<?= $data['user']->pendidikan ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="<?= $data['user']->pekerjaan ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Nomor Telpon</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="<?= $data['user']->no_hp ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>


              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password saat ini</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Masukan kembali password baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </article><!-- End blog post -->



        </div>


      </div>

    </div>
  </section><!-- End Profile Details Section -->

</main><!-- End #main -->


<?php require APPROOT . '/views/layouts/footer.php'; ?>