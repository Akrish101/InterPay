<?php
session_start(); // Start the session

include("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $emp_id = $_POST['emp_id'];
    $comp_id = $_POST['comp_id'];

    $query = "SELECT * FROM Business_User WHERE username = :username AND password = :password AND emp_id = :emp_id AND comp_id = :comp_id";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':emp_id', $emp_id);
    $statement->bindParam(':comp_id', $comp_id);
    $statement->execute();
    $result = $statement->fetch();

    if ($result) {
        // Store the username in the session variable
        $_SESSION['username'] = $username;
        header("Location: LoginBusinessHome.php");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: LoginBusiness.php?error=1");
        exit();
    }
}
?>
