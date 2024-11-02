<?php
session_start();

// Include the database connection file
include("db_conn.php");

// Query to fetch currency rates from the database
$query = "SELECT * FROM Currency_Rate";
$statement = $conn->prepare($query);
$statement->execute();
$rates = $statement->fetchAll();

// Check if there are any currency rates retrieved
if ($rates) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Currency Rates</title>
    </head>

    <body>

    <?php include("NavBar.php"); ?>

    <div class="container">
        <h1>Currency Rates</h1>
        <table>
            <thead>
                <tr>
                    <th>To Currency</th>
                    <th>Rate</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rates as $rate): ?>
                    <tr>
                        <td><?php echo $rate['to_cur']; ?></td>
                        <td><?php echo $rate['rate']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include("Footer.php"); ?>

    </body>

    </html>
    <?php
} else {
    // No currency rates found
    echo "No currency rates found.";
}
?>
