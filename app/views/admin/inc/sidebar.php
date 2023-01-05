<div class="left-side-bar">
  <div class="brand-logo">
    <a href="<?= URLROOT; ?>/admin/dashboard">
      <img src="<?= URLROOT; ?>/back/images/logo/dispora-kalsel.png" alt="" class="Dispora Logo" />
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li>
          <a href="<?= URLROOT; ?>/admin/dashboard" class="dropdown-toggle no-arrow <?php echo ($data['menu'] == 'Dashboard') ? 'active' : ''; ?>">
            <span class="micon bi-house-fill"></span><span class="mtext">Dashboard</span>
          </a>
        </li>
        <li class="dropdown <?php echo ($data['menu'] == 'Event') ? 'show' : ''; ?>">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-calendar-event-fill"></span><span class="mtext">Kelola Event</span>
          </a>
          <ul class="submenu" <?php echo ($data['menu'] == 'Event') ? 'style="display:block;"' : ''; ?>>
            <li><a href="<?= URLROOT; ?>/admin/event/add" class="<?php echo ($data['submenu'] == 'Buat Event') ? 'active' : ''; ?>">Buat Event</a></li>
            <li><a href="<?= URLROOT; ?>/admin/event" class="<?php echo ($data['submenu'] == 'Agenda Event') ? 'active' : ''; ?>">Agenda Event</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-person-fill"></span><span class="mtext">Kelola Pengguna</span>
          </a>
          <ul class="submenu">
            <li><a href="<?= URLROOT; ?>/admin/user/instansi">Akun Instansi</a></li>
            <li><a href="<?= URLROOT; ?>/admin/user/addinstansi">Tambahkan Akun Instansi</a></li>
            <li><a href="<?= URLROOT; ?>/admin/user/peserta">Akun Peserta</a></li>
          </ul>
        </li>
        <li>
          <a href="<?= URLROOT; ?>/admin/saran" class="dropdown-toggle no-arrow <?php echo ($data['menu'] == 'Saran') ? 'active' : ''; ?>">
            <span class="micon bi bi-chat-dots-fill"></span><span class="mtext">Kritik dan Tanya</span>
          </a>
      </ul>
    </div>
  </div>
</div>
<div class="mobile-menu-overlay"></div>