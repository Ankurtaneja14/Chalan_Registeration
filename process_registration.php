<?php
include 'db.php';

$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$owner_name = $_POST['owner_name'];
$vehicle_number = $_POST['vehicle_number'];
$model = $_POST['model'];
$registration_date = $_POST['registration_date'];
$password = md5($_POST['password']); // Simple hash for demonstration

$sql = "INSERT INTO users (email, mobile_number, owner_name, vehicle_number, model, registration_date, password)
        VALUES ('$email', '$mobile_number', '$owner_name', '$vehicle_number', '$model', '$registration_date', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful.";
    header('Refresh: 2; URL=login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
