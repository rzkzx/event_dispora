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
                  <a href="<?= URLROOT; ?>/admin/event">Agenda Event</a>
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
            <h4 class="text-dark h4">Edit Event</h4>
            <p class="mb-30"></p>
          </div>
        </div>
        <?php flash(); ?>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $data['event']->id ?>">
          <div class="form-group">
            <label>Jenis Event</label>
            <select class="selectpicker form-control" data-style="btn-outline-primary" name="jenis">
              <option <?php echo ($data['event']->jenis == 'Olahraga') ? 'selected' : ''; ?>>Olahraga</option>
              <option <?php echo ($data['event']->jenis == 'Pemuda') ? 'selected' : ''; ?>>Pemuda</option>
            </select>
          </div>
          <div class="form-group">
            <label>Jenjang Event</label>
            <select class="selectpicker form-control" data-style="btn-outline-primary" name="jenjang">
              <option <?php echo ($data['event']->jenjang == 'Umum') ? 'selected' : ''; ?>>Umum</option>
              <option <?php echo ($data['event']->jenjang == 'Khusus') ? 'selected' : ''; ?>>Khusus</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Event</label>
            <input class="form-control" type="text" placeholder="Masukkan Nama Event" name="nama" value="<?= $data['event']->nama ?>" />
          </div>
          <div class="form-group">
            <label>Lokasi Event</label>
            <input class="form-control" type="text" placeholder="Masukkan Lokasi Event" name="lokasi" value="<?= $data['event']->lokasi ?>" />
          </div>
          <div class="form-group">
            <label>Tanggal Pelaksanaan Event</label>
            <div>
              <input class="form-control" placeholder="Pilih Tanggal" type="date" name="tanggal" value="<?= $data['event']->tanggal ?>" />
            </div>
          </div>
          <div class="form-group">
            <label>Deskripsi Event</label>
            <textarea class="form-control" name="deskripsi"><?= $data['event']->deskripsi ?></textarea>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="imageUpload" name="foto" onchange="return previewImage()" />
              <label class="custom-file-label">Pilih Foto</label>
            </div>
            <div class="imagePrev" id="imagePrev" style="height: 500px; margin-top: 20px;">
              <img id="imagePreview" style="height:100%;object-fit:cover;" src="<?= URLROOT; ?>/assets/images/event/<?= $data['event']->cover ?>">
            </div>
          </div><br>
          <button type=" submit" class="btn btn-secondary btn-lg btn-block">
            Perbarui Event
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
                $('#imagePrev').show();
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
              };
              reader.readAsDataURL(inputFile.files[0]);
            }
          }
        }
      </script>