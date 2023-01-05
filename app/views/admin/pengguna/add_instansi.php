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

      <!-- horizontal Basic Forms Start -->
      <div class="pd-20 card-box mb-30">
        <div class="clearfix">
          <div class="pull-left">
            <h4 class="text-dark h4">Tambahkan Akun Instansi</h4>
            <p class="mb-30"></p>
          </div>
        </div>
        <?php flash() ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Level User</label>
            <select class="form-control" name="level">
              <option value="admin">Admin</option>
              <option value="panitia">Panitia</option>
              <option value="pegawai">Pegawai</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama" />
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <input class="form-control" type="text" placeholder="Jabatan" name="jabatan" />
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" placeholder="Username" name="username" />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" value="password" type="password" name="password" />
          </div>
          <div class="form-group">
            <label>Foto Profile</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="imageUpload" name="foto" onchange="return previewImage()" />
              <label class="custom-file-label">Pilih file</label>
            </div>
          </div><br>
          <button type="submit" class="btn btn-secondary btn-lg btn-block">
            Tambahkan User
          </button>
        </form>

      </div>
      <!-- horizontal Basic Forms End -->

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

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