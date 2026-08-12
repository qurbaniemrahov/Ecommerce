<?php

$envPath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . '.env';
$env = is_file($envPath) ? parse_ini_file($envPath, false, INI_SCANNER_RAW) : false;

if ($env === false) {
    throw new RuntimeException('.env file could not be loaded.');
}

foreach ($env as $key => $value) {
    $value = trim((string) $value, "\"'");
    putenv("{$key}={$value}");
    $_ENV[$key] = $value;
}

$requiredVariables = ['DB_HOST', 'DB_PORT', 'DB_NAME', 'DB_USER', 'DB_PASS'];
foreach ($requiredVariables as $variable) {
    if (getenv($variable) === false) {
        throw new RuntimeException("Missing required environment variable: {$variable}");
    }
}

$dsn = sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
    getenv('DB_HOST'),
    getenv('DB_PORT'),
    getenv('DB_NAME')
);

try {
    $pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    throw new RuntimeException('Database connection failed.', 0, $e);
}
