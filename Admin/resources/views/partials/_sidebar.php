<?php
$currentAdminPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-between fixed-top px-3">
        <div>
          <div class="text-uppercase text-muted" style="font-size: 0.72rem; letter-spacing: 0.18em;">Ecommerce</div>
          <h3 class="mb-0 text-white" style="font-weight: 700;">Admin Hub</h3>
        </div>
        <a class="sidebar-brand brand-logo-mini" href="/Ecommerce/Admin/public/index.php">
          <img src="../resources/assets/images/logo-mini.svg" alt="logo" />
        </a>
      </div>

      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc px-3 pt-4">
            <div class="p-3 rounded" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(148, 163, 184, 0.10);">
              <div class="d-flex align-items-center">
                <div class="count-indicator mr-3">
                  <img class="img-xs rounded-circle" src="../resources/assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-1 font-weight-normal text-white">Henry Klein</h5>
                  <span style="color: #94a3b8;">Panel administrator</span>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item nav-category">
          <span class="nav-link">Workspace</span>
        </li>

        <li class="nav-item menu-items <?= $currentAdminPage === 'index.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="/Ecommerce/Admin/public/index.php">
            <span class="menu-icon">
              <i class="mdi mdi-view-dashboard-outline"></i>
            </span>
            <span class="menu-title">Users</span>
          </a>
        </li>

        <li class="nav-item menu-items <?= $currentAdminPage === 'register.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="/Ecommerce/Admin/public/register.php">
            <span class="menu-icon">
              <i class="mdi mdi-account-multiple-outline"></i>
            </span>
            <span class="menu-title">Registrations</span>
          </a>
        </li>

        <li class="nav-item menu-items <?= $currentAdminPage === 'banner.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="/Ecommerce/Admin/public/banner.php">
            <span class="menu-icon">
              <i class="mdi mdi-image-multiple-outline"></i>
            </span>
            <span class="menu-title">Banner Slider</span>
          </a>
        </li>

        <li class="nav-item menu-items <?= $currentAdminPage === 'product.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="/Ecommerce/Admin/public/product.php">
            <span class="menu-icon">
              <i class="mdi mdi-package-variant-closed"></i>
            </span>
            <span class="menu-title">Məhsul əlavə et</span>
          </a>
        </li>

        <li class="nav-item menu-items <?= $currentAdminPage === 'categories.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="/Ecommerce/Admin/public/categories.php">
            <span class="menu-icon">
              <i class="mdi mdi-format-list-bulleted-type"></i>
            </span>
            <span class="menu-title">Kateqoriyalar</span>
          </a>
        </li>

      </ul>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="/Ecommerce/Admin/public/index.php">
            <img src="../resources/assets/images/logo-mini.svg" alt="logo" />
          </a>
        </div>

        <div class="navbar-menu-wrapper flex-grow d-flex align-items-center justify-content-between px-3 px-lg-4">
          <div class="d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center mr-3" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>

          </div>

          <div class="d-flex align-items-center">
            <div class="d-none d-lg-flex align-items-center mr-3">
              <i class="mdi mdi-magnify text-muted" style="position: absolute; margin-left: 1rem; z-index: 1;"></i>
              <input type="text" class="form-control topbar-search pl-5" placeholder="Search inside admin">
            </div>

            <div class="d-flex align-items-center px-3 py-2 rounded-pill" style="background: rgba(37, 99, 235, 0.08);">
              <span class="badge badge-success mr-2" style="width: 10px; height: 10px; border-radius: 50%; padding: 0;"></span>
              <span style="color: #0f172a; font-weight: 600;">System online</span>
            </div>
          </div>
        </div>
      </nav>
