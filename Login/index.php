<?php 
session_start();
include("../Admin/config/connection.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-sm p-4" style="width: 22rem;">
    <h4 class="text-center mb-4">Admin Login</h4>

    <!-- Login Form -->
    <form action="validate.php" method="POST">
      <div class="form-group">
        <label for="email">Email address</label>
        <input name="user_email" type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
    </form>

  </div>
</body>
</html>
