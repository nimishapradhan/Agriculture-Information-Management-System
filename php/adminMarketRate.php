<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    session_start();
    include('./database_connection.php');
    $userEmail = $_SESSION["email"];
    $cropname = $_POST['cropDetails'];
    $marketRate = $_POST['farmers'];
    $province = $_POST['province1'];

    $mysql_query = "INSERT INTO market_details (email, crop_name, market_rate, province) values ('$userEmail', '$cropname', '$marketRate', '$province')";
    if ($mysql_connection -> query($mysql_query)) {
        echo '
        <script>
            window.onload = function() {
                swal({
                    title: "Successfully Submitted!",
                    icon: "success",
                    text: "Details have been saved.",
                    type: "success"
                }).then(function() {
                    window.location = "../php/adminDashboard.php";
                });
            }
        </script>';
    } else {
        echo "something is wrong";
    }
?>