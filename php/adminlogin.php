<?php
    session_start(); // starts a new session or resumes one that has already initiated.
    include('./database_connection.php'); // copying data from another location.
    $email = $_POST['email']; // holding the data received from html using the POST method.
    $password = $_POST['password']; // holding the data received from html using the POST method.
    $mysql_query = "SELECT * from admin_details WHERE email = '$email' and password = '$password'"; // returns a set of records from the specified table.
    $established_connection = $mysql_connection -> query($mysql_query); // to run above query.
    $row = $established_connection -> fetch_assoc(); // fetching row as an associative array.
    $_SESSION["userid"]= $row['id']; // stroing user id in defined session variable to be used across multiple pages.
    $_SESSION["email"]= $row['email']; // stroing user id in defined session variable to be used across multiple pages.
    $_SESSION["username"]= $row['name']; // stroing user name in defined session variable to be used across multiple pages.
    if ($established_connection -> num_rows > 0) { // checking the number of rows in mysql with an if statement.
        header('Location: ../php/adminDashboard.php'); // using php function to redirect a user from on webpage to another.
    } else {
        header('Location: ../admin.html'); // using php function to redirect a user from on webpage to another.
    }
?>