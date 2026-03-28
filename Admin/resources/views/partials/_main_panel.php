<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../../config/connection.php');

if (!$pdo instanceof PDO) {
    die("Database connection not established.");
}

$sql = "SELECT * FROM admin_user";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
$userCount = count($users);
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="admin-hero">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="admin-hero-badge">
            <i class="mdi mdi-shield-account-outline"></i>
            Admin management
          </span>
          <h2>User paneli daha temiz ve daha premium gorunuse kecdi.</h2>
          <p>Buradan admin user hesablarini yarat, redakte et ve sil. Dizayn daha aydin iyerarxiya, yumshaq kartlar ve rahat oxunan table ritmi ile yenilendi.</p>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
          <div class="admin-stat-grid">
            <div class="admin-stat-card">
              <span class="admin-stat-value"><?= $userCount; ?></span>
              <span class="admin-stat-label">Total users</span>
            </div>
            <div class="admin-stat-card">
              <span class="admin-stat-value"><?= $userCount > 0 ? 'Live' : 'Empty'; ?></span>
              <span class="admin-stat-label">Current state</span>
            </div>
            <div class="admin-stat-card">
              <span class="admin-stat-value">24/7</span>
              <span class="admin-stat-label">Panel access</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4 mb-3">
        <div class="admin-soft-card">
          <h5>User management</h5>
          <p>Admin hesablarini bir yerde topla ve lazim olan emeliyyatlari vaxt itirmeden yerine yetir.</p>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="admin-soft-card">
          <h5>Fast actions</h5>
          <p>Yeni user elavesi bir klik mesafesindedir ve action buttonlar table daxilinde daha temiz gorunur.</p>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="admin-soft-card">
          <h5>Cleaner reading</h5>
          <p>Sutunlar, spacing ve hover hallari daha rahat scan oluna bilen struktur verir.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card admin-panel-card">
          <div class="card-body">
            <div class="admin-section-head">
              <div>
                <h4>Admin users</h4>
                <p>Sistemdeki admin hesablarinin siyahisi ve idareetme emeliyyatlari.</p>
              </div>
              <a href="../resources/views/components/_user_add.php" class="btn btn-primary btn-pill px-4">
                <i class="mdi mdi-account-plus-outline mr-1"></i>
                Add user
              </a>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!$users): ?>
                    <tr>
                      <td colspan="4" class="text-center text-muted py-5">No admin user found yet.</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($users as $user): ?>
                      <tr>
                        <td><span class="badge badge-outline-info px-3 py-2"><?= (int) $user['id']; ?></span></td>
                        <td><?= htmlspecialchars((string) $user['email']); ?></td>
                        <td>
                          <a href="../resources/views/components/_user_edit.php?id=<?= (int) $user['id']; ?>" class="btn btn-success px-4">
                            Edit
                          </a>
                        </td>
                        <td>
                          <form id="deleteForm<?= (int) $user['id']; ?>" action="../app/Http/Controllers/user/user_delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= (int) $user['id']; ?>">
                            <button type="button" class="btn btn-danger px-4" onclick="confirmDelete(<?= (int) $user['id']; ?>)">
                              Delete
                            </button>
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
        Users, registrations and banners in one place
      </span>
    </div>
  </footer>
</div>

<script>
function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        document.getElementById('deleteForm' + id).submit();
    }
}
</script>
