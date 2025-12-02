<?php
include("../../../../config/connection.php");


try {
    // Get email and password from form
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // ✅ Hash the password before inserting
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL
    $stmt = $pdo->prepare("INSERT INTO admin_user (email, password) 
                           VALUES (:email, :password)");

    // Execute query with hashed password
    $stmt->execute([
        "email" => $email,
        "password" => $hashedPassword
    ]);

    echo "User added successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>





