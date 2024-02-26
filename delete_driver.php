<?php
include 'config.php';

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Process data if JSON is valid
if ($data) {
    $driver_id = $data['driver_id'];

    // Delete data from the drivers table
    $sql = "DELETE FROM drivers WHERE driver_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $driver_id);

    if ($stmt->execute()) {
        echo "Driver deleted successfully.";
    } else {
        echo "Error deleting driver.";
    }
} else {
    echo "Invalid JSON data.";
}
?>