<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travaliac Booking</title>
    <link rel="stylesheet"  type="text/css" href="./Style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        form {
            margin-left: 50px;
            padding: 20px;
        }
    </style>
    <style>
        /* Styles for the popup form */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(240, 218, 201); /* Change background color to light blue */
            padding-right: 80px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 999;
            border-radius: 10px; /* Add rounded corners */
            width: 300px;
            height: 350px;
            
    
        }
        .popup h2{
            margin-left: 75px;
        }
        
        /* Styles for the overlay background */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        /* Style the "Pay" button */
        .pay-button {
            background-color: rgb(241, 136, 7); /* Change button color to black */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            width: 100px;
            cursor: pointer;
            font-weight: 600;
        }

        .pay-button:hover {
            background-color: rgb(254, 8, 8);
        }

        /* Increase the width of textboxes and move labels and textboxes 180px to the right */
        .form-group label {
            display: inline-block;
            width: 200px;
        }

        .form-group input{
            width: 350px; /* Increase the width */
        }
    </style>
</head>

<body>
<!--....................Header..................................-->
<section class="sub-headerA">
    <nav>
        <a href="index.php"><img src="Images/Traveliac logo.png" ></a> 
        <div class="nav-links" id="navLinks">
            <ul>
                <li><a href="Index.php">HOME</a></li>
                <li><a href="stays.php" class="active">STAYS</a></li>
                <li><a href="travel.php">TRAVEL</a></li>
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
    <h1>Booking</h1>
</section><br><br>

<!--===============================Booking Form===================================================-->
<h2 class="fill">Fill the form</h2><br>
<form action="booking.inc.php" method="post">
<div class="form-group">
        <label for="firstName">First name:</label>
        <br>
        <input type="text" style="height: 20px;" name="firstName" placeholder="Type Your First name here">
    </div>
    <br>
    <div class="form-group">
        <label for="lastName">Last name:</label>
        <br>
        <input type="text" style="height: 20px;" name="lastName" placeholder="Type Your Last name here">
    </div>
    <br>
    <div class="form-group">
        <label for="Num_Adults">Number of Adults:</label>
        <br>
        <input type="number" style="height: 20px;" name="Num_Adults" placeholder="Enter Number of Adults">
    </div>
    <br>
    <div class="form-group">
        <label for="Num_Children">Number of Children:</label>
        <br>
        <input type="number" style="height: 20px;" name="Num_Children" placeholder="Enter Number of Children">
    </div>
    <br>
    <div class="form-group">
        <label for="Country">Country:</label>
        <br>
        <input type="text" style="height: 20px;" name="Country" placeholder="Enter Your Country">
    </div>
    <br>
    <div class="form-group">
        <label for="R_Date">Reservation Date:</label>
        <br>
        <input type="date" style="height: 20px;" name="R_Date">
    </div>
    <br>
    <div class="form-group">
        <label for="Status">Status:</label>
        <br>
        <input type="text" style="height: 20px;" name="Status" placeholder="Enter Reservation Status">
    </div>
    <br>
    <div class="form-group">
        <label for="email">E-mail Address:</label>
        <br>
        <input type="email" style="height: 20px;" name="email" placeholder="Enter Your E-mail here">
    </div>
    <br>
    <div class="form-group">
        <label for="contactNumber">Contact number:</label>
        <br>
        <input type="tel" style="height: 20px;" name="contactNumber" placeholder="Enter Your Contact number here">
    </div>
    <br>

    <!-- Hotel information -->
    <p class="p">Hotel Name: Transilvania</p>
    <p class="p">Price: Rs.20000</p>
    <br>
    <!-- Continue button to show the popup -->
    <button type="button" onclick="showPopup()" style="margin-left: 45%;" class="continue">Continue</button>
</form>

<div class="overlay" id="overlay"></div>

<div class="popup" id="popup">
    <h2>Enter Card Details</h2>
    <form action="booking.inc.php" method="post">
        <label for="cardNumber">Card Number:</label><br>
        <input type="text" name="cardNumber"><br><br>
        <label for="expireDate">Expiration Date:</label><br>
        <input type="date" name="expireDate"><br><br>
        <label for="cvc">CVC:</label><br>
        <input type="text" name="cvc"><br><br>
        <button type="submit" class="pay-button" onclick="hidePopup()">Pay</button>
    </form>
</div>

<script>
    function showPopup() {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    }

    function hidePopup() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("popup").style.display = "none";
    }
</script>

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
</body>
</html>
