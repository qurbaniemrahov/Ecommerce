<?php 
include("../../../../config/connection.php");

if(isset($_FILES['image'])){

    $title = $_POST['title'];
    $image = $_FILES['image'];

    $imageName = time() . '_' . $image['name'];

    // ✅ REAL SERVER PATH (important)
    $target = $_SERVER['DOCUMENT_ROOT'] . "/Ecommerce/Admin/public/uploads/sliders/" . $imageName;

    move_uploaded_file($image['tmp_name'], $target);

    // ✅ PATH FOR BROWSER (save in DB)
    $path = "/Ecommerce/Admin/public/uploads/sliders/" . $imageName;

    $stmt = $pdo->prepare("INSERT INTO sliders (title, image) VALUES (?, ?)");
    $stmt->execute([$title, $path]);

    echo "Slider uploaded successfully!";
}
?>