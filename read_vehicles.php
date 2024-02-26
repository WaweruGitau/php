<?php
include 'config.php';

// Retrieve data from the vehicle table
$sql = "SELECT * FROM vehicle ORDER BY vehicle_id ASC";
$stmt = $con->query($sql);

// Process data if query is successful
if ($stmt) {
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($vehicles);
} else {
    echo "Error retrieving vehicles.";
}
?>