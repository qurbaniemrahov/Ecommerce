<?php 
include("../../../../config/connection.php");


if(isset($_FILES['image'])){

    $title = $_POST['title'];

    $image = $_FILES['image'];

    // generate unique name
    $imageName = time() . '_' . $image['name'];

    // where to save file
    $target = "../../../../public/uploads/sliders" . $imageName;

    // move file
    move_uploaded_file($image['tmp_name'], $target);

    // save path into database
    $path = "../../../../public/uploads/sliders" . $imageName;

    $stmt = $pdo->prepare("INSERT INTO sliders (title, image) VALUES (?, ?)");
    $stmt->execute([$title, $path]);

    echo "Slider uploaded successfully!";

}

?>