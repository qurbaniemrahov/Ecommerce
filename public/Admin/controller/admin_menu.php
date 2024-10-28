<?php
include('../../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['menu_add'])) {
    if (isset($_POST['menu_name'])) {
    $menu_title = $_POST['menu_name'];

    $sql = "CREATE TABLE IF NOT EXISTS admin_menu (
        menu_title VARCHAR(100) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table admin_menu created successfully";
    } else {
        $errorInfo = $conn->errorInfo();
        echo "Error creating table: " . $errorInfo[2]; // Display the error message
    }

    $sql = "INSERT INTO admin_menu (menu_title) VALUES (?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->execute([$menu_title]);
        echo "menu created successfully";
    } else {
        echo "Error preparing statement: " . $conn->errorInfo()[2];
    }

 

    $sql = "SELECT * FROM admin_menu";
    $stmt = $conn->query($sql);
    $result_menu = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the statement and the connection
    $stmt = null;
    $conn = null;
}
}

// Delete menu item
if (isset($_POST['menu_delete'])) {
    $menu_id = $_POST['menu_delete'];

    try {
        $query = "DELETE FROM admin_menu WHERE id = :menu_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':menu_id', $menu_id, PDO::PARAM_INT);
        $query_execute = $statement->execute();

        if ($query_execute) {
            echo "Menu deleted successfully<br>";
        } else {
            echo "Menu not deleted<br>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Close the database connection
$conn = null;


?>
