<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Transaction Success</title>
</head>

<body>

    <?php include("NavBar2.php"); ?>

    <div class="container">
        <h1>Transaction Success</h1>
        <p>Payment done</p>
        <form action="LoginPersonalHome.php" method="get">
            <input type="submit" value="Go to Personal Home" class="btn">
        </form>
    </div>

    <?php include("Footer.php"); ?>

</body>

</html>
