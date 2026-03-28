<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>

    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

    <style>
        .user-add-shell {
            min-height: 100vh;
            padding: 2rem 1rem;
            background:
                radial-gradient(circle at top left, rgba(34, 197, 94, 0.12), transparent 32%),
                radial-gradient(circle at bottom right, rgba(37, 99, 235, 0.12), transparent 30%),
                #f4f7fb;
        }

        .user-add-card {
            max-width: 760px;
            margin: 2rem auto;
            border: 0;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.10);
        }

        .user-add-hero {
            padding: 2rem;
            color: #fff;
            background: linear-gradient(135deg, #0f172a, #1d4ed8 56%, #22c55e);
        }

        .user-add-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            margin-bottom: 1rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .user-add-title {
            margin-bottom: 0.5rem;
            font-size: 2rem;
            font-weight: 700;
        }

        .user-add-text {
            max-width: 540px;
            margin-bottom: 0;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.7;
        }

        .user-add-body {
            padding: 2rem;
            background: #fff;
        }

        .user-add-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(220px, 1fr);
            gap: 1.5rem;
            align-items: start;
        }

        .user-add-panel {
            padding: 1.35rem;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            background: #fff;
        }

        .user-add-side {
            padding: 1.35rem;
            border-radius: 20px;
            background: linear-gradient(180deg, #f8fafc, #eef4ff);
            border: 1px solid #dbeafe;
        }

        .user-add-side h5,
        .user-add-panel h5 {
            margin-bottom: 1rem;
            color: #0f172a;
            font-weight: 700;
        }

        .user-add-field + .user-add-field {
            margin-top: 1.15rem;
        }

        .user-add-label {
            display: block;
            margin-bottom: 0.55rem;
            color: #0f172a;
            font-weight: 600;
        }

        .user-add-input-wrap {
            position: relative;
        }

        .user-add-input-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1rem;
        }

        .user-add-input {
            width: 100%;
            min-height: 54px;
            padding: 0.9rem 1rem 0.9rem 2.9rem;
            border: 1px solid #dbe3ef;
            border-radius: 14px;
            background: #f8fafc;
            color: #0f172a;
            transition: all 0.2s ease;
        }

        .user-add-input:focus {
            outline: none;
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .user-add-help {
            display: block;
            margin-top: 0.55rem;
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .user-add-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .user-add-list li {
            position: relative;
            padding-left: 1.5rem;
            color: #334155;
            line-height: 1.7;
        }

        .user-add-list li + li {
            margin-top: 0.75rem;
        }

        .user-add-list li::before {
            content: "";
            position: absolute;
            top: 0.72rem;
            left: 0;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #22c55e);
        }

        .user-add-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

        .user-add-btn {
            min-width: 160px;
            min-height: 48px;
            border-radius: 999px;
            font-weight: 600;
        }

        .user-add-btn-light {
            background: #e2e8f0;
            color: #0f172a;
        }

        .user-add-btn-light:hover {
            background: #cbd5e1;
            color: #0f172a;
        }

        @media (max-width: 767px) {
            .user-add-shell {
                padding: 1rem 0.75rem;
            }

            .user-add-hero,
            .user-add-body {
                padding: 1.5rem;
            }

            .user-add-grid {
                grid-template-columns: 1fr;
            }

            .user-add-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="user-add-shell">
        <div class="card user-add-card">
            <div class="user-add-hero">
                <span class="user-add-badge">
                    <i class="mdi mdi-account-plus-outline"></i>
                    Admin Panel
                </span>
                <h1 class="user-add-title">Yeni istifadəçi əlavə et</h1>
                <p class="user-add-text">
                    İdarəetmə panelinə yeni hesab yarat, giriş məlumatlarını təyin et və
                    istifadəçi siyahısını daha rahat idarə et.
                </p>
            </div>

            <div class="user-add-body">
                <div class="user-add-grid">
                    <div class="user-add-panel">
                        <h5>Hesab məlumatları</h5>

                        <form action="../../../app/Http/Controllers/user/user.php" method="POST">
                            <div class="user-add-field">
                                <label class="user-add-label" for="email">Email</label>
                                <div class="user-add-input-wrap">
                                    <i class="mdi mdi-email-outline user-add-input-icon"></i>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="user-add-input"
                                        placeholder="example@site.com"
                                        required
                                    >
                                </div>
                                <small class="user-add-help">İstifadəçi bu email ilə sistemə daxil olacaq.</small>
                            </div>

                            <div class="user-add-field">
                                <label class="user-add-label" for="password">Şifrə</label>
                                <div class="user-add-input-wrap">
                                    <i class="mdi mdi-lock-outline user-add-input-icon"></i>
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="user-add-input"
                                        placeholder="Minimum 6 simvol"
                                        required
                                    >
                                </div>
                                <small class="user-add-help">Sadə deyil, təhlükəsiz bir şifrə seçmək məsləhətdir.</small>
                            </div>

                            <div class="user-add-actions">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary user-add-btn">
                                    İstifadəçini əlavə et
                                </button>
                                <a href="../partials/_main_panel.php" class="btn user-add-btn user-add-btn-light">
                                    Geri qayıt
                                </a>
                            </div>
                        </form>
                    </div>

                    <aside class="user-add-side">
                        <h5>Qısa qeydlər</h5>
                        <ul class="user-add-list">
                            <li>Əlavə etdiyin istifadəçi siyahıda dərhal görünəcək.</li>
                            <li>Email formatı düzgün deyilsə brauzer göndərişi bloklayacaq.</li>
                            <li>Bu səhifənin dizaynı edit səhifəsi ilə eyni vizual xəttdə saxlanılıb.</li>
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
