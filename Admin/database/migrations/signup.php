<?php
include("../../config/connection.php");
try {
    $sql = "CREATE TABLE IF NOT EXISTS signup(id INT AUTO_INCREMENT PRIMARY KEY,
 firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthday VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);";
     $pdo->exec($sql);
     echo "signup table 'products' created successfully!";
}catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}
