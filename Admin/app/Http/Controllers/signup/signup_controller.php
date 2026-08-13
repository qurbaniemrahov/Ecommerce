<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

include("../../../../config/connection.php");

try {
    $month = $_POST["month"];
    $day   = $_POST["day"];
    $year  = $_POST["year"];
    
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $birthday = "$year-$month-$day";
    $gender = trim($_POST["gender"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($pdo === null) {
        throw new Exception("Database connection failed");
    }
    
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
    if ($e->getCode() === '23000') {
        echo "Bu e-mail ünvanı ilə artıq hesab mövcuddur.";
    } else {
        echo "Error: " . $e->getMessage();
    }
}

?>
