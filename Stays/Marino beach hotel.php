<!DOCTYPE html>
<html>
    <head>
        <title>Travaliac</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type= "text/css" href="../Style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>

         <!--....................Header..................................-->

    <section class="sub-headerBook">

        <nav>
            <a href="index.php"><img src="../Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="stays.php">STAYS</a></li>
                    <li><a href="travel.php">TRAVEL</a></li>
                    <li><a href="location.php" class="active">LOCATIONS</a></li>
                    <li><a href="contactUs.php">CONTACT</a></li>
                    <li><a href="aboutUs.php">ABOUT</a></li> 
                </ul>
                <div>
                <?php 
                        session_start();
                        include "../connection.php";
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

        <div class="text-box">
            <h1>Marino Beach Hotel</h1>
            
            <div class="icons1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <br>
            <p class="description">A Fascinating Hotel located in the heart of Colombo – Sri Lanka.
                Whether it is for business or pleasure, make your visit truly exceptional and memorable 
                by staying at Hotel Marino Beach that offers an experience with a blend of luxury and modernity that you wish would last forever.
                It boasts of 300 spacious and luxurious rooms, designed with true urban elegance.</p>
        </div>
  
    </section>

    <section class="main">
        <!--........Book Now...........-->
        <div class="left_img">
            <div class="left_up">
                <div class="top_img">
                    <img src="../Images/marino5.jpg">
                </div>
                <div class="bottom_img">
                    <img src="../Images/marino6.jpg">
                    <img src="../Images/marino2.jpg">
                    <img src="../Images/marino4.jpg">
                </div>
            </div>            
            <div class="left_text">
                <p>
                    Book at Marino Beach Colombo, Colombo. No Reservation Costs. Great Rates. Great Choice. 
                    Book Your Car Rental. Read Real Guest Reviews. Airport Taxi available. Low Rates. 
                    Hotels. Special Offers. Apartments. We speak your language. Motels.
                </p>
            </div>
            
        </div>

        <div class="box">
            <p>
                <ul>
                    <li>24 hour housekeeping and In-room Dining</li>
                    <li>Access to the rooftop garden and Infinity pool</li> 
                    <li>Complementary access to the Fitness Centre</li>
                </ul>
            </p>
            <div >
                <a href="../booking.php"><button>Book Now</button></a>
            </div>
        </div>

        <div class="right_img">
            <img src="../Images/marino1.jpg">
        </div>

    </section>   
<!--............................footer......................................................................-->
    <section class="footer"> 
        <hr>
        <h4>About Us</h4>
        <p>We are online broker to help you to find destinations, hotels, vehicles and all about travelling. You can book hotels,check<br>
        availability, make plans and fully enjoy your vacation via help of us.</p>

        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-linkedin"></i>

            <p>Solution by <i class="fa fa-heart-o"></i> MLB_WD_05.01_11</p>
            
        </div>
    </section>
    
    </body>
</html>