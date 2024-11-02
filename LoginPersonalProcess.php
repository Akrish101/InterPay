<?php
session_start();

include("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Users WHERE username=:username AND password=:password";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();
    $result = $statement->fetch();

    if ($result) {
        // Store the username in the session variable
        $_SESSION['username'] = $username;
        header("Location: LoginPersonalHome.php");
        exit();
    } else {
        // Error 1 = wrong creds
        header("Location: LoginPersonal.php?error=1");
        exit();
    }
}
?>
