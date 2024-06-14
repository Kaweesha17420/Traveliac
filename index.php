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
        <title>Travaliac</title>
        <link rel="stylesheet" type="text/css" href="./Style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    </head>

<body>
    <!--....................Header..................................-->
    <section class="header">

        <nav>
            <a href="index.php"><img src="./Images/Traveliac logo.png" ></a> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="Index.php" class="active">HOME</a></li>
                    <li><a href="stays.php">STAYS</a></li>
                    <li><a href="travel.php">TRAVEL</a></li>
                    <li><a href="location.php">LOCATIONS</a></li>
                    <li><a href="contactUs.php">CONTACT</a></li>
                    <li><a href="contactUs.php">ABOUT</a></li>
                </ul>
                <div class="log">
                    
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
                    
                    
                    <button class = "btnLogin-popup" name="log">LOGIN</button>
                    <button class="btnSignUp-popup" name="log">SIGN UP</button>
                </div>
            </div>   
        </nav>
        
        <div class="text-box">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error" style="color:#fff; border:1px solid white;border-radius:10px; margin-top:-100px;margin-left:500px;margin-right:500px;background-color:#f64c41;" ><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <h1>THE BEST TRAVEL EXPERIENCE IN<br>SRI LANKA</h1>
              <!--......search........-->
            <div class="box">
                <div class="search_box">
                    <table cellspacing="29px">
                        
                        <tr>
                            <td>
                                <input class="inp" type="text" placeholder="Enter your destination">
                            </td>
                            <td>
                                <input class="inp" type="date">
                            </td>  
                            <td>
                                <input class="inp" type="number" placeholder="Number of guests">
                            </td>

                            <td>
                                <input class="btn" type="button" value="Search">
                            </td>

                        </tr>                                               
                    </table>
                </div>
            </div>
        </div>

      


  <!--.......==============login===============.......................-->   
  
  <div class="wrapper">
    <span class="icon-close">
        <ion-icon name="close"></ion-icon>
    </span>

    <div class="form-box login">
        <h2>Login</h2>
        <form action="formh2log.inc.php" method="post">
            
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit"class="btn">Login</button>
            <div class="Login-register">
                <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>


    <div class="form-box register" >
        <h2>Registration</h2>
        <form action="formhandler.inc.php" method="post">
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" name="Fname" required>
                <label>First Name</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" name="Lname" required>
                <label>Last Name</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="Password" name="Password"required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">I agree to the terms & conditions</label>
               
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="Login-register">
                <p>Already have an account?<a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>

    </div>

    <!--.......wave.......................-->
        <section >
            <nav class="w1">
                <div class="wave wave1"></div>
                <div class="wave wave2"></div>
                <div class="wave wave3"></div>
                <div class="wave wave4"></div>
            </nav>
        </section>
    </section>

<!--...........Popular destinations...............-->


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
    
<!--FIND LOCATIONS on home page=============================-->
<section class="ctu">
    <h1>We are hear to Help You</h1>
    <div class="text">
        <h3>Travel Fast</h3>
        <h3>Save Money</h3>
        <h3>Quick Decision</h3>
        <h3>....Enjoy Your Vacation....</h3>
    </div>
    <br>
    <br>
    <div class="find">
        <a href="location.php" class="hero-btn">FIND LOCATIONS</a>
    </div>
    
</section>

<hr>

<section class="botUl">
    <ul>
        <li>contact us</li>
        <li>Q&A</li>
        <li>Feedback</li>
        <li>Terms & Conditions</li>
        <li>Privacy Policy</li>
    </ul>
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


    <script src="./Source/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
</body>    
</html>

