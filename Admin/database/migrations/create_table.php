<?php
include("../../config/connection.php");
try {
    $sql = "CREATE TABLE IF NOT EXISTS admin_user(id INT AUTO_INCREMENT PRIMARY KEY,
 email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);";
     $pdo->exec($sql);
     echo "Table 'admin user' created successfully!";
}catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}

try {
    $sql = "CREATE TABLE IF NOT EXISTS password_resets(id INT AUTO_INCREMENT PRIMARY KEY,
 email VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);";
     $pdo->exec($sql);
     echo "Table 'password_resets' created successfully!";

}catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}        

