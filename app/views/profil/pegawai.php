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
              <div class="text-nama text-center" style="border-top:5px solid #ebeef4;margin-top:20px;padding:20px;">
                <h6 class="text-uppercase" style="font-weight: bolder;"><?= $data['user']->nama ?></h6>
                <h6 style="font-weight:normal;"><?= $data['user']->username  ?></h6>
              </div>
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
                <h5 class="card-title mt-4">INFORMASI AKUN</h5><br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->nama ?></div>
                </div><br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Jabatan</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->jabatan ?></div>
                </div><br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Usernane</div>
                  <div class="col-lg-9 col-md-8"><?= $data['user']->username ?></div>
                </div><br>
              </div>
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <!-- Profile Edit Form -->
                <form action="<?= URLROOT; ?>/profil/changeProfile" method="POST" enctype="multipart/form-data">
                  <?php flash() ?>
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="col-sm-12">
                        <div class="avatar-upload">
                          <div class="avatar-edit">
                            <input type="file" id="imageUpload" name="avatar" onchange="return avatarUpload()" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"><i class="fa fa-pencil"></i></label>
                          </div>
                          <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url(<?= URLROOT; ?>/assets/images/user/<?php echo ($_SESSION['foto']) ? $_SESSION['foto'] : 'man.png'; ?>);">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nama" type="text" class="form-control" id="fullName" value="<?= $data['user']->nama ?>" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= $data['user']->jabatan ?>" required>
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
                    <button type="submit" class="btn btn-primary" id="changePasswordSubmit">Ubah Password</button>
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

<script>
  function avatarUpload() {
    var inputFile = document.getElementById('imageUpload');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.png|\.jpg|\.jpeg)$/i;
    if (inputFile.files[0].size > 2000 * 1000) { // ini untuk ukuran1000000 untuk 1 MB.
      alert("Maaf. Foto Terlalu Besar ! Maksimal Upload 2mb");
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
          $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
        };
        reader.readAsDataURL(inputFile.files[0]);
      }
    }
  }

  $(document).ready(function() {
    // validate current password
    let passwordError = false;
    $("#currentPassword").keyup(function() {
      let passwordValue = $("#currentPassword").val();
      if (passwordValue.length == "") {
        $("#currentPassword").addClass("is-invalid");
        passwordError = false;
      } else {
        $("#currentPassword").removeClass("is-invalid");
        passwordError = true;
      }
    });

    // validate new password
    let newPasswordError = false;
    $("#newPassword").keyup(function() {
      let newPasswordValue = $("#newPassword").val();
      if (newPasswordValue.length < 5) {
        $("#newPassword").addClass("is-invalid");
        newPasswordError = false;
      } else {
        $("#newPassword").removeClass("is-invalid");
        newPasswordError = true;
      }
    });

    // validate new password
    let confirmPasswordError = false;
    $("#renewPassword").keyup(function() {
      let newPasswordValue = $("#newPassword").val();
      let confirmPasswordValue = $("#renewPassword").val();
      if (newPasswordValue != confirmPasswordValue) {
        $("#renewPassword").addClass("is-invalid");
        confirmPasswordError = false;
      } else {
        $("#renewPassword").removeClass("is-invalid");
        confirmPasswordError = true;
      }
    });

    $("#changePasswordSubmit").click(function() {
      event.preventDefault();
      if (
        passwordError == true && newPasswordError == true &&
        confirmPasswordError == true
      ) {
        let password = $("#currentPassword");
        let newPassword = $("#newPassword");
        let confirmNewPassword = $("#renewPassword");
        $.ajax({
          type: 'POST',
          url: '<?= URLROOT ?>/profil/changePassword',
          data: {
            password: password.val(),
            newPassword: newPassword.val(),
            confirmNewPassword: confirmNewPassword.val()
          },
          dataType: "JSON",
          success: function(data) {
            let status = data.status;
            let msg = data.message;
            tata[status](status, msg, {
              position: 'mm',
              duration: 2500,
              animate: 'slide'
            })
            passwordError == false;
            password.val("");
            newPassword.val("");
            confirmNewPassword.val("");
          }
        })
      } else {
        if (!passwordError) {
          $("#currentPassword").addClass("is-invalid");
        }
        if (!newPasswordError) {
          $("#newPassword").addClass("is-invalid");
        }
        if (!confirmPasswordError) {
          $("#renewPassword").addClass("is-invalid");
        }
        tata.error('Invalid', 'Form input masih tidak valid', {
          position: 'mm',
          duration: 2500,
          animate: 'slide'
        })
      }
    });
  });
</script>