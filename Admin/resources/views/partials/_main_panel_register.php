<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection

// ob_start();

// phpinfo(INFO_MODULES);
$dsn = 'mysql:host=127.0.0.1;dbname=corona';
$username = 'qurbani'; // Replace with your MySQL username
$password = '1992'; // Replace with your MySQL password

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if $pdo is defined
if (!isset($pdo)) {
    die("Database connection not established.");
}



$stmt = $pdo->prepare("SELECT * FROM signup ORDER BY id ASC");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="page-header">

              <h3 class="page-title">Sign up</h3>
           <!-- <a href="../resources/views/components/_user_add.php">
            <button class="btn btn-info">
              Add
            </button>
           </a> -->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  
                 
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                          <th>Id</th>
                           <th>Firstname</th>
 <th>Lastname</th>
 <th>Birthday</th>
 <th>Gender</th>
 <th>Email</th>
 <th>Password</th>
                            
                        
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
       <tbody>
<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= htmlspecialchars($user['firstname']) ?></td>
    <td><?= htmlspecialchars($user['lastname']) ?></td>
    <td><?= htmlspecialchars($user['birthday']) ?></td>
    <td><?= htmlspecialchars($user['gender']) ?></td>
    <td><?= htmlspecialchars($user['email']) ?></td>
    <td><?= htmlspecialchars($user['password']) ?></td>

    <td>
        <a href="../resources/views/components/register/_register_edit.php">
            <button class="btn btn-success">Edit</button>
        </a>
    </td>

    <td>
        <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure?');">
            <button class="btn btn-danger">Delete</button>
        </a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             
             
             
             
           
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->