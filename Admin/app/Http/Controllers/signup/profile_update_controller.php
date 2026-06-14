<?php
session_start();
require_once __DIR__ . "/../../../../config/connection.php";

$redirectUrl = "/Ecommerce/Ecommerce/dash-edit-profile.php";

function redirectToProfile(string $status): void
{
    global $redirectUrl;

    header("Location: {$redirectUrl}?status={$status}");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectToProfile('invalid');
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /Ecommerce/Ecommerce/signin.php");
    exit();
}

if (!$pdo instanceof PDO) {
    redirectToProfile('db_error');
}

$userId = (int) $_SESSION['user_id'];
$email = trim($_POST['email'] ?? '');
$currentPassword = trim($_POST['current_password'] ?? '');
$newPassword = trim($_POST['new_password'] ?? '');
$confirmPassword = trim($_POST['confirm_password'] ?? '');

if ($email === '' || $currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
    redirectToProfile('missing');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectToProfile('invalid_email');
}

if (strlen($newPassword) < 6) {
    redirectToProfile('weak_password');
}

if ($newPassword !== $confirmPassword) {
    redirectToProfile('password_mismatch');
}

$stmt = $pdo->prepare("SELECT id, email, password FROM signup WHERE id = :id LIMIT 1");
$stmt->execute([':id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($currentPassword, $user['password'])) {
    redirectToProfile('wrong_password');
}

$emailCheck = $pdo->prepare("SELECT id FROM signup WHERE email = :email AND id <> :id LIMIT 1");
$emailCheck->execute([
    ':email' => $email,
    ':id' => $userId,
]);

if ($emailCheck->fetch(PDO::FETCH_ASSOC)) {
    redirectToProfile('email_exists');
}

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$update = $pdo->prepare("UPDATE signup SET email = :email, password = :password WHERE id = :id");
$update->execute([
    ':email' => $email,
    ':password' => $hashedPassword,
    ':id' => $userId,
]);

$_SESSION['email'] = $email;

redirectToProfile('updated');
