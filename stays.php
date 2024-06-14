<!DOCTYPE html>
<html>
    <head>
        <title>traveliac</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./Style/stays.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>    

    </head>

    <body>

         <!--....................Header..................................-->

    <section class="header">

        <nav>
            <a href="index.php"><img src="./Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="Index.php">HOME</a></li>
                    <li><a href="stays.php" class="stays">STAYS</a></li>
                    <li><a href="travel.php">TRAVEL</a></li>
                    <li><a href="location.php">LOCATIONS</a></li>
                    <li><a href="ontactUs.php">CONTACT</a></li>
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

        
        <div class="text-box">
            <h1>STAYS</h1>
        </div>

    </section>

<!--...........Browse your property type...............-->

 <section class = "property">
   
     <h2>Browse your property type</h2>

     <br><br>

     <table class ="tablep">
        <tr class="table-row">
            <td class="type-col">
                <img src="./Images/hotels.jpg">
                <div class="layer">
                    <h3>Hotels</h3>
                </div>
            </td>

            <td class = "type-col">
                <img src="./Images/apartments.jpg">
                <div class = "layer">
                    <h3>Apartments</h3>
                </div>
            </td>
            
            <td class = "type-col">
                <img src="./Images/resort.jpg">
                <div class = "layer">
                    <h3>Resorts</h3>
                </div>

            </td>

            <td class = "type-col">
                <img src="./Images/vila.jpg">
                <div class = "layer">
                    <h3>Vilas</h3>
                </div>
            </td>

        </tr>
     </table>

 </section>  
 
 <!--.....................find stays by your travel destination................-->
 
 <section class="sec_space">

    <h2>Find stays by your travel destination</h2>
   <br><br>

   <div class="container">
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="./Images/plce1.jpg" ></div>
        <div class="swiper-slide"><img src="./Images/location1.jpg" ><a href="./Location/NuwaraEliya.php">Nuwara Eliya</a></div>
        <div class="swiper-slide"><img src="./Images/location2.jpg" ><a href="./Location/Colombo.php">Colombo</a></div>
        <div class="swiper-slide"><img src="./Images/plce4.jpg" ><a href="./Location/Sigiriya.php">Sigiriya</a></div>
        <div class="swiper-slide"><img src="./Images/location3.jpg" >Mirissa</div>
        <div class="swiper-slide"><img src="./Images/plce6.jpeg" >Galle Dutch Fort</div>
        <div class="swiper-slide"><img src="./Images/location8.jpg" >Diyaluma Waterfall</div>
        <div class="swiper-slide"><img src="./Images/Jaffna-Fort-5.jpg" >Jaffna</div>
        <div class="swiper-slide"><img src="./Images/plce9.jpg" >Nine Arch Bridge</div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>

</section>
 
        
<!--.....................footer..........................-->

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

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="./Source/staysScript.js"></script>
    
    </body>
</html>