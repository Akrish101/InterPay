<?php
session_start(); // Start or resume session

// Check if the form is submitted via POST method and if all required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['b_fname'], $_POST['b_lname'], $_POST['emp_id'], $_POST['comp_id'], $_POST['comp_name'], $_POST['contact_email'], $_POST['contact_phone'], $_POST['username'], $_POST['password'], $_POST['confirm_password'])) {
    // Include the database connection file
    include("db_conn.php");

    // Retrieve form data
    $b_fname = $_POST['b_fname'];
    $b_lname = $_POST['b_lname'];
    $emp_id = $_POST['emp_id'];
    $comp_id = $_POST['comp_id'];
    $comp_name = $_POST['comp_name'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        // Redirect back to the sign-up page with an error message
        header("Location: SignUpBusiness.php?error=password_mismatch");
        exit();
    }

    // Check if the entered employee ID already exists in the database
    $query_check_emp_id = "SELECT emp_id FROM Business_User WHERE emp_id = ?";
    $statement_check_emp_id = $conn->prepare($query_check_emp_id);
    $statement_check_emp_id->execute([$emp_id]);
    $existing_emp_id = $statement_check_emp_id->fetchColumn();

    if ($existing_emp_id !== false) {
        // Redirect back to the sign-up page with an error message
        header("Location: SignUpBusiness.php?error=invalid_emp_id");
        exit();
    }

    // Prepare and execute SQL statement to insert user data into the database
    $query = "INSERT INTO Business_User (b_fname, b_lname, emp_id, comp_id, contact_email, contact_phone, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->execute([$b_fname, $b_lname, $emp_id, $comp_id, $contact_email, $contact_phone, $username, $password]);

    // Insert company name into Company table
    $query_company = "INSERT INTO Company (comp_name) VALUES (?)";
    $statement_company = $conn->prepare($query_company);
    $statement_company->execute([$comp_name]);

    // Store user information in session variables
    $_SESSION['username'] = $username;
    $_SESSION['emp_id'] = $emp_id;

    // Redirect to a success page or another appropriate page
    header("Location: SignUpBusinessHome.php");
    exit();
} else {
    // Redirect back to the sign-up page if accessed directly without submitting the form or missing required fields
    header("Location: SignUpBusiness.php");
    exit();
}
?>
