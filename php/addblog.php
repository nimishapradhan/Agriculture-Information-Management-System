<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    session_start();
    include('./database_connection.php');
    $currentemail = $_SESSION['email'];
    $title = $_POST['title'];
    $field = $_POST['field'];
    $mysql_query = "INSERT INTO blog (title, blog) values ('$title', '$field')";
    // $mysql_connection -> query($mysql_query);//
    if ($mysql_connection -> query($mysql_query)) {
        echo '
        <script>
            window.onload = function() {
                swal({
                    title: "Successfully Submitted!",
                    icon: "success",
                    text: "Blog has been saved.",
                    type: "success"
                }).then(function() {
                    window.location = "../php/adminDashboard.php";
                });
            }
        </script>';
    } else {
        echo '
        <script>
            window.onload = function() {
                swal({
                    title: "Error!",
                    icon: "error",
                    text: "There was an error while saving blog. Please try again.",
                    type: "error"
                }).then(function() {
                    window.location = "../extras/addblog.html";
                });
            }
        </script>';
    }

?>