<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Post Blog</title>
</head>
<body>
    <header class="header">

        <a href="../php/home.php" class="logo"> <i class="fas fa-leaf"></i> AIMS </a>

        
    
        <div class="icons">
            <div class="dropdown1">
                <a id="clipboard-btn" class="fas fa-clipboard"></a>
                <div class="dropdown-content1">
                    <a href="./adminHistory.php">History</a>
                    <a href="../extras/adminMarketRate.html">Add Market Rate</a>
                </div>
            </div>
            <div class="dropdown">
                <a id="login-btn" class="fas fa-user"></a>
                <div class="dropdown-content">
                    <a href="../php/logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </header>
    <div class="blog-div">
        <form class="blog-divsecond" action="./blog.php" method="post">
            <h1>Post Blog</h1>
    
            <div class="">
                <div class="">
                    <label for="currentTitle">Title</label>
                    <input id="currentTitle" name="currentTitle" type="text">
                    <br><br>
                    
                    <label for="blog">Description:</label>
                    <textarea style="padding:10px;" class="box" id="blog" name="blog" cols="63" rows="10"></textarea>
                    <br><br>
                </div>
            </div>
            <button class="submit" type="submit" id="submit">Post</button>
        </form>
        <?php
            session_start();
            include('./database_connection.php'); // copying data from another location.
            if ($_POST !=NULL) {
                $title = $_POST['currentTitle']; // holding the data received from html using the POST method.
                $description = $_POST['blog']; // holding the data received from html using the POST method.
                $owner = $_SESSION["username"];
                echo $owner;
                $mysql_query = "INSERT INTO blog (name, blog_title, blog_description) VALUES ('$owner', '$title', '$description')"; // returns a set of records from the specified table.
                $established_connection = $mysql_connection -> query($mysql_query); // to run above query.
                if ($established_connection) { // checking the number of rows in mysql with an if statement.
                    header('Location: ./adminDashboard.php'); // using php function to redirect a user from on webpage to another.
                }
            }
        ?>
    </div>
</body>
</html>