<?php 
include("../../config/connection.php");

try {
    $sql = "CREATE TABLE IF NOT EXISTS products (
        category_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL UNIQUE,
         sku VARCHAR(255) NOT NULL UNIQUE,
        description VARCHAR(255) NOT NULL,
        price VARCHAR(255) NOT NULL,
          sale_price VARCHAR(255) NOT NULL,
            stock VARCHAR(255) NOT NULL,
            cover_image VARCHAR(255) NOT NULL,
        status TINYINT DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

         FOREIGN KEY (category_id) REFERENCES categories(id)
    )";

    $pdo->exec($sql);

    echo "Table 'categories' created successfully!";
} catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}




?>