<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . '/../../../config/connection.php');

$flash = $_SESSION['banner_flash'] ?? null;
unset($_SESSION['banner_flash']);

$sliderStmt = $pdo->prepare("SELECT * FROM sliders ORDER BY id DESC");
$sliderStmt->execute();
$sliders = $sliderStmt->fetchAll(PDO::FETCH_ASSOC);

$sliderCount = count($sliders);
$activeCount = count(array_filter($sliders, static fn ($slider) => (int) ($slider['status'] ?? 0) === 1));
?>

<div class="main-panel">
  <div class="content-wrapper">
    <style>
      .banner-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        background:
          radial-gradient(circle at top left, rgba(34, 197, 94, 0.18), transparent 28%),
          linear-gradient(135deg, #0f172a 0%, #111827 45%, #0f766e 100%);
        color: #fff;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.18);
      }

      .banner-hero::after {
        content: "";
        position: absolute;
        inset: auto -40px -50px auto;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
      }

      .banner-kpis {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1rem;
        margin-top: 1.5rem;
      }

      .banner-kpi {
        padding: 1rem 1.1rem;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(8px);
      }

      .banner-kpi .value {
        display: block;
        font-size: 1.6rem;
        font-weight: 700;
        line-height: 1.1;
      }

      .banner-kpi .label {
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.92rem;
      }

      .banner-grid {
        margin-top: 1.5rem;
      }

      .banner-panel {
        border: 0;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 16px 34px rgba(15, 23, 42, 0.08);
        height: 100%;
      }

      .banner-panel .card-body {
        padding: 1.75rem;
      }

      .banner-label {
        display: block;
        margin-bottom: 0.55rem;
        color: #0f172a;
        font-weight: 600;
      }

      .banner-input,
      .banner-file {
        width: 100%;
        border-radius: 14px;
        border: 1px solid #dbe3ef;
        background: #f8fafc;
        color: #0f172a;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
      }

      .banner-input {
        min-height: 56px;
        padding: 0.95rem 1rem;
        font-size: 1rem;
      }

      .banner-input:focus,
      .banner-file:focus {
        outline: none;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.12);
        background: #fff;
      }

      .banner-file {
        min-height: 58px;
        padding: 0.9rem 1rem;
        cursor: pointer;
      }

      .banner-preview {
        margin-top: 1rem;
        min-height: 260px;
        border-radius: 20px;
        border: 1px dashed #cbd5e1;
        background:
          linear-gradient(135deg, rgba(14, 165, 233, 0.05), rgba(34, 197, 94, 0.08)),
          #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
      }

      .banner-preview img {
        width: 100%;
        height: 260px;
        object-fit: cover;
      }

      .banner-preview-empty {
        text-align: center;
        color: #64748b;
        padding: 1.25rem;
      }

      .slider-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.25rem;
      }

      .slider-card {
        overflow: hidden;
        border-radius: 20px;
        border: 1px solid #ebf0f6;
        background: #fff;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .slider-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 32px rgba(15, 23, 42, 0.10);
      }

      .slider-thumb {
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: #e2e8f0;
      }

      .slider-card-body {
        padding: 1.15rem;
      }

      .slider-title {
        margin-bottom: 0.45rem;
        color: #0f172a;
        font-weight: 700;
      }

      .slider-meta {
        margin-bottom: 1rem;
        color: #64748b;
        font-size: 0.9rem;
      }

      .slider-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
      }

      .slider-actions form {
        width: 100%;
      }

      .banner-submit,
      .slider-delete-btn {
        min-height: 52px;
        border-radius: 14px;
        font-weight: 600;
      }

      .banner-submit {
        box-shadow: 0 12px 24px rgba(37, 99, 235, 0.24);
      }

      .slider-delete-btn {
        width: 100%;
      }

      .banner-section-head {
        gap: 1rem;
      }

      .banner-side-note {
        padding: 1rem 1.1rem;
        border-radius: 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #64748b;
        line-height: 1.6;
      }

      @media (max-width: 991px) {
        .banner-panel .card-body {
          padding: 1.25rem;
        }
      }
    </style>

    <div class="page-header">
      <h3 class="page-title">Banner Slider</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb"></ol>
      </nav>
    </div>

    <div class="banner-hero">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="badge badge-success px-3 py-2 mb-3">Homepage Visual Manager</span>
          <h2 class="mb-2">Slider hisseni daha temiz, guclu ve idarasi rahat etdik.</h2>
          <p class="mb-0 text-light">Buradan yeni banner elave et, sekil preview-na bax ve movcud sliderleri bir yerde rahat idare et.</p>
        </div>
        <div class="col-lg-5">
          <div class="banner-kpis">
            <div class="banner-kpi">
              <span class="value"><?= $sliderCount; ?></span>
              <span class="label">Total sliders</span>
            </div>
            <div class="banner-kpi">
              <span class="value"><?= $activeCount; ?></span>
              <span class="label">Active sliders</span>
            </div>
            <div class="banner-kpi">
              <span class="value"><?= $sliderCount > 0 ? 'Ready' : 'Empty'; ?></span>
              <span class="label">Current state</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if (!empty($flash)): ?>
      <div class="alert alert-<?= htmlspecialchars($flash['type']); ?> mb-4">
        <?= htmlspecialchars($flash['message']); ?>
      </div>
    <?php endif; ?>

    <div class="row banner-grid">
      <div class="col-12 col-xl-5 mb-4">
        <div class="card banner-panel">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4 banner-section-head flex-wrap">
              <div>
                <h4 class="mb-1">Add New Slide</h4>
                <p class="text-muted mb-0">Basliq ve sekil sec, sonra slider listesine elave et.</p>
              </div>
              <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; flex: 0 0 auto;">
                <i class="mdi mdi-image-plus text-white" style="font-size: 1.4rem;"></i>
              </div>
            </div>

            <form action="/Ecommerce/Admin/app/Http/Controllers/sliders/slider_controller.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="create">

              <div class="form-group">
                <label class="banner-label" for="slider-title">Slider Title</label>
                <input class="banner-input" id="slider-title" type="text" name="title" placeholder="Summer Campaign Banner" required>
              </div>

              <div class="form-group mb-0">
                <label class="banner-label" for="slider-image">Slider Image</label>
                <input class="banner-file" id="slider-image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required>
                <small class="text-muted d-block mt-2">Tovsiyye olunur: genis banner formatinda JPG, PNG ve ya WEBP sekil.</small>
              </div>

              <div class="banner-preview" id="bannerPreview">
                <div class="banner-preview-empty">
                  <i class="mdi mdi-image-filter-hdr d-block mb-2" style="font-size: 2rem;"></i>
                  <div>Secdiyin sekil burada preview kimi gorunecek.</div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 banner-submit">Upload Slider</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-12 col-xl-7 mb-4">
        <div class="card banner-panel">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap banner-section-head">
              <div>
                <h4 class="mb-1">Current Sliders</h4>
                <p class="text-muted mb-0">Saytda gosterilen bannerlerin siyahisi.</p>
              </div>
              <span class="badge badge-outline-info px-3 py-2"><?= $sliderCount; ?> item</span>
            </div>

            <div class="banner-side-note mb-4">
              Aktiv bannerleri buradan daha rahat izle, lazim olmayanlari tek toxunusla sil ve sekillerin gorunusunu kart icinde birbasa yoxla.
            </div>

            <?php if (!$sliders): ?>
              <div class="text-center py-5">
                <div class="mb-3">
                  <i class="mdi mdi-image-off" style="font-size: 3rem; color: #94a3b8;"></i>
                </div>
                <h5 class="text-dark">No slider added yet</h5>
                <p class="text-muted mb-0">Ilk banneri elave etdikden sonra burada gorunecek.</p>
              </div>
            <?php else: ?>
              <div class="slider-list">
                <?php foreach ($sliders as $slider): ?>
                  <div class="slider-card">
                    <img
                      class="slider-thumb"
                      src="<?= htmlspecialchars($slider['image']); ?>"
                      alt="<?= htmlspecialchars($slider['title']); ?>"
                    >
                    <div class="slider-card-body">
                      <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="slider-title"><?= htmlspecialchars($slider['title']); ?></h5>
                        <span class="badge badge-<?= (int) ($slider['status'] ?? 0) === 1 ? 'success' : 'secondary'; ?>">
                          <?= (int) ($slider['status'] ?? 0) === 1 ? 'Active' : 'Passive'; ?>
                        </span>
                      </div>
                      <div class="slider-meta">
                        ID: <?= (int) $slider['id']; ?><br>
                        Added: <?= htmlspecialchars((string) ($slider['created_at'] ?? '')); ?>
                      </div>
                      <div class="slider-actions">
                        <form action="/Ecommerce/Admin/app/Http/Controllers/sliders/slider_controller.php" method="POST" onsubmit="return confirm('Bu slider silinsin?');">
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="id" value="<?= (int) $slider['id']; ?>">
                          <button type="submit" class="btn btn-danger slider-delete-btn">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
        Copyright © bootstrapdash.com 2020
      </span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
        Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a>
      </span>
    </div>
  </footer>
</div>

<script>
  (function () {
    var input = document.getElementById('slider-image');
    var preview = document.getElementById('bannerPreview');

    if (!input || !preview) {
      return;
    }

    input.addEventListener('change', function (event) {
      var file = event.target.files && event.target.files[0];

      if (!file) {
        preview.innerHTML =
          '<div class="banner-preview-empty"><i class="mdi mdi-image-filter-hdr d-block mb-2" style="font-size: 2rem;"></i><div>Secdiyin sekil burada preview kimi gorunecek.</div></div>';
        return;
      }

      var reader = new FileReader();
      reader.onload = function (loadEvent) {
        preview.innerHTML = '<img src="' + loadEvent.target.result + '" alt="Preview">';
      };
      reader.readAsDataURL(file);
    });
  })();
</script>
