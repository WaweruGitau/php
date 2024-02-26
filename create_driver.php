<?php
include 'config.php';

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Process data if JSON is valid
if ($data) {
    $driver_name = $data['driver_name'];
    $contact = $data['contact'];
    $vehicle_id = $data['vehicle_id'];

    // Insert data into the drivers table
    $sql = "INSERT INTO drivers (driver_name, contact, vehicle_id) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $driver_name);
    $stmt->bindParam(2, $contact);
    $stmt->bindParam(3, $vehicle_id);

    if ($stmt->execute()) {
        echo "Driver added successfully.";
    } else {
        echo "Error adding driver.";
    }
} else {
    echo "Invalid JSON data.";
}
?>