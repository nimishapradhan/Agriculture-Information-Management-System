<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- initialize the sweetalert notification plugin. -->

<?php
    include('./database_connection.php'); // copying data from another location.
    $customername = $_POST['customername']; // holding the data received from html using 
    $customernumber = $_POST['customernumber']; // holding the data received from html using 
    $customeremail = $_POST['customeremail']; // holding the data received from html using 
    $customerfeedback = $_POST['customerfeedback']; // holding the data received from html using 
    $mysql_query = "INSERT INTO contact (username, phonenumber, email, message) values ('$customername', '$customernumber', '$customeremail', '$customerfeedback')"; // insert the given data in mysql.
    $mysql_connection -> query($mysql_query);// to run above query.
    // triggering sweetalert notification.
    echo '
    <script>
        window.onload = function() {
            swal({
                title: "Feedback Recorded!",
                icon: "success",
                text: "Thank you for your feedback.",
                type: "success"
            }).then(function() {
                window.location = "../extras/contact.html";
            });
        }
    </script>';
?>