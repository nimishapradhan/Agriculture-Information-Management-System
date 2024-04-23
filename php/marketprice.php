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
        <a href="./index.html" class="logo"> <i class="fas fa-leaf"></i> AIMS </a>
        <nav>
            <ul class="navigation">
                <a href="../index.html">Home</a>
                <a href="../extras/about.html">About Us</a>
                <a href="../extras/blog.php">Blog</a>
                <a href="../extras/contact.html">Contact</a>
                <a href="../extras/login.html">Login</a>
            </ul>
        </nav>
        <!--End of Header section-->
    </header>

<body>
    <div class="marketrate_box">
        <table>
            <thead>
                <tr>
                    <th>Crop Name</th>
                    <th>Market Rate</th>
                    <th>Province</th>
                               </tr>
            </thead>

            <tbody id="marketrate">
            <?php
            
            include('./database_connection.php');

            $mysql_query = "select * from market_details"; // returns a set of records.


            $established_connection = $mysql_connection -> query($mysql_query); // to run above query.


            while ($row = $established_connection -> fetch_assoc()) { // fetching row as an associative array using while loop.
                echo "<tr>";
                echo "<td>".$row['crop_name']. "</td>"; // displaying the result.
               
                echo "<td>".$row['market_rate']. "</td>"; // displaying the result.
                echo "<td>".$row['province']. "</td>"; // displaying the result.
                
                echo "</tr>";
 
            }

            
            ?>
            </tbody>
            
        </table>
         



    <!--Link of custom js file-->
    <script src="js/script.js"></script>
</body>
</html>