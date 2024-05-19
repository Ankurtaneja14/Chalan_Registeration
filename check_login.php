<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']); // Simple hash for demonstration

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
// Check login credentials and set session variables upon successful login
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['loggedin'] = true;
    $_SESSION['vehicle_number'] = $user['vehicle_number'];
    $_SESSION['owner_name'] = $user['owner_name']; // Set the owner's name
    header('Location: index.php');
} else {
    echo "Invalid credentials";
}


$conn->close();
?>
