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

      <!-- Akun Peserta-->
      <div class="card-box mb-30">
        <div class="pd-20">
          <h4 class="text-blue h4">Data Akun Peserta</h4>
        </div>
        <div class="pb-20">
          <?php flash(); ?>
          <table class="data-tableee table stripe hover nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th class="table-plus datatable-nosort">Nama Lengkap</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Alamat Domisili</th>
                <th>Jenis Kelamin</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data['users'] as $user) {
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td class="table-plus"><?= $user->nama ?></td>
                  <td><?= $user->nik ?></td>
                  <td><?= dateID($user->tanggal_lahir) ?></td>
                  <td><?= $user->alamat_dom ?></td>
                  <td><?= $user->jenis_kelamin ?></td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                        <button type="button" class="dropdown-item" id="btnDelete" data-id="<?= $user->id_user ?>"><i class="dw dw-delete-3"></i> Delete</button>
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
      <!-- Simple Datatable End -->

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>

      <script>
        function alertConfirmation() {
          $(document).delegate("#btnDelete", "click", function() {
            Swal.fire({
              icon: 'warning',
              title: 'Anda yakin menghapus peserta ini?',
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
                  url: '<?= URLROOT ?>/admin/user/delete/' + id, // get the route value
                  beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                  },
                  success: function(response) { //once the request successfully process to the server side it will return result here
                    // Reload lists of employees
                    Swal.fire('Berhasil Hapus Peserta.', response, 'success').then((result) => {
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