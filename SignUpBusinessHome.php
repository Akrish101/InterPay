<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Home - Business</title>
</head>

<body>

    <?php include ("NavBar2.php"); ?>

    <div class="container">
        <?php
        session_start(); // Start the session
        
        // Check if the username session variable is set
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h1>Welcome, $username!</h1>";
            echo "<p>You are now Signed up as a <b>Business User</b>!</p>";
        } else {
            echo "<h1>Welcome to Your Business Home Page</h1>";
            echo "<p>You are now Signed up as a <b>Business User</b>!</p>";
        }
        ?>
        <a href="SignUpBusinessAccountView.php" class="btn">View Account</a><br>
        <a href="SignUpPersonalTransaction.php" class="btn">Make Transaction</a><br>
        <a href="SignUpBusinessAddUser.php" class="btn">Add Users</a><br>
    </div>

    <?php include ("Footer.php"); ?>

</body>

</html>