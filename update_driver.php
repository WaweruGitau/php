<?php
include 'config.php';

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Process data if JSON is valid
if ($data) {
    $driver_id = $data['driver_id'];
    $driver_name = $data['driver_name'];
    $contact = $data['contact'];
    $vehicle_id = $data['vehicle_id'];

    // Update data in the drivers table
    $sql = "UPDATE drivers SET driver_name=?, contact=?, vehicle_id=? WHERE driver_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $driver_name);
    $stmt->bindParam(2, $contact);
    $stmt->bindParam(3, $vehicle_id);
    $stmt->bindParam(4, $driver_id);

    if ($stmt->execute()) {
        echo "Driver updated successfully.";
    } else {
        echo "Error updating driver.";
    }
} else {
    echo "Invalid JSON data.";
}
?>