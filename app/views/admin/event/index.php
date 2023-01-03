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
      <!-- Simple Datatable start -->
      <div class="card-box mb-30">
        <div class="pd-20">
          <h4 class="text-dark h4">Data Agenda Event</h4>
        </div>
        <div class="pb-20">
          <?php flash(); ?>
          <table class="table hover stripe data-table-export nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th class="table-plus datatable-nosort">Nama Event</th>
                <th>Jenis Event</th>
                <th>Jenjang Event</th>
                <th>Status Event</th>
                <th>Tanggal Pelaksanaan</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data['event'] as $event) {
                if ($event->aktif) {
                  $status = 'Berlangsung';
                  $badge = 'warning';
                } else {
                  $status = 'Selesai';
                  $badge = 'success';
                }
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td class="table-plus"><?= $event->nama ?></td>
                  <td><?= $event->jenis ?></td>
                  <td><?= $event->jenjang ?></td>
                  <td><span class="badge bg-<?= $badge ?>"><?= $status ?></span></td>
                  <td><?= dateID($event->tanggal) ?></td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="<?= URLROOT; ?>/admin/event/detail/<?= $event->id ?>""><i class=" dw dw-eye"></i> View</a>
                        <?php if ($event->aktif) { ?>
                          <a class="dropdown-item" href="<?= URLROOT; ?>/admin/event/edit/<?= $event->id ?>""><i class=" dw dw-edit2"></i> Edit</a>
                          <button type="button" class="dropdown-item" id="btnDelete" data-id="<?= $event->id ?>"><i class="dw dw-delete-3"></i> Delete</button>
                        <?php } ?>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

      <script>
        function alertConfirmation() {
          $(document).delegate("#btnDelete", "click", function() {
            Swal.fire({
              icon: 'warning',
              title: 'Anda yakin menghapus event ini?',
              showDenyButton: false,
              showCancelButton: true,
              confirmButtonText: 'Hapus',
              cancelButtonText: 'Batal'
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {

                var id = $(this).attr('data-id');

                // Ajax config
                $.ajax({
                  type: "POST", //we are using GET method to get data from server side
                  url: '<?= URLROOT ?>/admin/event/delete/' + id, // get the route value
                  beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                  },
                  success: function(response) { //once the request successfully process to the server side it will return result here
                    // Reload lists of employees
                    Swal.fire('Berhasil Hapus Event.', response, 'success').then((result) => {
                      if (result.isConfirmed) {
                        location.reload();
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