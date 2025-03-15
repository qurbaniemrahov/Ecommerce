<?php
include("../../../../config/connection.php");

try {
    
    $stmt = $pdo->prepare("INSERT INTO admin_user (email, password) 
                           VALUES (:email, :password)");

    
    $stmt->execute([
        "email" => $_POST["email"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT), // Hash the password for security
    ]);

    echo "User added successfully.";
} catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
}
?>




