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
      .banner-shell {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
      }

      .banner-topbar {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.25rem;
      }

      .banner-topbar p {
        margin: 0.45rem 0 0;
        max-width: 760px;
        color: #64748b;
      }

      .banner-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(148, 163, 184, 0.18);
        color: #0f172a;
        font-weight: 600;
        white-space: nowrap;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
      }

      .banner-overview {
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
        padding: 1.5rem;
        border-radius: 30px;
        background:
          radial-gradient(circle at top right, rgba(125, 211, 252, 0.26), transparent 24%),
          radial-gradient(circle at bottom left, rgba(16, 185, 129, 0.18), transparent 28%),
          linear-gradient(135deg, #07111f 0%, #0f172a 46%, #123b4a 100%);
        color: #fff;
        box-shadow: 0 28px 48px rgba(15, 23, 42, 0.14);
        max-width: 1180px;
        margin-left: auto;
        margin-right: auto;
      }

      .banner-overview::after {
        content: "";
        position: absolute;
        right: -80px;
        top: -80px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
      }

      .banner-overview-grid {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(320px, 0.8fr);
        gap: 1.25rem;
        align-items: end;
      }

      .banner-overview-copy h2 {
        margin-bottom: 0.65rem;
        font-size: 2.1rem;
        line-height: 1.1;
        font-weight: 700;
        letter-spacing: -0.03em;
      }

      .banner-overview-copy p {
        margin-bottom: 0;
        max-width: 720px;
        color: rgba(255, 255, 255, 0.78);
        line-height: 1.65;
      }

      .banner-pill-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-top: 1rem;
      }

      .banner-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.65rem 0.95rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.92);
        font-size: 0.92rem;
      }

      .banner-stat-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.9rem;
      }

      .banner-stat-card {
        padding: 1rem;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
      }

      .banner-stat-card strong {
        display: block;
        margin-bottom: 0.25rem;
        font-size: 1.6rem;
        font-weight: 700;
      }

      .banner-stat-card span {
        color: rgba(255, 255, 255, 0.74);
        font-size: 0.88rem;
      }

      .banner-stat-card--wide {
        grid-column: 1 / -1;
      }

      .banner-layout {
        display: grid;
        grid-template-columns: minmax(320px, 380px) minmax(0, 1fr);
        gap: 1.5rem;
        align-items: start;
        max-width: 1180px;
        margin: 0 auto;
      }

      .banner-card {
        border: 0;
        border-radius: 28px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
        width: 100%;
      }

      .banner-card-body {
        padding: 1.4rem;
      }

      .banner-form-card {
        position: sticky;
        top: 96px;
      }

      .banner-section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
      }

      .banner-section-head h4 {
        margin-bottom: 0.25rem;
        color: #0f172a;
      }

      .banner-section-head p {
        margin-bottom: 0;
        color: #64748b;
      }

      .banner-icon-box {
        width: 52px;
        height: 52px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: linear-gradient(135deg, #0ea5e9, #2563eb);
        color: #fff;
        flex: 0 0 auto;
        box-shadow: 0 12px 24px rgba(37, 99, 235, 0.22);
      }

      .banner-label {
        display: block;
        margin-bottom: 0.5rem;
        color: #0f172a;
        font-weight: 600;
      }

      .banner-input,
      .banner-file {
        width: 100%;
        border-radius: 16px;
        border: 1px solid #dbe3ef;
        background: #f8fafc;
        color: #0f172a;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
      }

      .banner-input {
        min-height: 52px;
        padding: 0.9rem 1rem;
      }

      .banner-file {
        min-height: 52px;
        padding: 0.78rem 1rem;
        cursor: pointer;
      }

      .banner-input:focus,
      .banner-file:focus {
        outline: none;
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.14);
        background: #fff;
      }

      .banner-preview {
        margin-top: 1rem;
        min-height: 220px;
        border-radius: 22px;
        overflow: hidden;
        border: 1px dashed #cbd5e1;
        background:
          linear-gradient(135deg, rgba(14, 165, 233, 0.06), rgba(34, 197, 94, 0.08)),
          #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .banner-preview img {
        width: 100%;
        height: 220px;
        object-fit: cover;
      }

      .banner-preview-empty {
        text-align: center;
        color: #64748b;
        padding: 1.5rem;
      }

      .banner-helper {
        display: grid;
        gap: 0.75rem;
        margin-top: 1rem;
      }

      .banner-helper-box {
        padding: 0.9rem 1rem;
        border-radius: 18px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #475569;
        line-height: 1.5;
      }

      .banner-submit {
        min-height: 50px;
        margin-top: 1rem;
        border-radius: 16px;
        font-weight: 700;
        box-shadow: 0 14px 26px rgba(37, 99, 235, 0.2);
      }

      .banner-library-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
      }

      .banner-library-head p {
        margin: 0.35rem 0 0;
        color: #64748b;
      }

      .banner-note {
        margin-bottom: 1rem;
        padding: 1rem 1.1rem;
        border-radius: 18px;
        background: linear-gradient(135deg, #f8fbff 0%, #f3f9f7 100%);
        border: 1px solid #dfe9f3;
        color: #526277;
        line-height: 1.55;
      }

      .slider-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1rem;
      }

      .slider-card {
        overflow: hidden;
        border-radius: 22px;
        border: 1px solid #e5edf5;
        background: #fff;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
      }

      .slider-card:hover {
        transform: translateY(-4px);
        border-color: #d1dceb;
        box-shadow: 0 20px 32px rgba(15, 23, 42, 0.08);
      }

      .slider-thumb-wrap {
        position: relative;
      }

      .slider-thumb {
        width: 100%;
        height: 170px;
        object-fit: cover;
        background: #e2e8f0;
      }

      .slider-status {
        position: absolute;
        top: 0.9rem;
        right: 0.9rem;
      }

      .slider-card-body {
        padding: 1rem;
      }

      .slider-title-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 0.75rem;
        margin-bottom: 0.65rem;
      }

      .slider-title {
        margin: 0;
        color: #0f172a;
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.35;
      }

      .slider-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.75rem;
        margin-bottom: 1rem;
      }

      .slider-meta-item {
        padding: 0.75rem 0.8rem;
        border-radius: 16px;
        background: #f8fafc;
        border: 1px solid #edf2f7;
      }

      .slider-meta-item span {
        display: block;
        margin-bottom: 0.2rem;
        color: #94a3b8;
        font-size: 0.76rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
      }

      .slider-meta-item strong {
        display: block;
        color: #334155;
        font-size: 0.9rem;
        word-break: break-word;
      }

      .slider-actions form {
        margin: 0;
      }

      .slider-delete-btn {
        width: 100%;
        min-height: 46px;
        border-radius: 14px;
        font-weight: 600;
      }

      .banner-empty {
        padding: 3rem 1.5rem;
        text-align: center;
      }

      .banner-empty i {
        display: block;
        margin-bottom: 0.75rem;
        color: #94a3b8;
        font-size: 3rem;
      }

      @media (max-width: 1199px) {
        .banner-overview-grid {
          grid-template-columns: 1fr;
        }

        .banner-layout {
          grid-template-columns: 1fr;
          max-width: 760px;
        }

        .banner-form-card {
          position: static;
        }
      }

      @media (max-width: 767px) {
        .banner-topbar {
          flex-direction: column;
          align-items: flex-start;
        }

        .banner-overview {
          padding: 1.2rem;
          border-radius: 24px;
        }

        .banner-overview-copy h2 {
          font-size: 1.6rem;
        }

        .banner-stat-grid {
          grid-template-columns: 1fr;
        }

        .banner-card-body {
          padding: 1rem;
        }

        .banner-section-head,
        .banner-library-head {
          flex-direction: column;
          align-items: flex-start;
        }

        .slider-list {
          grid-template-columns: 1fr;
        }

        .slider-meta-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>

    <div class="banner-shell">
      <div class="banner-topbar">
        <div>
          <h3 class="page-title mb-1">Banner Slider</h3>
          <p>Banner idarəsini sıfırdan daha təmiz, səliqəli və responsive panel kimi qurduq. Əlavə etmə, preview və silmə əməliyyatları eyni axında daha rahat görünür.</p>
        </div>
        <div class="banner-chip">
          <i class="mdi mdi-monitor-dashboard"></i>
          Visual control panel
        </div>
      </div>

      <div class="banner-overview">
        <div class="banner-overview-grid">
          <div class="banner-overview-copy">
            <span class="badge badge-success px-3 py-2 mb-3">Homepage Visual Manager</span>
            <h2>Homepage slider hissəsini daha güclü vizual idarə panelinə çevirdik.</h2>
            <p>Yeni banner əlavə et, şəkli öncədən yoxla və aktiv bannerləri kart şəklində rahat idarə et. Dizayn həm geniş ekranda, həm də mobil görünüşdə balanslı qalır.</p>

            <div class="banner-pill-row">
              <div class="banner-pill">
                <i class="mdi mdi-image-multiple"></i>
                Daha rahat siyahı görünüşü
              </div>
              <div class="banner-pill">
                <i class="mdi mdi-cellphone"></i>
                Responsive layout
              </div>
              <div class="banner-pill">
                <i class="mdi mdi-eye-outline"></i>
                Instant preview
              </div>
            </div>
          </div>

          <div class="banner-stat-grid">
            <div class="banner-stat-card">
              <strong><?= $sliderCount; ?></strong>
              <span>Total sliders</span>
            </div>
            <div class="banner-stat-card">
              <strong><?= $activeCount; ?></strong>
              <span>Active sliders</span>
            </div>
            <div class="banner-stat-card banner-stat-card--wide">
              <strong><?= $sliderCount > 0 ? 'Ready to manage' : 'Start adding'; ?></strong>
              <span><?= $sliderCount > 0 ? 'Movcud bannerler bir panelde toplanib.' : 'Ilk banneri elave ederek bu hisseni doldura bilersen.'; ?></span>
            </div>
          </div>
        </div>
      </div>

      <?php if (!empty($flash)): ?>
        <div class="alert alert-<?= htmlspecialchars($flash['type']); ?> mb-4">
          <?= htmlspecialchars($flash['message']); ?>
        </div>
      <?php endif; ?>

      <div class="banner-layout">
        <div class="banner-card banner-form-card">
          <div class="banner-card-body">
            <div class="banner-section-head">
              <div>
                <h4 class="mb-1">Yeni banner əlavə et</h4>
                <p>Başlıq və şəkil seç, sonra slider listinə göndər.</p>
              </div>
              <div class="banner-icon-box">
                <i class="mdi mdi-image-plus" style="font-size: 1.35rem;"></i>
              </div>
            </div>

            <form action="/Ecommerce/Admin/app/Http/Controllers/sliders/slider_controller.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="create">

              <div class="form-group">
                <label class="banner-label" for="slider-title">Slider Title</label>
                <input class="banner-input" id="slider-title" type="text" name="title" placeholder="Spring collection campaign" required>
              </div>

              <div class="form-group mb-0">
                <label class="banner-label" for="slider-image">Slider Image</label>
                <input class="banner-file" id="slider-image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required>
                <small class="text-muted d-block mt-2">Tovsiyye olunur: genis banner olcusu, JPG, PNG ve ya WEBP.</small>
              </div>

              <div class="banner-preview" id="bannerPreview">
                <div class="banner-preview-empty">
                  <i class="mdi mdi-image-filter-center-focus d-block mb-2" style="font-size: 2rem;"></i>
                  <div>Secdiyin sekil burada preview kimi gorunecek.</div>
                </div>
              </div>

              <div class="banner-helper">
                <div class="banner-helper-box">
                  Basliq qisa ve aydin olsa, slider kartlarinda daha seliqeli gorunur.
                </div>
                <div class="banner-helper-box">
                  Sekil secenden sonra on baxis dərhal asagida gorunur.
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-lg btn-block banner-submit">Upload Slider</button>
            </form>
          </div>
        </div>

        <div class="banner-card">
          <div class="banner-card-body">
            <div class="banner-library-head">
              <div>
                <h4 class="mb-1">Movcud sliderler</h4>
                <p>Saytda gosterilen bannerler kart gorunusunde burada toplanir.</p>
              </div>
              <span class="badge badge-outline-info px-3 py-2"><?= $sliderCount; ?> item</span>
            </div>

            <div class="banner-note">
              Lazim olmayan bannerleri bir toxunusla sil, sekilleri kart icinde yoxla ve paneli hem desktop, hem de mobil ekranda rahat istifade et.
            </div>

            <?php if (!$sliders): ?>
              <div class="banner-empty">
                <i class="mdi mdi-image-off"></i>
                <h5 class="text-dark">No slider added yet</h5>
                <p class="text-muted mb-0">Ilk banner elave edildikden sonra burada gorunecek.</p>
              </div>
            <?php else: ?>
              <div class="slider-list">
                <?php foreach ($sliders as $slider): ?>
                  <div class="slider-card">
                    <div class="slider-thumb-wrap">
                      <img
                        class="slider-thumb"
                        src="<?= htmlspecialchars($slider['image']); ?>"
                        alt="<?= htmlspecialchars($slider['title']); ?>"
                      >
                      <div class="slider-status">
                        <span class="badge badge-<?= (int) ($slider['status'] ?? 0) === 1 ? 'success' : 'secondary'; ?>">
                          <?= (int) ($slider['status'] ?? 0) === 1 ? 'Active' : 'Passive'; ?>
                        </span>
                      </div>
                    </div>

                    <div class="slider-card-body">
                      <div class="slider-title-row">
                        <h5 class="slider-title"><?= htmlspecialchars($slider['title']); ?></h5>
                      </div>

                      <div class="slider-meta-grid">
                        <div class="slider-meta-item">
                          <span>ID</span>
                          <strong><?= (int) $slider['id']; ?></strong>
                        </div>
                        <div class="slider-meta-item">
                          <span>Added</span>
                          <strong><?= htmlspecialchars((string) ($slider['created_at'] ?? '')); ?></strong>
                        </div>
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
