<?php
include("../../../../config/connection.php");

try {
    
    $stmt = $pdo->prepare("INSERT INTO admin_user (email, password) 
                           VALUES (:email, :password)");

    
    $stmt->execute([
        "email" => $_POST["email"],
        "password" => $_POST["password"] // Hash the password for security
    ]);

    echo "User added successfully.";
} catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
}
?>




