<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "header.php"; ?>
<header>
        <div class="container">
            <h1>Register Vehicle</h1>
            <p>Register your vehicle here to manage your chalans.</p>
        </div>
    </header>
    <div id="form">
        <h2>Register Vehicle</h2>
        <form action="process_registration.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" required><br><br>
            <label for="owner_name">Owner Name:</label>
        <input type="text" id="owner_name" name="owner_name" required><br><br>
        <label for="vehicle_number">Vehicle Number:</label>
        <input type="text" id="vehicle_number" name="vehicle_number" required><br><br>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br><br>
        <label for="registration_date">Registration Date:</label>
        <input type="date" id="registration_date" name="registration_date" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</div>
<?php include "footer.php"; ?>
</body>
</html>
