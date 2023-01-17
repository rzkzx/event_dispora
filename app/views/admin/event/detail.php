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

      <!-- deskripsi event -->
      <div class="card-box mb-30">
        <h5 class="card-header">Deskripsi Event</h5>
        <div class="row card-body">
          <div class="card-img col-md-2">
            <img src="<?= URLROOT; ?>/assets/images/event/<?= $data['event']->cover ?>" class="img-fluid rounded-start" alt="Event Cover" />
          </div>
          <div class="col-md-8">
            <h5 class="card-title">
              <?= $data['event']->nama ?>
            </h5>

            <p class="card-text"></p>
            <p style="text-align:justify;">
              <?= $data['event']->deskripsi ?>
            </p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item bi bi-person-fill"> <?= $data['event']->jenis ?></li>
              <li class="list-group-item bi bi-person-fill"> <?= $data['event']->jenjang ?></li>
              <li class="list-group-item bi bi-people-fill"> 250 orang</li>
              <li class="list-group-item bi bi-calendar-event-fill">
                <?= dateID($data['event']->tanggal) ?>
              </li>
              <li class="list-group-item bi bi-geo-alt-fill">
                <?= $data['event']->lokasi ?>
              </li>
            </ul>
          </div>
          <?php if ($data['event']->aktif) { ?>
            <div class="button col-md-2">
              <button type="button" class="btn btn-danger mt-15" id="btnAkhiri" data-id="<?= $data['event']->id ?>">Akhiri Event</button>
            </div>
          <?php } ?>
        </div>
      </div>

      <!-- peserta event -->
      <div class=" card-box mb-30">
        <div class="pd-20">
          <h4 class="text-dark h4">Data Peserta Event</h4>
        </div>
        <div class="pb-20">
          <?php flash() ?>
          <table class="table hover multiple-select-row data-table-export nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th class="table-plus datatable-nosort">Nama Peserta</th>
                <th>NIK</th>
                <th>Pendidikan</th>
                <th>Waktu Daftar</th>
                <th class="datatable-nosort">Status</th>
                <?php if ($data['event']->aktif) { ?>
                  <th class="datatable-nosort">Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data['peserta'] as $peserta) {
                if ($peserta->status == 'diterima') {
                  $badge = 'success';
                } elseif ($peserta->status == 'ditolak') {
                  $badge = 'danger';
                } else {
                  $badge = 'warning';
                }
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td class="table-plus"><?= $peserta->nama ?></td>
                  <td><?= $peserta->nik ?></td>
                  <td><?= $peserta->pendidikan ?></td>
                  <td><?= $peserta->waktu_daftar ?></td>
                  <td><span class="badge bg-<?= $badge ?> text-uppercase"><?= $peserta->status ?></span></td>
                  <?php if ($data['event']->aktif) { ?>
                    <td>
                      <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                          <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                          <a class="dropdown-item" href="<?= URLROOT; ?>/admin/event/detail/<?= $data['event']->id ?>/peserta/<?= $peserta->id ?>"><i class="dw dw-eye"></i> View</a>
                          <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  <?php } ?>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Export Datatable End -->

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

      <script>
        function alertConfirmation() {
          $(document).delegate("#btnAkhiri", "click", function() {
            Swal.fire({
              icon: 'warning',
              title: 'Apakah Event telah berakhir?',
              showDenyButton: false,
              showCancelButton: true,
              confirmButtonText: 'Selesai',
              cancelButtonText: 'Batal'
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {

                var id = $(this).attr('data-id');

                // Ajax config
                $.ajax({
                  type: "POST", //we are using GET method to get data from server side
                  url: '<?= URLROOT ?>/admin/event/akhiri/' + id, // get the route value
                  beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                  },
                  success: function(response) { //once the request successfully process to the server side it will return result here
                    // Reload lists of employees
                    Swal.fire('Event telah berakhir.', response, 'success').then((result) => {
                      if (result.isConfirmed) {
                        window.location.replace("<?= URLROOT ?>/admin/event");
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