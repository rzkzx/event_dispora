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
                <li class="breadcrumb-item">
                  <a href="<?= URLROOT; ?>/admin/event/detail/<?= $data['event']->id ?>">Detail Event</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $data['title'] ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <div class="card-box mb-30">
        <div class="pd-20 mb-10">
          <h4 class="text-blue h4">Detail Peserta Event</h4>
          <?php if ($data['peserta']->status == 'menunggu') { ?>
            <div class="">
              <button type="button" class="btn btn-outline-danger btn-sm" id="btnStatus" data-id="<?= $data['peserta']->id ?>" data-status="ditolak">
                Tolak
              </button>
              <button type="button" class="btn btn-outline-success btn-sm" id="btnStatus" data-id="<?= $data['peserta']->id ?>" data-status="diterima">
                Terima
              </button>
            </div>
          <?php } ?>
        </div>
        <div class="pb-20">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Status Pendaftaran</h6>
              </div>
              <div class="col-6">
                <?php
                if ($data['peserta']->status == 'menunggu') {
                  $badge = 'warning';
                } elseif ($data['peserta']->status == 'diterima') {
                  $badge = 'success';
                } else {
                  $badge = 'danger';
                }
                ?>
                <p class="text-uppercase badge badge-<?= $badge ?>"><?= $data['peserta']->status ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Nama Lengkap</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->nama ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">NIK</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->nik ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Tempat Lahir</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->tempat_lahir ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Tanggal Lahir</h6>
              </div>
              <div class="col-6">
                <p><?= dateID($data['peserta']->tanggal_lahir) ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Jenis Kelamin</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->jenis_kelamin ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Alamat Domisili</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->alamat_dom ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Alamat KTP</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->alamat_ktp ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Pendidikan</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->pendidikan ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Pekerjaan</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->pekerjaan ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Nomor Handphone</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->no_hp ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Tanggal Mendaftar</h6>
              </div>
              <div class="col-6">
                <p><?= $data['peserta']->waktu_daftar ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Identitas</h6>
              </div>
              <div class="col-6">
                <p><a href="<?= URLROOT ?>/assets/file/identitas/<?= $data['peserta']->upload_identitas ?>" target="_blank"><?= $data['peserta']->upload_identitas ?></a></p>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <h6 class="nama-atribut">Berkas Syarat</h6>
              </div>
              <div class="col-6">
                <p><a href="<?= URLROOT ?>/assets/file/syarat/<?= $data['peserta']->berkas_syarat ?>" target="_blank"><?= $data['peserta']->berkas_syarat ?></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

      <script>
        function alertConfirmation() {
          $(document).delegate("#btnStatus", "click", function() {
            Swal.fire({
              icon: 'warning',
              title: 'Konfirmasi pendaftaran peserta',
              showDenyButton: false,
              showCancelButton: true,
              confirmButtonText: 'Konfirmasi',
              cancelButtonText: 'Batal'
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {

                var status = $(this).attr('data-status');
                var id = $(this).attr('data-id');

                // Ajax config
                $.ajax({
                  type: "POST", //we are using GET method to get data from server side
                  url: '<?= URLROOT ?>/admin/event/detail/<?= $data['event']->id ?>/peserta/' + id,
                  data: {
                    status: status
                  }, // get the route value
                  beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                  },
                  success: function(response) { //once the request successfully process to the server side it will return result here
                    // Reload lists of employees
                    Swal.fire('Berhasil konfirmasi pendaftar', response, 'success').then((result) => {
                      if (result.isConfirmed) {
                        window.location.replace("<?= URLROOT ?>/admin/event/detail/<?= $data['event']->id ?>");
                      }
                    });
                  }
                });

              } else if (result.isDenied) {
                Swal.fire('Perubahan tidak disimpan', '', 'info')
              }
            });
          });
        }
      </script>