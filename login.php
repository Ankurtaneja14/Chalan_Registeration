<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "header.php"; ?>
<header>
        <div class="container">
            <h1>Login</h1>
            <p>Log in to Get Started...</p>
        </div>
    </header>
    <div id="form">
        <h2>Login</h2>
        <form action="check_login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <?php include "footer.php"; ?>

</body>
</html>
