<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width , initial-scale = 1.0">
        <title>Travaliac_Contact_US</title>
        <link rel="stylesheet" type="text/css" href="./Style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    </head>

<body>
    <!--....................Header..................................-->
    <section class="sub-headerC">

        <nav>
            <a href="index.php"><img src="Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                <li><a href="Index.php">HOME</a></li>
                    <li><a href="stays.php">STAYS</a></li>
                    <li><a href="travel.php">TRAVEL</a></li>
                    <li><a href="location.php">LOCATIONS</a></li>
                    <li><a href="contactUs.php" class="active">CONTACT</a></li>
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
        <h1>Contact Us</h1>
        <p>Email us with any questions or inquiries or call 071120000.We would be happy to answer your questions and set up a meeting with you. Black Sheep Web Design can helpset you apart from the flock!
        </p>
    </section>
<!--..............contact page..........................-->
<section class="contact">   
    <div class="container">
        <div class="contactinfo">
            <div class="box">
                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                    <h3>Address</h3>
                    <p> SLIIT <br>colombo road <br>malabe</p>
                </div>
            </div>     
            <div class="box">
                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                    <h3>phone</h3>
                    <p> 01124000000</p>
                </div>
            </div>    
            <div class="box">
                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                    <h3>E-mail</h3>
                    <p> @My.SLIIT.lk</p>
                </div>
            </div>
        </div>        
        <div class="contactform">
            <form action="contactUS.inc.php" method="post">
                
                <div class="inputbox">
                    <input type="text" name="name" required="required">
                    <span>Enter Your Name</span>
                </div>
                <div class="inputbox">
                    <input type="email" name="email" required="required">
                    <span>E-mail Address</span>
                </div>
                <div class="inputbox">
                    <input type="text" name="subject" required="required">
                    <span>Enter the subject</span>
                </div>
                <div class="inputbox">
                    <textarea name="message" required="required"></textarea>
                    <span>message</span>
                </div>			
                <div class="inputbox">
                    <input type="submit" name="submit" value="send">
                </div>
            </form>
        </div>
    </div>



    
 
</section>

<section class="f">
    <hr>
    <h2>FAQ</h2>
    <p>Find quick answers for your questions by clicking on the questions</p>
    <div class="layout">
        <div class="Faq">
            <div class="Faq_Q">
                <p>How to book a hotel?</p>

            </div>
            <div class="Faq_A">
                <p>Find your desired location and click on hotel images at the bottom and after visit hotel's page you can easily click on book now button and book a hotel</p>

            </div>
        </div>
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


<!--find destinations-->

        
<script>
    let answer=document.querySelectorAll(".Faq");
    answer.forEach((event)=>{
        event.addEventListener('click',()=>{
            if(event.classList.contains("active")){
                event.classList.remove("active");
            }
            else{
                event.classList.add("active");
            }
        })
    })
</script>

</body>    
</html>