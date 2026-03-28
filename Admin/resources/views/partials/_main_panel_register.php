<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include(__DIR__ . '/../../../config/connection.php');

if (!isset($pdo)) {
    die("Database connection not established.");
}

$stmt = $pdo->prepare("SELECT * FROM signup ORDER BY id ASC");
$stmt->execute();
$users = $stmt->fetchAll();
$signupCount = count($users);
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="admin-hero" style="background: radial-gradient(circle at top left, rgba(14, 165, 233, 0.18), transparent 28%), linear-gradient(135deg, #0f172a 0%, #0f766e 55%, #22c55e 100%);">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="admin-hero-badge">
            <i class="mdi mdi-account-multiple-outline"></i>
            Registration flow
          </span>
          <h2>Qeydiyyat siyahisi de yeni panel dili ile toparlandi.</h2>
          <p>Yeni qeydiyyatlari, istifadeci melumatlarini ve emeliyyat buttonlarini daha rahat gorunen vahid strukturda topladıq.</p>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
          <div class="admin-stat-grid">
            <div class="admin-stat-card">
              <span class="admin-stat-value"><?= $signupCount; ?></span>
              <span class="admin-stat-label">Registrations</span>
            </div>
            <div class="admin-stat-card">
              <span class="admin-stat-value">Full</span>
              <span class="admin-stat-label">Profile data</span>
            </div>
            <div class="admin-stat-card">
              <span class="admin-stat-value">Ready</span>
              <span class="admin-stat-label">Review status</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-6 mb-3">
        <div class="admin-soft-card">
          <h5>Structured table</h5>
          <p>Firstname, lastname, birthday, gender ve email indi daha nizamli spacing ile oxunur.</p>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="admin-soft-card">
          <h5>Action clarity</h5>
          <p>Edit ve delete emeliyyatlari daha secilen kart strukturunda ayri-seckili gorunur.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card admin-panel-card">
          <div class="card-body">
            <div class="admin-section-head">
              <div>
                <h4>Signup records</h4>
                <p>Qeydiyyatdan kecen istifadecilerin melumatlari.</p>
              </div>
              <span class="badge badge-outline-info px-3 py-2"><?= $signupCount; ?> total</span>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!$users): ?>
                    <tr>
                      <td colspan="8" class="text-center text-muted py-5">No registration records found.</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($users as $user): ?>
                      <tr>
                        <td><span class="badge badge-outline-info px-3 py-2"><?= (int) $user['id']; ?></span></td>
                        <td><?= htmlspecialchars((string) $user['firstname']); ?></td>
                        <td><?= htmlspecialchars((string) $user['lastname']); ?></td>
                        <td><?= htmlspecialchars((string) $user['birthday']); ?></td>
                        <td><?= htmlspecialchars((string) $user['gender']); ?></td>
                        <td><?= htmlspecialchars((string) $user['email']); ?></td>
                        <td>
                          <a href="../resources/views/components/_register_edit.php" class="btn btn-success px-4">Edit</a>
                        </td>
                        <td>
                          <form action="../../Admin/app/Http/Controllers/signup/signup_delete_controller.php" method="POST">
                            <input type="hidden" name="id" value="<?= (int) $user['id']; ?>">
                            <button type="submit" class="btn btn-danger px-4">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
        Ecommerce admin panel
      </span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
        Registration records with cleaner dashboard styling
      </span>
    </div>
  </footer>
</div>
