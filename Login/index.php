<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <style>
    :root {
      --bg-dark: #0f172a;
      --card-bg: rgba(255, 255, 255, 0.94);
      --text-main: #0f172a;
      --text-muted: #64748b;
      --border-soft: rgba(148, 163, 184, 0.28);
      --primary: #2563eb;
      --primary-hover: #1d4ed8;
      --input-bg: #f8fafc;
    }

    * {
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-main);
      background:
        radial-gradient(circle at top left, rgba(59, 130, 246, 0.35), transparent 30%),
        radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.2), transparent 28%),
        linear-gradient(135deg, #020617 0%, #0f172a 45%, #1e293b 100%);
    }

    .login-shell {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .login-card {
      width: 100%;
      max-width: 430px;
      border: 1px solid rgba(255, 255, 255, 0.16);
      border-radius: 24px;
      background: var(--card-bg);
      box-shadow: 0 28px 70px rgba(15, 23, 42, 0.35);
      overflow: hidden;
      backdrop-filter: blur(14px);
    }

    .login-card__hero {
      padding: 32px 32px 20px;
      background: linear-gradient(180deg, rgba(37, 99, 235, 0.12), rgba(255, 255, 255, 0));
    }

    .login-badge {
      display: inline-flex;
      align-items: center;
      padding: 8px 14px;
      border-radius: 999px;
      background: rgba(37, 99, 235, 0.12);
      color: var(--primary);
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .login-title {
      margin: 18px 0 10px;
      font-size: 2rem;
      font-weight: 700;
      line-height: 1.15;
    }

    .login-text {
      margin: 0;
      color: var(--text-muted);
      font-size: 0.98rem;
      line-height: 1.65;
    }

    .login-form {
      padding: 8px 32px 32px;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    .form-label {
      display: block;
      margin-bottom: 8px;
      font-size: 0.94rem;
      font-weight: 600;
      color: #1e293b;
    }

    .form-control {
      height: 52px;
      border-radius: 14px;
      border: 1px solid var(--border-soft);
      background: var(--input-bg);
      padding: 0 16px;
      font-size: 0.97rem;
      transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
    }

    .form-control:focus {
      border-color: rgba(37, 99, 235, 0.55);
      background: #fff;
      box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.15);
    }

    .btn-login {
      height: 52px;
      border: 0;
      border-radius: 14px;
      font-size: 1rem;
      font-weight: 600;
      background: linear-gradient(135deg, var(--primary), #3b82f6);
      box-shadow: 0 18px 30px rgba(37, 99, 235, 0.24);
      transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .btn-login:hover,
    .btn-login:focus {
      background: linear-gradient(135deg, var(--primary-hover), #2563eb);
      box-shadow: 0 22px 36px rgba(37, 99, 235, 0.28);
      transform: translateY(-1px);
    }

    .alert {
      border: 0;
      border-radius: 14px;
      font-size: 0.93rem;
      padding: 0.9rem 1rem;
      margin-bottom: 1.25rem;
    }

    .login-footer {
      margin-top: 18px;
      text-align: center;
      color: var(--text-muted);
      font-size: 0.88rem;
    }

    @media (max-width: 575.98px) {
      .login-card__hero,
      .login-form {
        padding-left: 22px;
        padding-right: 22px;
      }

      .login-title {
        font-size: 1.7rem;
      }
    }
  </style>
</head>
<body>
  <main class="login-shell">
    <section class="login-card">
      <div class="login-card__hero">
        <span class="login-badge">Admin Panel</span>
        <h1 class="login-title">Welcome back</h1>
        <p class="login-text">Sign in to manage products, orders, and store settings from your dashboard.</p>
      </div>

      <div class="login-form">
        <?php if (!empty($_SESSION['error'])): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="validate.php" method="POST">
          <div class="form-group">
            <label class="form-label" for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="admin@example.com" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
        </form>

        <p class="login-footer">Secure access for authorized administrators only.</p>
      </div>
    </section>
  </main>
</body>
</html>
