<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <!--Header-->
    <header class="header">
        <a href="../index.html" class="logo"> <i class="fas fa-leaf"></i> AIMS </a>
        <nav>
            <ul class="navigation">
                <a href="../index.html">Home</a>
                <a href="./about.html">About Us</a>
                <a href="./blog.php">Blog</a>
                <a href="./contact.html">Contact</a>
                <a href="./login.html">Login</a>
            </ul>
        </nav>
        <!--End of Header section-->
    </header>

<!--Categories-->
<div class="categories">

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="../images/corn.jpg" alt="">
        <div class="content">
            <h3>Corn</h3>
            <span class="quantity"> MR: Rs.XXX</span><br>
            <span class="multiply"> FR: Rs.XXX </span>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="../images/wheat.jpg" alt="">
        <div class="content">
            <h3>Wheat</h3>
            <span class="quantity"> MR: Rs.XXX </span><br>
            <span class="multiply"> FR: Rs.XXX </span>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="../images/rice.jpg" alt="">
        <div class="content">
            <h3>Rice</h3>
            <span class="quantity"> MR: Rs.XXX </span><br>
            <span class="multiply"> FR: Rs.XXX </span>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="../images/potato.jpg" alt="">
        <div class="content">
            <h3>Potato</h3>
            <span class="quantity"> MR: Rs.XXX </span><br>
            <span class="multiply"> FR: Rs.XXX </span>
        </div>
    </div>

    <h3 class="total"><span>MR: Market's Rate<br> FR: Farmer's Rate </span> </h3>
</div>

<!--Logout-->

<div class="logout-form">

    <form action="">
        <h3>setting</h3>
        <!-- <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div> -->

        <a href="#" class="btn">edit profile</a>
        <a href="#" class="btn">change password</a>
        <input type="submit" value="logout" class="btn">
    </form>
</div>

<!--Blog-->
<section class="heading">
    <h3>our blogs</h3>
</section>

<section class="blog">
    <?php
    include('../php/database_connection.php'); // copying data from another location.
    $desc = $_REQUEST['blog'];
    $mysql_query = "SELECT * from blog where blog_title = '$desc'"; // returns a set of records from the specified table.
    $established_connection = $mysql_connection -> query($mysql_query);
    while ($row = $established_connection -> fetch_assoc()) {
        $blogTitle = $row['blog_title'];
        echo "<h1 class='title'> <span>".$blogTitle."</span></h1>
        <div class='box-container'>";
            echo "<div class='box'>";
                echo "<div class='content'>";
                echo "<h3>" .$row['blog_description']. "</h3>";
                echo "<a href='#'> <i class='fas fa-calendar'></i> ".$row['updated_on']."</a>";
                echo "<a href='#'> <i class='fas fa-user'></i> By ".$row['name']."</a>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
    ?>
    </div>
</section>
    <!--Footer-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Social Links</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter</a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram</a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin</a>
                <a href="#"> <i class="fab fa-pinterest"></i> pinterest</a>
            </div>
        </div>
    </section>

    <section class="credit">
        | all rights reserved!
    </section>

    <!--Link of custom js file-->
    <script src="js/script.js"></script>
</body>
</html>