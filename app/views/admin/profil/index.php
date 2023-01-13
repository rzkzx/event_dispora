<?php require APPROOT . '/views/admin/inc/header.php'; ?>

<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
      <div class="page-header">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="title">
              <h4><?= $data['title'] ?></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= URLROOT; ?>/admin/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $data['title'] ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <!-- content -->
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
          <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
              <img style="object-fit:cover;border-radius:100%;" src="<?= URLROOT; ?>/assets/images/user/<?php echo ($_SESSION['foto']) ? $_SESSION['foto'] : 'man.png'; ?>" alt="">
            </div>
            <h5 class="text-center h5 mb-0"><?= $_SESSION['nama'] ?></h5>
            <p class="text-center text-muted font-14 text-uppercase"><?= $_SESSION['level'] ?></p>
            <div class="profile-info">
              <h5 class="mb-20 h5 text-blue">Informasi Pribadi</h5>
              <ul>
                <li>
                  <span>Username Akun:</span>
                  <?= $_SESSION['username'] ?>
                </li>
                <li><span>Jabatan:</span> <?= $_SESSION['jabatan'] ?></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
          <div class="card-box height-100-p overflow-hidden">
            <div class="profile-tab height-100-p">
              <div class="tab height-100-p">
                <ul class="nav nav-tabs customtab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Pengaturan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile-change-password" role="tab">Ganti password</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <!-- Setting Tab start -->
                  <div class="tab-pane fade height-100-p show active" id="setting" role="tabpanel">
                    <div class="profile-setting">
                      <form action="<?= URLROOT; ?>/admin/user/changeProfile" method="POST" enctype="multipart/form-data">
                        <?php flash() ?>
                        <ul class="profile-edit-list row">
                          <li class="weight-500 col-md-6">
                            <h4 class="text-blue h5 mb-20">
                              Ubah data informasi pribadi anda
                            </h4>
                            <div class="form-group row">
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
                            <div class="form-group">
                              <label>Nama Lengkap</label>
                              <input class="form-control form-control-lg" type="text" name="nama" value="<?= $_SESSION['nama'] ?>" />
                            </div>
                            <div class="form-group">
                              <label>Jabatan</label>
                              <input class="form-control form-control-lg" type="text" name="jabatan" value="<?= $_SESSION['jabatan'] ?>" />
                            </div>
                            <div class="form-group mb-0">
                              <input type="submit" class="btn btn-dark" value="Perbarui Informasi Pribadi" />
                            </div>
                          </li>
                        </ul>
                      </form>
                    </div>
                  </div>
                  <!-- Setting Tab End -->
                  <!-- Change Password Tab start -->
                  <div class="tab-pane fade height-100-p" id="profile-change-password" role="tabpanel">
                    <div class="profile-change-password">
                      <form method="post">
                        <ul class="profile-edit-list row">
                          <li class="weight-500 col-md-8 m-4">
                            <h4 class="text-blue h5 mb-20">Ganti password</h4>
                            <div class="row mb-3">
                              <label for="currentPassword" class="col-md-4 col-lg-4 col-form-label">Password saat ini</label>
                              <div class="col-md-8 col-lg-8">
                                <input name="password" type="password" class="form-control" id="currentPassword" />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="newPassword" class="col-md-5 col-lg-4 col-form-label">Password baru</label>
                              <div class="col-md-8 col-lg-8">
                                <input name="newPassword" type="password" class="form-control" id="newPassword" />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="renewPassword" class="col-md-5 col-lg-4 col-form-label">Masukkan kembali password baru</label>
                              <div class="col-md-8 col-lg-8">
                                <input name="confirmNewPassword" type="password" class="form-control" id="renewPassword" />
                              </div>
                            </div>

                            <div class="">
                              <button type="submit" class="btn btn-dark" id="changePasswordSubmit">
                                Ganti Password
                              </button>
                            </div>
                          </li>
                        </ul>
                      </form>
                    </div>
                  </div>
                  <!-- Setting Tab End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

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
            if (newPasswordValue.length < 6) {
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
                url: '<?= URLROOT ?>/admin/user/changePassword',
                data: {
                  password: password.val(),
                  newPassword: newPassword.val(),
                  confirmNewPassword: confirmNewPassword.val()
                },
                dataType: "JSON",
                success: function(data) {
                  Swal.fire(data.message, '', data.status).then((result) => {
                    if (result.isConfirmed) {
                      password.val("");
                      newPassword.val("");
                      confirmNewPassword.val("");
                    }
                  });
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
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Form input masih tidak valid',
              })
            }
          });

        });
      </script>