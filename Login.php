<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login to InterPay</title>
</head>

<body>

    <?php include ("NavBar.php"); ?>

    <div class="container">
        <h1>Login to InterPay</h1>
        <p>Choose account type:</p>
        <center>
            <div class="button-group">
                <a href="LoginPersonal.php" class="btn btn-login">Personal</a>
                <a href="LoginBusiness.php" class="btn btn-login">Business</a>
            </div>
        </center>
    </div>

    <?php include ("Footer.php"); ?>

</body>

</html>
