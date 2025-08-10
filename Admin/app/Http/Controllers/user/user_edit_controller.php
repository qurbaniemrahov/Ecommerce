<?php 
session_start();

include("../../../../config/connection.php");

$email = $password = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt=$pdo->prepare("SELECT * FROM admin_user WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $email = $user['email'];
        $password = $user['password'];
    } else {
        echo "user not found";
        exit;
    }
}
//update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];  
    $email = $_POST['email'];
    $password = $_POST['password'];

    

    $stmt = $pdo->prepare("UPDATE admin_user SET email = :email, password = :password WHERE id = :id");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "User updated successfully";
}



?>