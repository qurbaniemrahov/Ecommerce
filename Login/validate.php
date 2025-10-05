<?php
session_start();
include("../Admin/config/connection.php");

// Əgər POST ilə gəlməyibsə, geri göndər
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

$useremail = htmlspecialchars(trim($_POST['user_email']));
$password  = htmlspecialchars(trim($_POST['password']));

// boş olub-olmadığını yoxla
if (empty($useremail) || empty($password)) {
    echo "Email və şifrə boş ola bilməz.";
    exit();
}

// useri bazadan tap
$sql = "SELECT * FROM form_login WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":email", $useremail);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// istifadəçi yoxlanışı
if ($user && password_verify($password, $user['password'])) {
    // Session yaz
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];

    // yönləndir admin panelə
    header("Location: ../Admin/dashboard.php");
    exit();
} else {
    echo "Email və ya şifrə yanlışdır.";
}
