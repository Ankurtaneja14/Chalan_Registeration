<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_chalan'])) {
    // Check if the chalan ID is set
    if (isset($_POST['chalan_id'])) {
        // Sanitize the chalan ID
        $chalan_id = $_POST['chalan_id'];

        // Prepare a delete query
        $sql = "DELETE FROM chalans WHERE id = ? AND vehicle_number = ?";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $chalan_id, $_SESSION['vehicle_number']);

        // Execute the query
        if ($stmt->execute()) {
            // Chalan deleted successfully
            header('Location: index.php'); // Redirect back to the index page
            exit;
        } else {
            // Error occurred while deleting chalan
            echo "Error: " . $conn->error;
        }
    } else {
        // Chalan ID is not set
        echo "Chalan ID not specified";
    }
} else {
    // Redirect back to index.php if delete button is not pressed
    header('Location: index.php');
    exit;
}

$stmt->close();
$conn->close();
?>
