<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';

$vehicle_number = $_SESSION['vehicle_number'];

// Add chalan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_chalan'])) {
    $chalan_date = $_POST['chalan_date'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $sql = "INSERT INTO chalans (vehicle_number, chalan_date, amount, description)
            VALUES ('$vehicle_number', '$chalan_date', '$amount', '$description')";
    $conn->query($sql);
}

// Fetch chalans
$chalans = $conn->query("SELECT * FROM chalans WHERE vehicle_number='$vehicle_number'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Registration and Chalans</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="logo">
                <a href="index.php">VehicleReg</a>
            </div>
            <div class="nav-links">
                <p>Welcome, <?php echo $_SESSION['owner_name']; ?></p>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <header>
        <div class="container">
            <h1>Welcome to Dashboard</h1>
            <p>Click on add chalan to add chalans in the table...</p>
        </div>
    </header>
    <div id="form">
        <h2>Add Chalan</h2>
        <form method="post">
            <label for="chalan_date">Chalan Date:</label>
            <input type="date" id="chalan_date" name="chalan_date" required><br><br>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" required><br><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br><br>
            <input type="submit" name="add_chalan" value="Add Chalan">
        </form>
    </div>
        
    <h2>Chalans</h2>
    <table border="1">
        <tr>
            <th>Chalan Date</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Action</th> <!-- New column for delete button -->
        </tr>
        <?php while ($row = $chalans->fetch_assoc()) : ?>
            <tr>                
                <td><?= $row['chalan_date'] ?></td>
                <td><?= $row['amount'] ?></td>
                <td><?= $row['description'] ?></td>
                <td>
                    <form method="post" action="delete_chalan.php"> <!-- Form for delete button -->
                        <input type="hidden" name="chalan_id" value="<?= $row['id'] ?>"> <!-- Hidden input to pass chalan ID -->
                        <button type="submit" name="delete_chalan" class = "delete" >Delete</button> <!-- Delete button -->
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php include "footer.php"; ?>
</body>
</html>
