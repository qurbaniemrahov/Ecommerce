<?php
include("../../../../config/connection.php");


try {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $birthday = trim($_POST["birthday"]);
    $gender = trim($_POST["gender"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO signup (firstname,lastname,birthday,gender,email,password ) 
                           VALUES (:firstname, :lastname, :birthday,:gender, :email,:password)");

    $stmt->execute([
        "firstname" => $firstname,
        "lastname" => $lastname,
        "birthday" => $birthday,
        "gender" => $gender,
        "email" => $email,
        "password" => $hashedPassword
    ]);

     echo "User added successfully.";



} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
