<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login - Personal</title>
</head>

<body>

    <?php include ("NavBar.php"); ?>

    <div class="container">
        <h1>Login - Personal</h1>
        <center>
            <div class="button-group">
                <form action="LoginPersonalProcess.php" method="POST">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username"><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password"><br><br>
                    <?php
                    if(isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p style="color: red;">Incorrect username or password. Please try again.</p>';
                    }
                    ?>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </center>
    </div>

    <?php include ("Footer.php"); ?>

</body>

</html>
