<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="../resources/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../resources/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../resources/assets/css/style.css">
    <link rel="shortcut icon" href="../resources/assets/images/favicon.png" />
    <style>
      body {
        background:
          radial-gradient(circle at top left, rgba(37, 99, 235, 0.12), transparent 22%),
          radial-gradient(circle at bottom right, rgba(34, 197, 94, 0.10), transparent 26%),
          linear-gradient(180deg, #eef4ff 0%, #f7f9fc 42%, #f3f6fb 100%);
      }

      .container-scroller {
        background: transparent;
      }

      .page-body-wrapper {
        background: transparent;
      }

      .sidebar {
        background: linear-gradient(180deg, #081225 0%, #0f172a 52%, #111827 100%);
        box-shadow: 18px 0 40px rgba(15, 23, 42, 0.16);
      }

      .sidebar .sidebar-brand-wrapper {
        background: rgba(8, 18, 37, 0.92);
        border-bottom: 1px solid rgba(148, 163, 184, 0.12);
      }

      .sidebar .nav .nav-item.profile {
        background: transparent;
      }

      .sidebar .nav .nav-item .nav-link {
        margin: 0.2rem 0.85rem;
        border-radius: 16px;
        transition: all 0.2s ease;
      }

      .sidebar .nav .nav-item .nav-link:hover,
      .sidebar .nav .nav-item.active > .nav-link {
        background: rgba(255, 255, 255, 0.08);
      }

      .sidebar .nav .nav-item .menu-icon {
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.06);
      }

      .navbar {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(14px);
        border-bottom: 1px solid rgba(148, 163, 184, 0.16);
      }

      .navbar .form-control,
      .topbar-search {
        min-height: 46px;
        border: 1px solid #dbe3ef;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.86);
        color: #0f172a;
      }

      .navbar .form-control:focus,
      .topbar-search:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
      }

      .main-panel {
        background: transparent;
      }

      .content-wrapper {
        background: transparent;
        padding: 2rem 1.5rem 1.25rem;
      }

      .page-header {
        margin-bottom: 1.5rem;
      }

      .page-title {
        color: #0f172a;
        font-weight: 700;
        letter-spacing: -0.02em;
      }

      .admin-hero {
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
        padding: 1.9rem;
        border-radius: 26px;
        color: #fff;
        background:
          radial-gradient(circle at top left, rgba(34, 197, 94, 0.18), transparent 28%),
          linear-gradient(135deg, #0f172a 0%, #1d4ed8 55%, #0891b2 100%);
        box-shadow: 0 22px 48px rgba(15, 23, 42, 0.18);
      }

      .admin-hero::after {
        content: "";
        position: absolute;
        right: -32px;
        bottom: -48px;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
      }

      .admin-hero h2 {
        margin-bottom: 0.65rem;
        font-size: 2rem;
        font-weight: 700;
      }

      .admin-hero p {
        max-width: 680px;
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.82);
        line-height: 1.7;
      }

      .admin-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        margin-bottom: 1rem;
        padding: 0.55rem 0.95rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.12);
        font-weight: 600;
      }

      .admin-stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1rem;
      }

      .admin-stat-card {
        padding: 1.1rem 1.15rem;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.14);
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
      }

      .admin-stat-value {
        display: block;
        font-size: 1.8rem;
        line-height: 1.1;
        font-weight: 700;
      }

      .admin-stat-label {
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.92rem;
      }

      .card,
      .admin-panel-card {
        border: 0;
        border-radius: 24px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
      }

      .card .card-body,
      .admin-panel-card .card-body {
        padding: 1.6rem;
      }

      .admin-section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.25rem;
        flex-wrap: wrap;
      }

      .admin-section-head h4 {
        margin-bottom: 0.2rem;
        color: #0f172a;
        font-weight: 700;
      }

      .admin-section-head p {
        margin-bottom: 0;
        color: #64748b;
      }

      .table-responsive {
        border-radius: 18px;
      }

      .table {
        margin-bottom: 0;
      }

      .table thead th {
        border-top: 0;
        border-bottom: 1px solid #e2e8f0;
        color: #475569;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
      }

      .table td,
      .table th {
        padding: 1rem 0.85rem;
        vertical-align: middle;
      }

      .table tbody tr {
        transition: background 0.2s ease;
      }

      .table tbody tr:hover {
        background: rgba(37, 99, 235, 0.04);
      }

      .btn {
        border-radius: 14px;
        font-weight: 600;
      }

      .btn-pill {
        border-radius: 999px;
      }

      .admin-soft-card {
        height: 100%;
        padding: 1.2rem;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
      }

      .admin-soft-card h5 {
        margin-bottom: 0.45rem;
        color: #0f172a;
        font-weight: 700;
      }

      .admin-soft-card p {
        margin-bottom: 0;
        color: #64748b;
        line-height: 1.7;
      }

      .footer {
        margin-top: 1.25rem;
        padding: 1.15rem 1.5rem 0;
        background: transparent;
      }

      .footer .text-muted,
      .footer a {
        color: #64748b !important;
      }

      @media (max-width: 991px) {
        .content-wrapper {
          padding: 1.25rem 1rem;
        }

        .admin-hero {
          padding: 1.5rem;
        }

        .admin-hero h2 {
          font-size: 1.55rem;
        }
      }
    </style>
  </head>
