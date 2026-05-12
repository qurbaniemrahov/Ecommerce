<?php
include(__DIR__ . '/../../../config/connection.php');
require(__DIR__ . "/../../../app/Http/Controllers/user/user_edit_controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Admin User</title>

    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

    <style>
        .register-edit-shell {
            min-height: 100vh;
            padding: 2rem 1rem;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.12), transparent 30%),
                radial-gradient(circle at bottom right, rgba(34, 197, 94, 0.10), transparent 28%),
                #f4f7fb;
        }

        .register-edit-card {
            max-width: 820px;
            margin: 2rem auto;
            overflow: hidden;
            border: 0;
            border-radius: 8px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.10);
        }

        .register-edit-hero {
            padding: 2rem;
            color: #fff;
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #22c55e);
        }

        .register-edit-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            margin-bottom: 1rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .register-edit-title {
            margin-bottom: 0.5rem;
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: 0;
        }

        .register-edit-text {
            max-width: 560px;
            margin-bottom: 0;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.7;
        }

        .register-edit-id {
            border: 1px solid rgba(255, 255, 255, 0.45);
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
        }

        .register-edit-body {
            padding: 2rem;
            background: #fff;
        }

        .register-edit-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(220px, 1fr);
            gap: 1.5rem;
            align-items: start;
        }

        .register-edit-panel,
        .register-edit-side {
            border-radius: 8px;
        }

        .register-edit-panel {
            padding: 1.35rem;
            border: 1px solid #e2e8f0;
            background: #fff;
        }

        .register-edit-side {
            padding: 1.35rem;
            border: 1px solid #dbeafe;
            background: linear-gradient(180deg, #f8fafc, #eef4ff);
        }

        .register-edit-panel h5,
        .register-edit-side h5 {
            margin-bottom: 1rem;
            color: #0f172a;
            font-weight: 700;
        }

        .register-edit-field + .register-edit-field {
            margin-top: 1.15rem;
        }

        .register-edit-label {
            display: block;
            margin-bottom: 0.55rem;
            color: #0f172a;
            font-weight: 600;
        }

        .register-edit-input-wrap {
            position: relative;
        }

        .register-edit-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1rem;
        }

        .register-edit-input {
            width: 100%;
            min-height: 54px;
            padding: 0.9rem 1rem 0.9rem 2.9rem;
            border: 1px solid #dbe3ef;
            border-radius: 8px;
            background: #f8fafc;
            color: #0f172a;
            transition: all 0.2s ease;
        }

        .register-edit-input:focus {
            outline: none;
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .register-edit-help {
            display: block;
            margin-top: 0.55rem;
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .register-edit-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .register-edit-list li {
            display: flex;
            gap: 0.65rem;
            color: #334155;
            line-height: 1.7;
        }

        .register-edit-list li + li {
            margin-top: 0.8rem;
        }

        .register-edit-list i {
            margin-top: 0.25rem;
            color: #2563eb;
            font-size: 1rem;
        }

        .register-edit-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

        .register-edit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            min-width: 160px;
            min-height: 48px;
            border-radius: 8px;
            font-weight: 600;
        }

        .register-edit-back {
            background: #e2e8f0;
            color: #0f172a;
        }

        .register-edit-back:hover {
            background: #cbd5e1;
            color: #0f172a;
        }

        @media (max-width: 767px) {
            .register-edit-shell {
                padding: 1rem 0.75rem;
            }

            .register-edit-hero,
            .register-edit-body {
                padding: 1.5rem;
            }

            .register-edit-grid {
                grid-template-columns: 1fr;
            }

            .register-edit-title {
                font-size: 1.55rem;
            }

            .register-edit-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="register-edit-shell">
        <div class="card register-edit-card">
            <div class="register-edit-hero">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <span class="register-edit-badge">
                            <i class="mdi mdi-account-edit-outline"></i>
                            Admin Panel
                        </span>
                        <h1 class="register-edit-title">Admin hesabini yenile</h1>
                        <p class="register-edit-text">
                            Istifadecinin email melumatini redakte et ve lazimdirsa yeni sifre teyin et.
                        </p>
                    </div>
                    <?php if ($id !== null): ?>
                        <span class="badge badge-pill register-edit-id px-3 py-2 mt-2">ID: <?= htmlspecialchars((string) $id); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="register-edit-body">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?= htmlspecialchars($messageType ?: 'info'); ?> mb-4">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <div class="register-edit-grid">
                    <div class="register-edit-panel">
                        <h5>Hesab melumatlari</h5>

                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= htmlspecialchars((string) $id); ?>">

                            <div class="register-edit-field">
                                <label class="register-edit-label" for="email">Email</label>
                                <div class="register-edit-input-wrap">
                                    <i class="mdi mdi-email-outline register-edit-icon"></i>
                                    <input
                                        class="register-edit-input"
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="<?= htmlspecialchars($email); ?>"
                                        placeholder="example@site.com"
                                        required
                                    >
                                </div>
                                <small class="register-edit-help">Istifadeci bu email ile sistemde taniyacaq.</small>
                            </div>

                            <div class="register-edit-field">
                                <label class="register-edit-label" for="password">Yeni sifre</label>
                                <div class="register-edit-input-wrap">
                                    <i class="mdi mdi-lock-outline register-edit-icon"></i>
                                    <input
                                        class="register-edit-input"
                                        id="password"
                                        type="password"
                                        name="password"
                                        value=""
                                        placeholder="Deyismeye ehtiyac yoxdursa bos saxla"
                                    >
                                </div>
                                <small class="register-edit-help">Sifre daxil edilmese movcud sifre saxlanilacaq.</small>
                            </div>

                            <div class="register-edit-actions">
                                <button type="submit" name="update" value="1" class="btn btn-primary register-edit-btn">
                                    <i class="mdi mdi-content-save-outline"></i>
                                    Yadda saxla
                                </button>
                                <a href="../partials/_main_panel.php" class="btn register-edit-btn register-edit-back">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Geri qayit
                                </a>
                            </div>
                        </form>
                    </div>

                    <aside class="register-edit-side">
                        <h5>Qisa qeydler</h5>
                        <ul class="register-edit-list">
                            <li>
                                <i class="mdi mdi-check-circle-outline"></i>
                                <span>Email deyisende istifadeci yeni email ile daxil olacaq.</span>
                            </li>
                            <li>
                                <i class="mdi mdi-shield-lock-outline"></i>
                                <span>Sifre sahesini bos saxlasan, cari sifre deyismeyecek.</span>
                            </li>
                            <li>
                                <i class="mdi mdi-table-account"></i>
                                <span>Yadda saxladikdan sonra siyahi sehifesine qayida bilersen.</span>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
</body>
</html>
