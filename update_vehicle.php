<?php
include 'config.php';

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Process data if JSON is valid
if ($data) {
    $vehicleId = $data['vehicle_id'];
    $registrationNumber = $data['registration_number'];
    $vehicleType = $data['vehicle_type'];

    // Validate registration number
    if (!validateRegistrationNumber($registrationNumber)) {
        http_response_code(400);
        die("Invalid registration number.");
    }

    // Update data in the vehicle table
    $sql = "UPDATE vehicle SET registration_number=?, vehicle_type=? WHERE vehicle_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $registrationNumber);
    $stmt->bindParam(2, $vehicleType);
    $stmt->bindParam(3, $vehicleId);

    if ($stmt->execute()) {
        echo "Vehicle updated successfully.";
    } else {
        echo "Error updating vehicle.";
    }
} else {
    echo "Invalid JSON data.";
}
?>