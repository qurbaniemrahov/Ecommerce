<?php
include("../../../../config/connection.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // İstifadəçi ID
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Şifrəni hash-lə

    try {
        $sql = "UPDATE admin_user SET email = :email, password = :password WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo "İstifadəçi uğurla yeniləndi!";
        } else {
            echo "Yeniləmə zamanı xəta baş verdi.";
        }
    } catch (PDOException $e) {
        echo "Xəta: " . $e->getMessage();
    }
}
?>

?>