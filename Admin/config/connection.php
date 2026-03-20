<?php

$dbName = getenv('DB_NAME') ?: 'corona';
$dbPort = getenv('DB_PORT') ?: '3306';

$hostCandidates = [];

$envHost = getenv('DB_HOST');
if ($envHost !== false && $envHost !== '') {
    $hostCandidates[] = $envHost;
}

$hostCandidates[] = '127.0.0.1';
$hostCandidates[] = 'localhost';
$hostCandidates = array_values(array_unique($hostCandidates));

$credentialCandidates = [];

$envUser = getenv('DB_USER');
$envPassword = getenv('DB_PASS');

if ($envUser !== false && $envUser !== '') {
    $credentialCandidates[] = [
        'username' => $envUser,
        'password' => $envPassword !== false ? $envPassword : '',
    ];
}

// Common XAMPP local defaults.
$credentialCandidates[] = ['username' => 'root', 'password' => ''];
$credentialCandidates[] = ['username' => 'root', 'password' => 'root'];

$pdo = null;
$connectionErrors = [];

foreach ($hostCandidates as $host) {
    $dsn = "mysql:host={$host};port={$dbPort};dbname={$dbName};charset=utf8mb4";

    foreach ($credentialCandidates as $credentials) {
        try {
            $pdo = new PDO($dsn, $credentials['username'], $credentials['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            break 2;
        } catch (PDOException $e) {
            $connectionErrors[] = "[host={$host} user={$credentials['username']}] " . $e->getMessage();
        }
    }
}

if (!$pdo instanceof PDO) {
    $lastError = end($connectionErrors) ?: 'Unknown database connection error.';
    die('Database connection failed. Please make sure Apache and MySQL are running in XAMPP. Last error: ' . $lastError);
}

?>
