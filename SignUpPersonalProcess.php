<?php
session_start(); // Start or resume session

// Check if the form is submitted via POST method and if "gen_tit" is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['gen_tit'])) {
    // Include the database connection file
    include("db_conn.php");

    // Retrieve form data
    $gen_tit = $_POST['gen_tit'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        // Redirect back to the sign-up page with an error message
        header("Location: SignUpPersonal.php?error=password_mismatch");
        exit();
    }

    // Prepare and execute SQL statement to insert user data into the database
    $query = "INSERT INTO Users (gen_tit, fname, lname, dob, phone_num, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->execute([$gen_tit, $fname, $lname, $dob, $phone_num, $email, $username, $password]);

    // Store user information in session variables
    $_SESSION['username'] = $username;

    // Redirect to a success page or another appropriate page
    header("Location: SignUpPersonalHome.php");
    exit();
} else {
    // Redirect back to the sign-up page if accessed directly without submitting the form
    header("Location: SignUpPersonal.php");
    exit();
}
?>
