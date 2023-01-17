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
                <li class="breadcrumb-item">
                  <a href="<?= URLROOT; ?>/admin/user/peserta">Akun Peserta</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $data['title'] ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <!-- horizontal Basic Forms Start -->
      <div class="pd-20 card-box mb-30">
        <div class="clearfix">
          <div class="pull-left">
            <h4 class="text-dark h4">Perbarui Password Akun Peserta</h4>
            <p class="mb-30"></p>
          </div>
        </div>
        <form>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input class="form-control" type="text" value="<?= $data['user']->nama ?>" aria-label="readonly input example" readonly />
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" value="<?= $data['user']->username ?>" aria-label="readonly input example" readonly />
          </div>
          <div class="form-group">
            <label> Ganti password akun</label>
            <input class="form-control" value="" type="password" id="newPassword" />
          </div>
          <div class="form-group">
            <label>Masukkan kembali password</label>
            <input class="form-control" value="" type="password" id="renewPassword" />
          </div>
          <br />
          <button type="button" id="changePasswordSubmit" class="btn btn-secondary btn-lg btn-block">
            Perbarui Password
          </button>
        </form>
      </div>
      <!-- horizontal Basic Forms End -->

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

      <script>
        $(document).ready(function() {

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
              newPasswordError == true &&
              confirmPasswordError == true
            ) {
              let newPassword = $("#newPassword");
              let confirmNewPassword = $("#renewPassword");
              $.ajax({
                type: 'POST',
                url: '<?= URLROOT ?>/admin/user/editPeserta/<?= $data['user']->id ?>',
                data: {
                  newPassword: newPassword.val(),
                  confirmNewPassword: confirmNewPassword.val()
                },
                dataType: "JSON",
                success: function(data) {
                  Swal.fire(data.message, '', data.status).then((result) => {
                    if (result.isConfirmed) {
                      newPassword.val("");
                      confirmNewPassword.val("");
                    }
                  });
                }
              })
            } else {
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