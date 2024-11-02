<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Sign Up - Business</title>
</head>

<body>

    <?php include ("NavBar.php"); ?>

    <div class="container">
        <h1>Sign Up - Business</h1>
        <center>
            <div class="button-group">
                <form action="SignUpBusinessProcess.php" method="POST">
                    <label for="b_fname">First Name:</label><br>
                    <input type="text" id="b_fname" name="b_fname" required><br>
                    <label for="b_lname">Last Name:</label><br>
                    <input type="text" id="b_lname" name="b_lname" required><br>
                    <label for="emp_id">Employee ID:</label><br>
                    <input type="text" id="emp_id" name="emp_id" required><br>
                    <label for="comp_id">Company ID:</label><br>
                    <input type="text" id="comp_id" name="comp_id" required><br>
                    <label for="comp_name">Company Name:</label><br>
                    <input type="text" id="comp_name" name="comp_name" required><br>
                    <label for="contact_email">Email:</label><br>
                    <input type="email" id="contact_email" name="contact_email" required><br>
                    <label for="contact_phone">Phone Number:</label><br>
                    <input type="tel" id="contact_phone" name="contact_phone" required><br>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br>
                    <label for="confirm_password">Confirm Password:</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
                    <?php
                    // Check if an error message is set
                    if (isset($_GET['error'])) {
                        $error_message = $_GET['error'];
                        // Display the error message
                        echo '<p style="color: red;">' . $error_message . '</p>';
                    }
                    ?>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
            </div>
        </center>
    </div>

    <?php include ("Footer.php"); ?>

</body>

</html>