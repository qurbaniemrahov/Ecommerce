<?php 
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



?>