<?php
include 'config.php';

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Process data if JSON is valid
if ($data) {
    $vehicleId = $data['vehicle_id'];

    // Delete data from the vehicle table
    $sql = "DELETE FROM vehicle WHERE vehicle_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $vehicleId);

    if ($stmt->execute()) {
        echo "Vehicle deleted successfully.";
    } else {
        echo "Error deleting vehicle.";
    }
} else {
    echo "Invalid JSON data.";
}
?>