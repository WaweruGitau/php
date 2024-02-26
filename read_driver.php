<?php
include 'config.php';

// Retrieve data from the drivers table
$sql = "SELECT * FROM drivers";
$stmt = $con->query($sql);

// Process data if query is successful
if ($stmt) {
    $drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($drivers);
} else {
    echo "Error retrieving drivers.";
}
?>