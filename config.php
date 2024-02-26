<?php
// Database credentials
$host = "localhost";
$db_name = "sacco_management";
$username = "root";
$password = "";

// Establish database connection
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>

