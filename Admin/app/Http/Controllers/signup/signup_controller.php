<?php
include("../../../../config/connection.php");


try {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $birthday = "$year-$month-$day";
    $gender = trim($_POST["gender"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $month = $_POST["month"];
$day   = $_POST["day"];
$year  = $_POST["year"];

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
