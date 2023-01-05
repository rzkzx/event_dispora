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
          <h4 class="text-dark h4">Data Kritik, Saran & Pertanyaan</h4>
        </div>
        <div class="pb-20">
          <table class="data-tableee table stripe hover nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th class="table-plus datatable-nosort">Nama Lengkap</th>
                <th>Nomor Handphone</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data['saran'] as $saran) {
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td class="table-plus"><?= $saran->nama ?></td>
                  <td><?= $saran->no_hp ?></td>
                  <td><?= $saran->email ?></td>
                  <td><?php echo (strlen($saran->pesan) > 40) ? substr($saran->pesan, 0, 40) . "..." : $saran->pesan; ?></td>
                  <td><?= dateID($saran->tanggal) ?></td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="<?= URLROOT; ?>/admin/saran/detail/<?= $saran->id ?>"><i class="dw dw-eye"></i> View</a>
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