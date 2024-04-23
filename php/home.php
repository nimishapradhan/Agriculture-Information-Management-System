<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<header class="header">
    <a href="./home.php" class="logo"> <i class="fas fa-leaf"></i> AIMS </a>
    <div class="icons">
        <div class="dropdown1">
            <a id="clipboard-btn" class="fas fa-clipboard"></a>
            <div class="dropdown-content1">
                <a href="./history.php">History</a>
                <a href="../extras/cropdetails.html">Add Crop Details</a>
            </div>
        </div>
        <div class="dropdown">
            <a id="login-btn" class="fas fa-user"></a>
            <div class="dropdown-content">
                <a href="../extras/profileedit.html">Edit Profile</a>
                <a href="../extras/changepassword.html">Change Password</a>
                <a href="./logout.php">Log Out</a>
            </div>
        </div>
    </div>

</header>

<!--End of header section-->
<section class="banner-container">
    <?php
        session_start();
        include('./database_connection.php');
        $currentUser = $_SESSION['username'];
        $mysql_query = "select * from crop_details where username = '$currentUser'";
        $established_connection = $mysql_connection -> query($mysql_query);
        if ($established_connection -> num_rows > 0) {
            while ($finalResult = $established_connection -> fetch_assoc()) {
                echo "<div class='banner'>";
                $cropImage = '../useruploads/'.$finalResult["crop_image"];
                ?>
                <img src="<?php echo $cropImage?>" alt="cropimages"><?php
                echo "<div class='content'>";
                echo "<span>" .$finalResult['crop_name']. "</span>";
                echo "<p>Rs. " .$finalResult['farmer_rate']. "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {    
            echo "<h2 class='emptyContent'>You have not entered any crop details. Please enter crop detail and given details will be displayed here.</h2>";
        }
    ?>
</section>

    <!--Link of custom js file-->
    <script src="js/script.js"></script>
</body>
</html>