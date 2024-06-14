<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale = 1.0">
        <title>Travaliac_Location_Kandy</title>
        <link rel="stylesheet" type= "text/css" href="../Style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    </head>

<body>
    <!--....................Header..................................-->
    <section class="sub-headerL">

        <nav>
            <a href="index.php"><img src="../Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="../index.php">HOME</a></li>
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
        <h1>KANDY</h1>
    </section>
<!--..............individual location page KANDY..........................-->
<section class="test">
    <div class="box-container">
       <div class="box">
            <h3>Way To Kandy</h3><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.4301079499!2d80.58458158200594!3d7.294543434430296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x411a3818a1e03c35!2sKandy!5e0!3m2!1sen!2slk!4v1696089868353!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
       <div class="box">
        <h3>Travel Partners</h3><br>
        <li><a href="https://www.uber.com/lk/en/" target="_blank"><img src="../Images/unnamed.png" alt=""></a>Uber</li><br>
        <li><a href="https://pickme.lk/" target="_blank"><img src="../Images/unnamed (1).png" alt=""></a>Pick Me</li><br>
        <li><a href="https://ikman.lk/en/ads/q/sri-lanka/bus-hire" target="_blank"><img src="../Images/Hermes_1279-III.jpg" alt="">Bus Rentals</a></li>
       </div>
    </div><br><br>
    <div class="box-container">
        <div class="box">
            <h3>Train Time Tables</h3><br>
            <li><a href="https://transport.ideabeam.com/train/route/colombo-fort/kandy" target="_blank">Click here to find more</a></li>
            <li><img src="../Images/kandytrain.png" class="train"></li>
        </div>
        <div class="box">
            <h3>Places to Visit</h3><br>
            <ol><br>
                <li><a href="https://maps.app.goo.gl/mewaeGzxbQM63QW6A" target="_blank">Sri Dalada Maligawa</a></li><br>
                <li><a href="https://maps.app.goo.gl/bkb6ZTTTrpCm6JqU9" target="_blank">Royal Botanic Garden,Peradeniya</a></li><br>
                <li><a href="https://maps.app.goo.gl/ysKx5gxErJybZVmr9" target="_blank">Kandy Lake</a></li><br>
                <li><a href="https://maps.app.goo.gl/yYpZAxtCanXufZex7" target="_blank">Kandy City Center</a></li><br>
                <li><a href="https://maps.app.goo.gl/3HnR9mp1kJUXLhBN6" target="_blank">Ceylon Tea Musium</a></li>
            </ol>
        </div>
     </div>
   </section><br><br>

<section class="hotels">
    <h3>Hotels Nearby</h3><br><br>
    <div class="hotel-container">
        <div class="hotel">
            <h4>Royal Kandyan</h4>
            <a href="../Stays/Hotel1.php"><img src="../Images/h1.jpg"></a>
        </div>
        <div class="hotel">
            <h4>Royal vila</h4>
            <img src="../Images/h2.jpg">
        </div>
        <div class="hotel">
            <h4>Lake side hotels</h4>
            <img src="../Images/h3.jpg">
        </div>
        <div class="hotel">
            <h4>Transilvania</h4>
            <img src="../Images/h4.jpg">
        </div>
        <div class="hotel">
            <h4>Senturia</h4>
            <img src="../Images/h5.jpg">
        </div>
    </div>
</section>
<br><br><br>
<div class="find2">
    <a href="../location.php" class="hero-btn">Back To LOCATIONS</a>
</div>
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