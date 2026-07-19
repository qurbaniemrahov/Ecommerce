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
