<?php 
session_start();
include("./Admin/config/connection.php");
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if(!empty($email)&& !empty($password)) {
        try{
            $stmt = $pdo->prepare("SELECT * FROM admin_user email=:email LIMIT 1");
            $stmt = execute(['email'=>$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password,$user["password"])) {
                $_SESSION['user_id']=$user['id'];
                $_SESSION['email']=$user['email'];
                header("Location: ../Admin/public/index.php");
                exit;
            }else {
                $error = "Invalid email or password!";
        }
    }
    
    }
