<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale = 1.0">
        <title>Travaliac_Travel</title>
        <link rel="stylesheet" type="text/css" href="./Style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    </head>

<body>
    <!--....................Header..................................-->
    <section class="sub-headerT">

        <nav>
            <a href="index.php"><img src="./Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="Index.php">HOME</a></li>
                    <li><a href="stays.php">STAYS</a></li>
                    <li><a href="travel.php" class="active">TRAVEL</a></li>
                    <li><a href="location.php">LOCATIONS</a></li>
                    <li><a href="contactUs.php">CONTACT</a></li>
                    <li><a href="aboutUs.php">ABOUT</a></li>
                </ul>
                <div>
                <?php 
                        session_start();
                        include "connection.php";
                        // Check if the user is logged in
                        if (isset($_SESSION['User_ID'])) {

                            $userId = $_SESSION['User_ID'];
                            

                            $query = "SELECT First_name FROM registered_user WHERE User_ID = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $userId);
                            $stmt->execute();
                            $stmt->bind_result($userName);

                            if ($stmt->fetch()) {
                                
                                echo '<a href="user.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>';
                            } else {
                                
                                echo "User not found in the database.";
                                
                            }

                            $stmt->close();
                        } 
                        ?>
                </div>
            </div>   
        </nav>
        <h1>TRAVEL</h1>
    </section>
<!--..............Travel page..........................-->
<section class="top">
    <table cellspacing="20px">
        <th>Train Time Tables</th>
        <th>Car Rentals</th>
        <tr>
            <td class="time">
                <ul>
                    <li><a href="https://eservices.railway.gov.lk/schedule/searchTrain.action?lang=en" target="_blank">Click here to find more</a></li>
                    <li><a href="https://eservices.railway.gov.lk/schedule/searchTrain.action?lang=en">Maradana - Galle</a></li>
                    <li><a href="https://eservices.railway.gov.lk/schedule/searchTrain.action?lang=en">Maradana - Anuradhapura</a></li>
                    <li><a href="https://eservices.railway.gov.lk/schedule/searchTrain.action?lang=en">Maradana - Jaffna</a></li>
                    <li><a href="https://eservices.railway.gov.lk/schedule/searchTrain.action?lang=en">Galle - Hikkaduwa</a></li>
                    <li><a href="https://eservices.railway.gov.lk/schedule/searchTrain.action?lang=en">Maradana - Anuradhapura</a></li>
          
            </td>
        
            <td class="car">
                <ul>
                    <li><a href="https://www.uber.com/lk/en/">Uber</a></li>
                    <li><a href="https://pickme.lk/">Pick Me</a></li>
                    <li>Celon transport</li>
                    
                </ul>
            </td>
        </tr>    
    </table>

</section>
<section class="location">
<div class="taxi">
                    <!-- Display the data from the taxi_drivers table here -->
                    <table class="taxiD" style="margin-left:10px" >
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Vehicle Number</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Database connection parameters
                            $dsn = "mysql:host=localhost;dbname=tvs";
                            $dbusername = "root";
                            $dbpassword = "";

                            // Create a PDO database connection
                            $pdo = new PDO($dsn, $dbusername, $dbpassword);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Prepare and execute the SQL query to retrieve data
                            $stmt = $pdo->query("SELECT * FROM taxi_drivers");

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['first_name'] . "</td>";
                                echo "<td>" . $row['last_name'] . "</td>";
                                echo "<td>" . $row['vehicle_number'] . "</td>";
                                echo "<td>" . $row['phone_number'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        
</section>

<section class="partners">
    <table>
        <tr>
            <td>
                <a href="https://www.uber.com/lk/en/" target="_blank"><img src="./Images/unnamed.png" alt=""></a>
                <h3>Uber</h3>
            </td>
            <td>
                <a href="https://pickme.lk/" target="_blank"><img src="./Images/unnamed (1).png" alt=""></a>
                <h3>Pick me</h3>
            </td>
            <td>
                <a href="https://ikman.lk/en/ads/q/sri-lanka/bus-hire" target="_blank"><img src="./Images/Hermes_1279-III.jpg" alt=""></a>
                <h3>Bus Rentals</h3>
            </td>
        </tr>
    </table>
</section>
       
<!--..............footer..........................-->
<section class="footer">
    <hr>
    <h4>About Us</h4>
    <p>We are online broker to help you to find destinations, hotels, vehicles and all about travelling. You can book hotels,check<br>
        availability, make plans and fully enjoy your vacation via help of us.</p>

        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>

            <p>Solution by <i class="fa fa-heart-o"></i> MLB_WD_05.01_11</p>
            
        </div>
</section>

<script src="../Source/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>    
</html>