<?php 
include('../../config/connection.php');

class Database 
{
    private $conn;

    public function __construct($host, $dbname, $username, $password)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->conn = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
       

    }
}

$database = new Database('localhost', 'aftklassik', 'root', '1992');


?>