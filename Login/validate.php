<?php
session_start();
include("../Admin/config/connection.php"); // adjust path if needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM admin_user WHERE email = :email LIMIT 1");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header("Location: ../Admin/public/index.php");
                    exit;
                } else {
                    $_SESSION['error'] = "Incorrect password!";
                    header("Location: login.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "No account found with that email!";
                header("Location: index2.php");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Please fill in both fields!";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}


