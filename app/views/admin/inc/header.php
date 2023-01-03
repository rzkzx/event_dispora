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
            <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
            <a class="dropdown-item" href="<?= URLROOT; ?>/admin/login/logout"><i class="dw dw-logout"></i> Log Out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>