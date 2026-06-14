<?php 
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['firstname']);
unset($_SESSION['email']);
unset($_SESSION['user']);

session_destroy();

header("Location: signin.php");
exit();





?>