<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- initialize the sweetalert notification plugin. -->

<?php
    session_start(); // starts a new session or resumes one that has already initiated.
    include('./database_connection.php');
    
    if ($_POST != null) {
        $currentUserID = $_SESSION['userid']; // holding the data received from html using the POST method.
        $email = $_POST['email']; // holding the data received from html using the POST method.
        $phonenumber = $_POST['phonenumber']; // holding the data received from html using the POST method.
        $education = $_POST['education']; // holding the data received from html using the POST method.
        $marialstatus = $_POST['marialStatus']; // holding the data received from html using the POST method.
        $spousename = $_POST['spousename']; // holding the data received from html using the POST method.
        $childname = $_POST['childname']; // holding the data received from html using the POST method.
        $familymember = $_POST['familymember']; // holding the data received from html using the POST method.
        $province = $_POST['province']; // holding the data received from html using the POST method.
        $district = $_POST['district']; // holding the data received from html using the POST method.
        $city = $_POST['city']; // holding the data received from html using the POST method.
        $street = $_POST['street']; // holding the data received from html using the POST method.
        $ward = $_POST['ward']; // holding the data received from html using the POST method.
        $fetch_query = "select * from farmer_details where id='$currentUserID'"; // returns a set of records.
        $established_connection = $mysql_connection -> query($fetch_query); // to run above query.
        $row = $established_connection -> fetch_assoc(); // fetching row as an associative array.
        $result_id = $row['id'];
        if ($result_id == $currentUserID) {
            $update_query = "UPDATE farmer_details set email = '$email', phone_number = '$phonenumber', education = '$education', marital_status = '$marialstatus', spouse_name = '$spousename', child_name = '$childname', family_member = '$familymember', province = '$province', district = '$district', city = '$city', street = '$street', ward = '$ward' where id = $currentUserID"; // updating farmer details in mysql.
            $mysql_connection -> query($update_query); // to run above query.

            // triggering sweetalert notification.
            echo '
            <script>
                window.onload = function() {
                    swal({
                        title: "Updated Profile!",
                        icon: "success",
                        text: "You have successfully updated your profile.",
                        type: "success"
                    }).then(function() {
                        window.location = "../php/home.php";
                    });
                }
            </script>';
        }

    }
?>