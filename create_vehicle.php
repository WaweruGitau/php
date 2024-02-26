<?php
include 'config.php';

function validateRegistrationNumber($registrationNumber) {
    // Custom validation logic for registration numbers goes here...
}

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registrationNumber = $_POST['registration_number'];
    $vehicleType = $_POST['vehicle_type'];

    if (!validateRegistrationNumber($registrationNumber)) {
        http_response_code(400);
        die("Invalid registration number.");
    }

    $sql = "INSERT INTO vehicle (registration_number, vehicle_type) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $registrationNumber);
    $stmt->bindParam(2, $vehicleType);

    if ($stmt->execute()) {
        echo "Vehicle created successfully.";
    } else {
        echo "Error creating vehicle.";
    }
}
?>