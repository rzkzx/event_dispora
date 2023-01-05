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
          <h4 class="text-blue h4">Data Akun Instansi</h4>
        </div>
        <div class="pb-20">
          <table class="data-tableee table stripe hover nowrap">
            <thead>
              <tr>
                <th class="table-plus datatable-nosort">Nama Lengkap </th>
                <th>level User</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="table-plus">Gloria F. Mead</td>
                <td>25</td>
                <td>Sagittarius</td>
                <td>29-03-2018</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>30</td>
                <td>Gemini</td>
                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
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
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>30</td>
                <td>Sagittarius</td>
                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>25</td>
                <td>Gemini</td>
                <td>2829 Trainer Avenue Peoria, IL 61602</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>20</td>
                <td>Sagittarius</td>
                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>18</td>
                <td>Gemini</td>
                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="table-plus">Andrea J. Cagle</td>
                <td>30</td>
                <td>Sagittarius</td>
                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                <td>
                  <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                      <a class="dropdown-item" href="tambah-user.html"><i class="dw dw-edit2"></i> Edit</a>
                      <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Simple Datatable End -->

      <?php require APPROOT . '/views/admin/inc/footer.php'; ?>