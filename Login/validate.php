<?php

session_start();
include("../Admin/config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

   
    $stmt = $pdo->prepare("SELECT * FROM admin_user WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   

    if ($user && $password === $user['password']) {
    
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        
     
        echo "enter admin panel";
        exit();
    } else {
     
        echo "exit admin panel";
        exit();
    }
}
?>


















