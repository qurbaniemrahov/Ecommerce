<?php
include(__DIR__ . '/../../../config/connection.php');
require(__DIR__ . "/../../../app/Http/Controllers/user/user_edit_controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User</title>

    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

    <style>
        .user-edit-shell {
            min-height: 100vh;
            padding: 2rem 1rem;
            background:
                radial-gradient(circle at top left, rgba(0, 123, 255, 0.12), transparent 30%),
                radial-gradient(circle at bottom right, rgba(40, 167, 69, 0.10), transparent 28%),
                #f4f7fb;
        }

        .user-edit-card {
            max-width: 720px;
            margin: 2rem auto;
            border: 0;
            border-radius: 24px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.10);
            overflow: hidden;
        }

        .user-edit-hero {
            padding: 2rem 2rem 1.5rem;
            color: #fff;
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #22c55e);
        }

        .user-edit-hero h2 {
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .user-edit-hero p {
            margin-bottom: 0;
            color: rgba(255, 255, 255, 0.82);
        }

        .user-edit-body {
            padding: 2rem;
            background: #fff;
        }

        .user-edit-label {
            display: block;
            margin-bottom: 0.55rem;
            font-weight: 600;
            color: #0f172a;
        }

        .user-edit-input {
            width: 100%;
            min-height: 52px;
            padding: 0.85rem 1rem;
            border: 1px solid #dbe3ef;
            border-radius: 14px;
            background: #f8fafc;
            color: #0f172a;
            transition: all 0.2s ease;
        }

        .user-edit-input:focus {
            outline: none;
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .user-edit-note {
            display: block;
            margin-top: 0.55rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .user-edit-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.75rem;
        }

        .user-edit-btn {
            min-width: 160px;
            min-height: 48px;
            border-radius: 999px;
            font-weight: 600;
        }

        .user-edit-back {
            background: #e2e8f0;
            color: #0f172a;
        }

        .user-edit-back:hover {
            background: #cbd5e1;
            color: #0f172a;
        }

        @media (max-width: 576px) {
            .user-edit-hero,
            .user-edit-body {
                padding: 1.5rem;
            }

            .user-edit-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="user-edit-shell">
        <div class="card user-edit-card">
            <div class="user-edit-hero">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <span class="badge badge-light text-dark mb-3 px-3 py-2">Admin Panel</span>
                        <h2>Edit User</h2>
                        <p>User hesabinin emailini yenile ve istesen yeni sifre teyin et.</p>
                    </div>
                    <?php if ($id !== null): ?>
                        <span class="badge badge-pill badge-outline-light px-3 py-2">ID: <?= htmlspecialchars((string) $id); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="user-edit-body">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?= htmlspecialchars($messageType ?: 'info'); ?> mb-4">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= htmlspecialchars((string) $id); ?>">

                    <div class="form-group">
                        <label class="user-edit-label" for="email">Email</label>
                        <input
                            class="user-edit-input"
                            id="email"
                            type="email"
                            name="email"
                            value="<?= htmlspecialchars($email); ?>"
                            placeholder="example@site.com"
                            required
                        >
                    </div>

                    <div class="form-group mb-0">
                        <label class="user-edit-label" for="password">New Password</label>
                        <input
                            class="user-edit-input"
                            id="password"
                            type="password"
                            name="password"
                            value=""
                            placeholder="Leave blank to keep current password"
                        >
                        <small class="user-edit-note">Sifreni deyismek istemirsense bu hisseni bos saxla.</small>
                    </div>

                    <div class="user-edit-actions">
                        <button type="submit" name="update" value="1" class="btn btn-primary user-edit-btn">
                            Save Changes
                        </button>
                        <a href="../partials/_main_panel.php" class="btn user-edit-btn user-edit-back">
                            Back to Users
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
</body>
</html>
