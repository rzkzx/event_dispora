<!DOCTYPE html>
<html>

<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8" />
  <title><?= $data['title'] ?></title>

  <!-- Site favicon -->
  <link rel="shortcut icon" href="<?= URLROOT; ?>/back/images/logo/kalsel-small.png" type="image/x-icon">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/styles/core.css" />
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/styles/icon-font.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/plugins/datatables/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/plugins/datatables/css/responsive.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/styles/style.css" />
  <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/plugins/sweetalert2/sweetalert2.min.css" />

  <style>
    /* avatar upload style */
    .avatar-upload {
      position: relative;
      max-width: 205px;
      margin: 20px auto;
    }

    .avatar-upload .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }

    .avatar-upload .avatar-edit input {
      display: none;
    }

    .avatar-upload .avatar-edit label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid #d4d4d4;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all .2s ease-in-out;
    }

    .avatar-upload .avatar-edit label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit label i {
      color: #404258;
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }

    .avatar-preview {
      width: 192px;
      height: 192px;
      position: relative;
      border-radius: 100%;
      box-shadow: 0px 3px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-preview div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
</head>

<body class="header-white sidebar-light">

  <div class="header">
    <div class="header-left">
      <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
      <div class="user-info-dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
              <img src="<?= URLROOT; ?>/back/images/man.png" alt="" />
            </span>
            <span class="user-name"><?= $_SESSION['nama'] ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="dropdown-item" href="<?= URLROOT; ?>/admin/user"><i class="dw dw-user1"></i> Profile</a>
            <a class="dropdown-item" href="<?= URLROOT; ?>/admin/login/logout"><i class="dw dw-logout"></i> Log Out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>