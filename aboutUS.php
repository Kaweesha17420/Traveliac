<!--Reference:
	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css
	https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
	https://swiperjs.com/
	https://www.bootstrapcdn.com/fontawesome/
	https://fonts.google.com/
	https://youtu.be/p1GmFCGuVjw?si=wNW6M3AK1K97GEIE-->


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale = 1.0">
        <title>Travaliac_About us</title>
        <link rel="stylesheet" type="text/css" href="./Style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    </head>

<body>
    <!--....................Header..................................-->
    <section class="sub-headerA">

        <nav>
            <a href="index.php"><img src="./Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="Index.php">HOME</a></li>
                    <li><a href="stays.php">STAYS</a></li>
                    <li><a href="travel.php">TRAVEL</a></li>
                    <li><a href="location.php">LOCATIONS</a></li>
                    <li><a href="contactUs.php">CONTACT</a></li>
                    <li><a href="aboutUs.php" class="stays">ABOUT</a></li>
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
        <h1>About Us</h1>
    </section>
<!--..............About Us..........................-->
<section class="About">
    
    <h1 style="text-align: center;">Save Money Enjoy Life</h1>
    <br>
    <br>
    <br>
    <h2 style="margin-left: 100px;">Hello!</h2>
    <p style="margin-top: 0px; margin-right: 100px; margin-bottom: 0px; margin-left: 100px;">
    Welcome to Travaliyak, your ticket to hassle-free vacation planning and life-changing experiences. We are delighted to meet you and would like to give you a brief introduction. Travaliyak is a portal to a world of exploration and discovery, not merely a website for booking travel. Our goal is to fulfill your travel fantasies by giving you the inspiration, tools, and information you need to confidently and easily organize your trips. We at Travaliyak are aware that every traveler has individual tastes. We have what you're looking for, whether you're a culture vulture hoping to immerse yourself in regional customs or an adrenaline addict seeking adventure in the great outdoors. Every type of traveler can use our platform.
    <br>
    <br>
    </p>
    <h2 style="margin-left: 100px;">Privacy & Policy</h2>
    <p style="margin-top: 0px; margin-right: 100px; margin-bottom: 0px; margin-left: 100px;">
    
    At Travaliyak, we place a high value on your privacy. We are dedicated to protecting your privacy and making sure that your data is secure. The precautions we take to preserve your privacy and the way we manage your data are described in our privacy policy. You can be confident that we will never share your information with other parties without your permission and that it is only used to improve your trip with us.
    
    We are committed to protecting your privacy during your entire trip with Travaliyak, from making hotel reservations to making travel plans. Our devoted team works tirelessly to uphold the highest standards of data privacy because we appreciate your trust.
    
    
    <br>
    <br>
    </p>
    <h2 style="margin-left: 100px;">Terms & Conditions</h2>
    
    <p style="margin-top: 0px; margin-right: 100px; margin-bottom: 0px; margin-left: 100px;">
    
    A set of Terms and Conditions that apply to the usage of Travaliyak's services have been established in order to guarantee a seamless and enjoyable experience on our platform. The rights and obligations of both our users and our platform are outlined in these agreements. You accept these terms, which cover topics including booking, cancellations, and user conduct, by using Travaliyak.
    
    To become familiar with our policies, we urge you to thoroughly read our Terms & Conditions. We are dedicated to giving all of our travelers a secure and convenient environment, and transparency and fairness are the cornerstones of our platform.
    
    
    
    We appreciate you picking Travaliyak to assist you with your travel arrangements. Together, we look forward to taking great experiences and assisting you in making priceless memories. Happy
    <br>
    <br>
    </p>
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