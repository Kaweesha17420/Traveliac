<!DOCTYPE html>
<html>
    <head>
        <title>Travaliac</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type= "text/css" href="../Style/hotel1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />  
    
        </head>
    <body>

         <!--....................Header..................................-->

    <section class="header">

        <nav>
            <a href="index.php"><img src="../images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="../Index.php">HOME</a></li>
                    <li><a href="../stays.php">STAYS</a></li>
                    <li><a href="../travel.php">TRAVEL</a></li>
                    <li><a href="../location.php" class="active">LOCATIONS</a></li>
                    <li><a href="../contactUs.php">CONTACT</a></li>
                    <li><a href="../aboutUs.php">ABOUT</a></li> 
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
            <h1>Aliya Resort and Spa - Thema Collection</h1>
            
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
            <p class="description">Aliya Resort and Spa - Thema Collection is set amidst lush tropical foliage. 
                Located right across from Sigiriya Rock, the resort features an outdoor swimming pool, 
                fitness center and 4 dining options. 
                Free Wi-Fi access is available at this property</p>
        </div>
  
    </section>

    <section class="main">
        <!--........Book Now...........-->
        <div class="left_img">
            <div class="left_up">
                <div class="top_img">
                    <img src="../images/araliya2.jpg">
                </div>
                <div class="bottom_img">
                    <img src="../images/araliya3.jpg">
                    <img src="../images/araliya4.jpg">
                    <img src="../images/araliya6.jpg">
                </div>
            </div>            
            <div class="left_text">
                <p>
                    The accommodations are located a 35-minute drive from Dambulla. 
                    It is an hour drive from Minneriya National Park and a 3.5-hour drive from Bandaranaike International Airport.
                    Colombo City is 4 hours away by car.

                    Aliya Resort’s 96 rooms all have stylish interiors, a wardrobe and a sofa sitting area. 
                    The spacious private bathrooms each feature a stand-alone bathtub and free bath amenities. 
                    Tea/coffee-making facilities are provided, as well.
                </p>
            </div>
            
        </div>

        <div class="box">
            <p>
                <ul>
                    <li>Family rooms / Free WiFi / irport shuttle</li>
                    <li>Free parking / Outdoor swimming pool</li> 
                    <li>Tea/Coffee Maker in All Rooms / Spa</li>
                </ul>
            </p>
            <div class="btn">
                <button class="bok"><a href="../booking.php">Book Now</a></button>
            </div>
        </div>

        <div class="right_img">
            <img src="../images/araliyaspa.jpg">
        </div>

    </section>   

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