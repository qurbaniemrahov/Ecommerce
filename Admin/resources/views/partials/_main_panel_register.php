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
    </div>
  </footer>
</div>
