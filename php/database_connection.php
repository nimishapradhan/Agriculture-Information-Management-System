<?php
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "hamro_agriculture";
    $mysql_connection = new mysqli($host, $username, $password, $database); // Making a new object to create a new connection.
    if ($mysql_connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysql_connection -> connect_error;
        exit();
    }
?>