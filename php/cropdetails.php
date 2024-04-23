<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    session_start();
    include('./database_connection.php');
    $targetDir = "../useruploads/";
    $currentUsername = $_SESSION['username'];
    $cropname = $_POST['cropDetails'];
    $cropImage = basename($_FILES["imagesupload"]["name"]);
    $targetFilePath = $targetDir . $cropImage;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $production = $_POST['production'];
    $growth = $_POST['growth'];
    $fertilizers = $_POST['fertilizers'];
    $reproduction = $_POST['reproduction'];
    $cropcycle = $_POST['cropcycle'];
    $seasons = $_POST['seasons'];
    $farmers = $_POST['farmers'];
    $province = $_POST['province1'];
    if (!is_numeric($production)) {
    
        echo '
        
        <script>
            window.onload = function() {
                swal({
                    title: "Error!",
                    icon: "error",
                    text: "Only numerics value are accepted in production. Please try again.",
                    type: "error"
                }).then(function() {
                    window.location = "../extras/cropdetails.html";
                });
            }
        </script>';
        return false;
        }

    if (!empty($_FILES["imagesupload"]["name"])) {
        $allowTypes = array('jpg','png','jpeg','gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["imagesupload"]["tmp_name"], $targetFilePath)) {
                $mysql_query = "INSERT INTO crop_details (username, crop_name, crop_image, production, growth_status, fertilizers_used, reproduction_type, crop_cycle, seasons, farmer_rate, province) values ('$currentUsername', '$cropname', '$cropImage', '$production', '$growth', '$fertilizers', '$reproduction', '$cropcycle', '$seasons', '$farmers', '$province')";
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
                                window.location = "../php/home.php";
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
                                text: "There was an error while saving crop images. Please try again.",
                                type: "error"
                            }).then(function() {
                                window.location = "../extras/cropdetails.html";
                            });
                        }
                    </script>';
                }
            } else {
                echo '
                <script>
                    window.onload = function() {
                        swal({
                            title: "Error!",
                            icon: "error",
                            text: "There was an error while saving crop images. Please try again.",
                            type: "error"
                        }).then(function() {
                            window.location = "../extras/cropdetails.html";
                        });
                    }
                </script>';
            }
        } else {
            echo '
            <script>
                window.onload = function() {
                    swal({
                        title: "Error!",
                        icon: "error",
                        text: "There was an error while saving crop images. Only JPG, JPEG, PNG & GIF are allowed to upload.",
                        type: "error"
                    }).then(function() {
                        window.location = "../extras/cropdetails.html";
                    });
                }
            </script>';
        }
    }
?>