<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale = 1.0">
        <title>Travaliac_Locations</title>
        <link rel="stylesheet" type= "text/css" href="./Style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    </head>

<body>
    <!--....................Header..................................-->
    <section class="sub-header">

        <nav>
            <a href="index.php"><img src="./Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="Index.php">HOME</a></li>
                    <li><a href="stays.php">STAYS</a></li>
                    <li><a href="travel.php">TRAVEL</a></li>
                    <li><a href="location.php" class="active">LOCATIONS</a></li>
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
        <h1>LOCATIONS</h1>
        <input class="inp" type="search" placeholder="search for destination">
        <input class="search" type="button" value="search">
    </section>
<!--..............Location page..........................-->

<section class="popular">

    <h1>Popular Destinations</h1>

    <table class="table" cellspacing="25px">
        <tr>
            <td class="location-col">
                <img src="./Images/kandy.jpg">
                <div class="layer">
                    <h3>KANDY</h3>
                </div>  
            </td>
            <td class="location-col">
                <img src="./Images/Nuwara eliya.jpg">
                <div class="layer">
                    <h3>NUWARA ELIYA</h3>
                </div>  
            </td>
            <td class="location-col">
                <img src="./Images/sigiriya.jpg">
                <div class="layer">
                    <h3>SIGIRIYA</h3>
                </div>  
            </td>
            <td class="location-col">
                <img src="./Images/ella.jpg">
                <div class="layer">
                    <h3>ELLA</h3>
                </div>  
            </td>
            <td class="location-col">
                <img src="./Images/hikkaduwa.jpg">
                <div class="layer">
                    <h3>HIKKADUWA</h3>
                </div>  
            </td>
            
        </tr>
    </table>

</section> 

<br>
<br>
<h1 class="destination">Find Destinations</h1>

<swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="4"
    space-between="30" centered-slides="true">
    <swiper-slide>
        <a href="./Location/Kandy.php">Kandy</a>
        <img src="./Images/kandy.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/NuwaraEliya.php">Nuwara Eliya</a>
        <img src="./Images/Nuwara eliya.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/Sigiriya.php">Sigiriya</a>
        <img src="./Images/sigiriya.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/Colombo.php">Colombo</a>
        <img src="./Images/colombo.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/NuwaraEliya.php">Nuwara Eliya</a>
        <img src="./Images/Nuwara eliya.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/NuwaraEliya.php">Nuwara Eliya</a>
        <img src="./Images/Nuwara eliya.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/NuwaraEliya.php">Nuwara Eliya</a>
        <img src="./Images/Nuwara eliya.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/NuwaraEliya.php">Nuwara Eliya</a>
        <img src="./Images/Nuwara eliya.jpg">
    </swiper-slide>
    <swiper-slide>
        <a href="./Location/NuwaraEliya.php">Nuwara Eliya</a>
        <img src="./Images/Nuwara eliya.jpg">
    </swiper-slide>
  </swiper-container>


  <section class="bottom">
    <h3>Best place for find destinations</h3>
    <input class="inp" type="search" placeholder="search for destination">
    <input class="search" type="button" value="search">
    <br>
    <img src="./Images/Traveliac logo.png" >
    <div class="find">
        <a href="" class="hero-btn">Contact Us</a>
    </div> 
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
<!--find destinations-->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
        

</body>    
</html>