<?php 
include("../../../../config/connection.php");

$email = $password = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt=$pdo->prepare("SELECT * FROM admin_user WHERE id = :id");
    $stmt->execute(["id"=>$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $email = $user['email'];
        $password = $user['password'];
    }else {
        echo "user not found";
        exit;
    }
}

//update data

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!empty($email) && !empty($password)) {
        $sql = "UPDATE admin_user SET email = :email, password = :password WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $password, 'id' => $id]);
        echo "Data updated successfully!";
    } else {
        echo "Please fill all fields.";
    }
}


?>