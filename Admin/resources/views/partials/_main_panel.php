<div class="main-panel">
  <div class="content-wrapper">

    <div class="page-header">
      <h3 class="page-title">İstifadəçilər</h3>

      <a href="../resources/views/components/_user_add.php" class="btn btn-info">
        Add
      </a>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb"></ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = 'mysql:host=127.0.0.1;dbname=corona';
$username = 'qurbani';
$password = '1992';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "SELECT * FROM admin_user";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$users) {
    echo "<tr><td colspan='4'>No data found!</td></tr>";
} else {
    foreach ($users as $user) {
?>
                  <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['email']; ?></td>

                    <td>
                      <a href="../resources/views/components/_user_edit.php?id=<?= $user['id']; ?>"
                         class="btn btn-success">
                        Edit
                      </a>
                    </td>

                    <td>
                      <form id="deleteForm<?= $user['id']; ?>"
                            action="../app/Http/Controllers/user/user_delete.php"
                            method="POST">

                        <input type="hidden" name="id" value="<?= $user['id']; ?>">

                        <button type="button"
                                class="btn btn-danger"
                                onclick="confirmDelete(<?= $user['id']; ?>)">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
<?php
    }
}
?>

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
        Copyright © bootstrapdash.com 2020
      </span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
        Free
        <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">
          Bootstrap admin templates
        </a>
      </span>
    </div>
  </footer>
</div>

<!-- ✅ DELETE CONFIRM SCRIPT (MUST BE OUTSIDE LOOP) -->
<script>
function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        document.getElementById('deleteForm' + id).submit();
    }
}
</script>
