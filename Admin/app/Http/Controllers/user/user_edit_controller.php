<?php 
session_start();

include("../../../../config/connection.php");

// Enable detailed PDO errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $password = "";

// GET user data to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM admin_user WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $email = $user['email'];
        $password = $user['password'];
    } else {
        echo "❌ User not found with ID: $id";
        exit;
    }
}

// UPDATE user data
if (isset($_POST['update'])) {
    $id = $_POST['id'];  
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "<pre>DEBUG: POST Data\n";
    print_r($_POST);
    echo "</pre>";

    // Check if user exists
    $check = $pdo->prepare("SELECT COUNT(*) FROM admin_user WHERE id = :id");
    $check->bindParam(':id', $id, PDO::PARAM_INT);
    $check->execute();
    if ($check->fetchColumn() == 0) {
        echo "❌ No record found in DB with ID: $id";
        exit;
    }

    try {
        $stmt = $pdo->prepare("UPDATE admin_user SET email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Check if any row was actually updated
        if ($stmt->rowCount() > 0) {
            echo "✅ User updated successfully";
        } else {
            echo "⚠ Query executed, but no rows were changed. Possible reasons:\n";
            echo "- ID did not match any record\n";
            echo "- New data is exactly the same as existing data\n";
        }

    } catch (PDOException $e) {
        echo "❌ SQL Error: " . $e->getMessage();
    }
}
?>
