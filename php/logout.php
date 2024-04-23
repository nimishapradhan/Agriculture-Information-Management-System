<?php
    session_start(); // starts a new session or resumes one that has already initiated.
    $_SESSION = array(); // using php functions to create an array.
    session_destroy(); // Deletes all data related to the current session.
    header("location: ../index.html"); // using php function to redirect a user from on webpage to another.
?>