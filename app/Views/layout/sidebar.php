<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url(); ?>/images/unsub.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="brand-logo" href="index.html"><img class="img-sm rounded-circle" src="<?= base_url(); ?>/images/unsub.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img class="img-xs rounded-circle" src="<?= base_url(); ?>/images/unsub.png" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle" src="<?= base_url(); ?>/images/default.svg" alt="">
                <!-- <img class="img-xs rounded-circle" src="<?= user()->user_image; ?>" alt=""> -->
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal"><?= user()->username; ?></h5>
                <!-- <span>Role Admin</span> -->
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="<?= base_url('logout'); ?>" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Log Out</p>
                </div>
              </a>
            </div>
          </div>
        </li>

        <?php if (in_groups('adminbem')) : ?>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admin">
              <span class="menu-icon">
                <i class="mdi mdi-format-list-bulleted"></i>
              </span>
              <span class="menu-title">List User</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/ukmlist">
              <span class="menu-icon">
                <i class="mdi mdi-format-list-bulleted"></i>
              </span>
              <span class="menu-title">List UKM</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/pendaftaran">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Pendaftaran Anggota Baru UKM</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-bookmark-music"></i>
              </span>
              <span class="menu-title">UKM Dapur Musik</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pdapus">Profil UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/sdapus">Stuktur UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/adapus">Anggota UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/kdapus">Kegiatan UKM</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-book-open-variant"></i>
              </span>
              <span class="menu-title">UKM LDK Subulussalam</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pldk">Profil UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/sldk">Stuktur UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/aldk">Anggota UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/kldk">Kegiatan UKM</a></li>
              </ul>
            </div>
          </li>

        <?php elseif (in_groups('admindamus')) : ?>
          <!-- dapur musik -->
          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-bookmark-music"></i>
              </span>
              <span class="menu-title">UKM Dapur Musik</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pdapus">Profil UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/sdapus">Stuktur UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/adapus">Anggota UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/kdapus">Kegiatan UKM</a></li>
              </ul>
            </div>
          </li>

        <?php elseif (in_groups('adminldk')) :  ?>
          <!-- LDK -->
          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-book-open-variant"></i>
              </span>
              <span class="menu-title">UKM LDK Subulussalam</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pldk">Profil UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/sldk">Stuktur UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/aldk">Anggota UKM</a></li>
                <li class="nav-item"> <a class="nav-link" href="/kldk">Kegiatan UKM</a></li>
              </ul>
            </div>
          </li>
        <?php endif; ?>
      </ul>
    </nav>