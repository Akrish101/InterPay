<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Make Transaction</title>
</head>

<body>

    <?php include("NavBar2.php");
    // Include the database connection file
    include("db_conn.php"); ?>

    <div class="container">
        <h1>Make Transaction</h1>
        <center>
        <?php
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $sort_code = $_POST['sort_code'];
            $acc_num = $_POST['acc_num'];
            $amount = $_POST['amount'];
            $to_cur = $_POST['to_cur'];

            // Query to fetch currency rate from the database based on the selected currency
            $query = "SELECT rate, to_cur FROM Currency_Rate WHERE exg_rate_id = :to_cur";
            $statement = $conn->prepare($query);
            $statement->bindParam(':to_cur', $to_cur);
            $statement->execute();
            $rate_row = $statement->fetch();

            if ($rate_row) {
                // Calculate new amount based on the currency rate
                $new_amount = $amount * $rate_row['rate'];

                // Display transaction details
                echo '<div class="button-group">';
                echo "<h2>Transaction Details</h2>";
                echo "<div>Receiver's First Name: $fname</div>";
                echo "<div>Receiver's Last Name: $lname</div>";
                echo "<div>Sort Code: $sort_code</div>";
                echo "<div>Account Number: $acc_num</div>";
                echo "<div>Amount (£): $amount</div>";
                echo "<div>To Currency: {$rate_row['to_cur']}</div>";
                echo "<div>New Amount: $new_amount</div>";
                echo '</div>';

                // Add a button to confirm transaction
                echo '<form action="LoginPersonalTransactionSuccess.php" method="post">';
                echo '<input type="hidden" name="fname" value="' . $fname . '">';
                echo '<input type="hidden" name="lname" value="' . $lname . '">';
                echo '<input type="hidden" name="sort_code" value="' . $sort_code . '">';
                echo '<input type="hidden" name="acc_num" value="' . $acc_num . '">';
                echo '<input type="hidden" name="amount" value="' . $amount . '">';
                echo '<input type="hidden" name="to_cur" value="' . $to_cur . '">';
                echo '<input type="submit" value="Confirm Transaction" class="btn">';
                echo '</form>';
            } else {
                echo "Error: Currency rate not found.";
            }

            // Add a button to go back to the transaction page
            echo '<form action="LoginPersonalTransaction.php" method="get">';
            echo '<input type="submit" value="Back" class="btn">';
            echo '</form>';
        } else {
            // Display the form if it's not submitted
            echo '<form method="post">';
            echo '<div class="button-group">';
            echo '<label for="fname">Receiver\'s First Name:</label><br>';
            echo '<input type="text" id="fname" name="fname" required><br>';
            echo '<label for="lname">Receiver\'s Last Name:</label><br>';
            echo '<input type="text" id="lname" name="lname" required><br>';
            echo '<label for="sort_code">Sort Code:</label><br>';
            echo '<input type="text" id="sort_code" name="sort_code" required><br>';
            echo '<label for="acc_num">Account Number:</label><br>';
            echo '<input type="text" id="acc_num" name="acc_num" required><br>';
            echo '<label for="amount">Amount (£):</label><br>';
            echo '<input type="number" id="amount" name="amount" required><br>';

            echo '<label for="to_cur">To Currency:</label><br>';
            echo '<select id="to_cur" name="to_cur" required>';
            echo '<option value="" disabled selected>Choose</option>';
            // Loop through currency options
            $query = "SELECT exg_rate_id, to_cur, rate FROM Currency_Rate";
            $statement = $conn->query($query);
            while ($row = $statement->fetch()) {
                echo '<option value="' . $row['exg_rate_id'] . '">' . $row['to_cur'] . '</option>';
            }
            echo '</select><br><br>';
            echo '<input type="submit" value="Submit" class="btn">';
            echo '</div>';
            echo '</form>';
        }
        ?>
        </center>

    </div>

    <?php include("Footer.php"); ?>

</body>

</html>
