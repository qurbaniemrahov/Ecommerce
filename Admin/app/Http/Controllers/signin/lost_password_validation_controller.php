<?php 
session_start();
include('../../../../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$pdo) {
        echo "❌ Database connection failed.";
        exit();
    }
    
    $email = trim($_POST['email']);

   
    $stmt = $pdo->prepare("SELECT * FROM signup WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   

     if ($user) {
        // ✅ Generate a unique token
        $token = bin2hex(random_bytes(50));

        // ✅ Store the token in the password_resets table
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token) VALUES (:email, :token)");
        $stmt->execute(['email' => $email, 'token' => $token]);

        // ✅ Send the reset link to the user's email (for demonstration, we'll just output it)
        $resetLink = "http://localhost/Ecommerce/Login/reset_password.php?token=" . $token;
        echo "Password reset link: " . $resetLink;
    } else {
        echo "❌ No user found with that email.";
    }
}
     





?>