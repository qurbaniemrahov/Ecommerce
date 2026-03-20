<?php 
include("../../config/connection.php");

try {
    $sql = "CREATE TABLE IF NOT EXISTS sliders(id INT AUTO_INCREMENT PRIMARY KEY,
 image VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL,   status TINYINT DEFAULT 1, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);";
     $pdo->exec($sql);
     echo "Table 'sliders' created successfully!";
}catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}

?>