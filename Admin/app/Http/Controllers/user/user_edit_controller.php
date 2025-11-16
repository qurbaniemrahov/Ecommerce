<?php 
session_start();
include("../../../../config/connection.php");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = "";
$password = "";

// GET USER
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM admin_user WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $email = $user['email'];
    } else {
        exit("❌ User not found with ID: $id");
    }
}

// UPDATE USER
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // If password field is empty → do NOT update password
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            UPDATE admin_user 
            SET email = :email, password = :password 
            WHERE id = :id
        ");
        $stmt->execute([
            ':email' => $email,
            ':password' => $hashed_password,
            ':id' => $id
        ]);

    } else {
        // Update only email
        $stmt = $pdo->prepare("
            UPDATE admin_user 
            SET email = :email 
            WHERE id = :id
        ");
        $stmt->execute([
            ':email' => $email,
            ':id' => $id
        ]);
    }

    echo "✅ User updated successfully.";
}
?>
