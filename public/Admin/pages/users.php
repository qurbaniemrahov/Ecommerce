<?php 
session_start();

// user login control
if (!isset($_SESSION['user_email'])) {
    header("Location: http://localhost/aftklassik/login");
    die();
}

// User control

include('../includes/header.php');
include('../includes/sidebar.php'); 
include('../includes/users_list.php');
include('../includes/user_create.php');
include('../includes/footer.php');
?>