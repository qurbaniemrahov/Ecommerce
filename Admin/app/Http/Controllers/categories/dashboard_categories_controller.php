<?php 
include("../../../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

try {
      
$category_name = trim($_POST["category_name"]);
$category_slug = trim($_POST["category_slug"]);
$category_image = trim($_POST["category_image"]);


  $stmt = $pdo->prepare("INSERT INTO categories (category_name, category_slug, category_image) 
                           VALUES (:category_name, :category_slug, :category_image)");

$stmt->execute([
        "category_name" => $category_name,
       "category_slug" => $category_slug,
        "category_image" => $category_image
    ]);
    
      echo "Categories added successfully.";

}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}








?>