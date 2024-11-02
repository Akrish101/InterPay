<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: Login.php"); // Redirect to login page if not logged in
    exit();
}

// Include the database connection file
include("db_conn.php");

// Retrieve the username from the session
$username = $_SESSION['username'];

// Query to fetch the user's account details using the username
$query = "SELECT * FROM Users WHERE username = ?";
$statement = $conn->prepare($query);
$statement->execute([$username]);
$user = $statement->fetch();

// Check if user exists
if (!$user) {
    echo "Error: User not found.";
    exit();
}

// Function to delete the user's account
function deleteUserAccount($conn, $username)
{
    $query = "DELETE FROM Users WHERE username = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$username]);
    // Redirect to the login page after account deletion
    header("Location: Login.php");
    exit();
}

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    deleteUserAccount($conn, $username);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Account Details</title>
</head>

<body>

<?php include("NavBar2.php"); ?>

<div class="container">
    <h1>Account Details</h1>
    <center>
        <div class="button-group">
            <p><b>First name:</b> <?php echo $user['fname']; ?></p>
            <p><b>Middle name:</b> <?php echo $user['mname']; ?></p>
            <p><b>Last name:</b> <?php echo $user['lname']; ?></p>
            <p><b>Email:</b> <?php echo $user['email']; ?></p>
            <p><b>Date of Birth:</b> <?php echo $user['dob']; ?></p>
            <p><b>Phone Number:</b> <?php echo $user['phone_num']; ?></p>
            <!-- Delete button -->
            <form method="post">
                <button type="submit" name="delete" class="btn" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
            </form>
        </div>
    </center>
</div>

<?php include("Footer.php"); ?>

</body>

</html>
