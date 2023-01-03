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
              <a href="#" class="btn btn-danger mt-15">Akhiri Event</a>
            </div>
          <?php } ?>

        </div>
      </div>

      <!-- peserta event -->
      <div class="card-box mb-30">
        <div class="pd-20">
          <h4 class="text-dark h4">Data Peserta Event</h4>
        </div>
        <div class="pb-20">
          <table class="table hover multiple-select-row data-table-export nowrap">
            <thead>
              <tr>
                <th class="table-plus datatable-nosort">Nama Peserta</th>
                <th>NIK</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th class="datatable-nosort">Status</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>30</td>
                <td>Gemini</td>
                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                <td><span class="badge bg-warning">Menunggu</span></td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="detail-peserta.html"><i class="dw dw-eye"></i> View</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>20</td>
                <td>Gemini</td>
                <td>2829 Trainer Avenue Peoria, IL 61602</td>
                <td>
                  <span class="badge bg-success">Diterima</span>
                </td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="detail-peserta.html"><i class="dw dw-eye"></i> View</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Export Datatable End -->

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>