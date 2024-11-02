    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Home - Personal</title>
    </head>

    <body>

        <?php include("NavBar2.php");
        // Include the database connection file
        include("db_conn.php"); ?>

        <div class="container">
            <?php
            session_start(); // Start the session

            // Check if the username session variable is set
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<h1>Welcome, $username!</h1>";
                echo "<p>You are now logged in!</p>";
            } else {
                echo "<h1>Welcome to Your Personal Home Page</h1>";
                echo "<p>You are now logged in!</p>";
            }
            ?>

            <!-- "View Account" and "Make Transaction" buttons -->
            <div>
                <a href="LoginPersonalAccountView.php" class="btn">View Account</a><br>
                <a href="LoginPersonalTransaction.php" class="btn">Make Transaction</a><br>
            </div>

            <!-- Display the currency rates table -->
            <h2>Currency Rates</h2>
            <table>
                <thead>
                    <tr>
                        <th>To Currency</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // Query to fetch currency rates from the database
                    $query = "SELECT * FROM Currency_Rate";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $rates = $statement->fetchAll();

                    // Display currency rates if available
                    if ($rates) {
                        foreach ($rates as $rate) {
                            echo "<tr>";
                            echo "<td>" . $rate['to_cur'] . "</td>";
                            echo "<td>" . $rate['rate'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No currency rates found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Add your content here -->
        </div>

        <?php include("Footer.php"); ?>

    </body>

    </html>
