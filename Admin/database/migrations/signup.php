<?php
require_once __DIR__ . "/../../config/connection.php";
try {
    $sql = "CREATE TABLE IF NOT EXISTS signup(id INT AUTO_INCREMENT PRIMARY KEY,
 firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthday VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, UNIQUE KEY uniq_signup_email (email));";
     $pdo->exec($sql);

     $index = $pdo->query("SHOW INDEX FROM signup WHERE Key_name = 'uniq_signup_email'")->fetch();
     if ($index === false) {
         $pdo->exec("ALTER TABLE signup ADD UNIQUE KEY uniq_signup_email (email)");
     }

     echo "signup table 'products' created successfully!";
}catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}
