<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// require '../vendor/autoload.php';
// $mail = new PHPMailer(true);


// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

    session_start();
    include('./database_connection.php');
    $username = $_POST['email'];
    $sec_qns = $_POST['secret_question'];
    $ans = $_POST['sec_ans'];
    $pass = $_POST['newpassword'];
    $con = $_POST['confirmpass'];
    if($pass == $con){
        $mysql_query = "SELECT * from farmer_details WHERE (email = '$username' or username='$username') and (citizenship_number ='$ans' or dob = '$ans')";
        $established_connection = $mysql_connection -> query($mysql_query);
        // $row = $established_connection -> fetch_assoc();
        // $_SESSION["userid"]= $row['id'];
        // $_SESSION["username"]= $row['username'];
        if ($established_connection -> num_rows > 0) {
            $update_query = "UPDATE farmer_details set password = '$pass' WHERE  (email = '$username' or username='$username')";
            $mysql_connection -> query($update_query);
            echo '
            <script>
                window.onload = function() {
                    swal({
                        title: "Updated Password.",
                        icon: "success",
                        text: "You have successfully updated Passwords. Please login with new password",
                        type: "success"
                    }).then(function() {
                        window.location = "../extras/login.html";
                    });
                }
            </script>';
           // header('Location: ../php/home.php');
           
                     
        } else {
            echo '
            <script>
                window.onload = function() {
                    swal({
                        title: "Something went wrong!",
                        icon: "error",
                        text: "User credentials was not found. Please try again.",
                        type: "error"
                    }).then(function() {
                        window.location = "../extras/forgotpassword.html";
                    });
                }
            </script>';
        }
        

    }else{
        echo '
        <script>
            window.onload = function() {
                swal({
                    title: "Something went wrong!",
                    icon: "error",
                    text: "Confirm Password Failed. Please enter same password in both fields.",
                    type: "error"
                }).then(function() {
                    window.location = "../extras/forgotpassword.html";
                });
            }
        </script>';
    }
   
?>