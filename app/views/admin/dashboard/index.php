<?php require APPROOT . '/views/admin/inc/header.php'; ?>

<div class="main-container">
  <div class="xs-pd-20-10 pd-ltr-20">
    <div class="pd-ltr-20">
      <div class="page-header">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="title">
              <h4>Dashboard</h4>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 text-right">
          </div>
        </div>
      </div>

      <!-- card -->
      <div class="row">
        <div class="col-xl-3 mb-30">
          <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
              <div class="progress-data">
                <div id="chart"></div>
              </div>
              <div class="widget-data">
                <div class="h4 mb-0"><?= $data['countEvent'] ?></div>
                <div class="weight-600 font-14">Jumlah Seluruh Event</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 mb-30">
          <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
              <div class="progress-data">
                <div id="chart2"></div>
              </div>
              <div class="widget-data">
                <div class="h4 mb-0">40</div>
                <div class="weight-600 font-14">Jumlah Peserta</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 mb-30">
          <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
              <div class="progress-data">
                <div id="chart3"></div>
              </div>
              <div class="widget-data">
                <div class="h4 mb-0">350</div>
                <div class="weight-600 font-14">Jumlah Sedang Berjalan</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 mb-30">
          <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
              <div class="progress-data">
                <div id="chart4"></div>
              </div>
              <div class="widget-data">
                <div class="h4 mb-0">$6060</div>
                <div class="weight-600 font-14">Jumlah Sudah Selesai </div>
              </div>
            </div>
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