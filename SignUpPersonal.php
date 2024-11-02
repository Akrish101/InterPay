<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Sign Up - Personal</title>
</head>

<body>

    <?php include ("NavBar.php"); ?>

    <div class="container">
        <h1>Sign Up - Personal</h1>
        <center>
            <div class="button-group">
                <form action="SignUpPersonalProcess.php" method="POST">
                    <label for="title">Title:</label><br>
                    <select id="title" name="gen_tit">
                        <option value="Mr">Mr</option>
                        <option value="Ms">Ms</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                    </select>

                    </select><br>
                    <label for="fname">First Name:</label><br>
                    <input type="text" id="fname" name="fname" required><br>
                    <label for="lname">Last Name:</label><br>
                    <input type="text" id="lname" name="lname" required><br>
                    <label for="dob">Date of Birth:</label><br>
                    <input type="date" id="dob" name="dob" required><br>
                    <label for="phone">Phone Number:</label><br>
                    <input type="tel" id="phone_num" name="phone_num" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br>
                    <label for="confirm_password">Confirm Password:</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
                    <button type="submit" class="btn">Sign Up</button>
                </form>

            </div>
        </center>
    </div>

    <?php include ("Footer.php"); ?>

</body>

</html>