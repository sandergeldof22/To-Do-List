<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname	= "To-Do-List";

try {
    $conn = new PDO("mysql:host=$servername;dbname=To-Do-List", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>