<?php

$dbName = getenv('DB_NAME') ?: 'corona';

$portCandidates = [];
$envPort = getenv('DB_PORT');
if ($envPort !== false && $envPort !== '') {
    $portCandidates[] = $envPort;
}

// XAMPP usually uses 3306, but it is often moved to 3307 when 3306 is busy.
$portCandidates[] = '3306';
$portCandidates[] = '3307';
$portCandidates = array_values(array_unique($portCandidates));

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
    foreach ($portCandidates as $port) {
        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";

        foreach ($credentialCandidates as $credentials) {
            try {
                $pdo = new PDO($dsn, $credentials['username'], $credentials['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                break 3;
            } catch (PDOException $e) {
                $connectionErrors[] = "[host={$host} port={$port} user={$credentials['username']}] " . $e->getMessage();
            }
        }
    }
}

if (!$pdo instanceof PDO) {
    $lastError = end($connectionErrors) ?: 'Unknown database connection error.';
    die('Database connection failed. Please make sure Apache and MySQL are running in XAMPP. Last error: ' . $lastError);
}

?>
