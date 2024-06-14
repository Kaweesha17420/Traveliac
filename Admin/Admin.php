
<?php
// Check if the user is logged in
session_start();

if (!isset($_SESSION['Admin_ID'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace with your login page URL
    exit;
}

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=tvs";
$dbusername = "root";
$dbpassword = ""; // Replace with your actual database credentials

try {
    $connection = new PDO($dsn, $dbusername, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve admin data based on the logged-in Admin_ID
$adminId = $_SESSION['Admin_ID'];

try {
    $sql = "SELECT * FROM Administrator WHERE Admin_ID = :adminId";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':adminId', $adminId);
    $stmt->execute();

    $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$connection = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="../Style/style.css">
        <!--fontawesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

<body>
    
<section class="AdminHeader">

    <nav>
        <a href="index.php"><img src="../Images/Traveliac logo.png" class="hed" ></a>
        <div class="heright">
            <ul>
                <li><i class="fa fa-user-circle" aria-hidden="true"></i></li>
                <li><h3>ADMIN</h3></li>
             
            </ul>
            
        </div>   
    </nav>
</section>

<div class="main-container">
    <div class="main-left">
        <aside>
            <a  class="menu-item active" href="Admin.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i><h3>Dashboard</h3>
            </a>

            <a  class="menu-item" href="Staff.php">
                <i class="fa fa-users" aria-hidden="true"></i><h3>Admin Staff</h3>
            </a>
            
            <a  class="menu-item" href="UsersA.php">
                <i class="fa fa-users" aria-hidden="true"></i>
            
                <h3>Users</h3>
            </a> 
            

            <a  class="menu-item" href="ChatAdmin.php">
                <i class="fa fa-comment" aria-hidden="true"></i>
               
                <h3>Chat</h3>
            </a>

            <a  class="menu-item" href="Managers.php">
                <i class="fa fa-user" aria-hidden="true"></i><h3>Managers</h3>
            </a>

            <a  class="menu-item" href="AdTaxi.php">
                <i class="fa fa-taxi" aria-hidden="true"></i><h3>Taxi</h3>
            </a>

            <a  class="menu-item" href="AdHotel.php">
                <i class="fa fa-h-square" aria-hidden="true"></i><h3>Hotels</h3>
            </a>
            <a  class="menu-item" href="../index.php">
                <i class="fa fa-home" aria-hidden="true"></i><h3>Home Page</h3>
            </a>
            
            <a href="../logout.php"><button for="log-out" class="btn-logout">Log Out</button></a>
            
        </aside>
    </div>
    
    <!--============Main Middle Start============-->
    <div class="main-middle">
        <div class="middle-container">
    
        <!--Feed Aria Start-->
            <div class="feeds">
                <div class="feed">
                    <!--feed Top-->
                    <div class="feed-top">
                        <div class="user">
                            <div class="profile-picture">
                                <img src="../Images/Admin.png">
                            </div>
                            <div class="info">
                                <h3><?php echo $_SESSION['First_name'] . ' ' . $_SESSION['Last_name']; ?></h3>
                                <div class="time text-gry">
                                    <small>SriLanka, <span>Admin</span></small>
                                </div>
                            </div>                           
                            
                        </div>
                    
                    </div>
                    <div class="feed-img">
                        <img src="../Images/Admin.png" alt="">
                        
                    </div>

                    <!--Add database here==============================================================================-->
                                                    
                    <div class="admindeta" >
                        <!-- Your HTML structure for the Admin Dashboard -->
                        <h2><?php echo $adminData['First_name'] . ' ' . $adminData['Last_name']; ?></h2><br>
                        <p>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $adminData['Email']; ?></p>
                        <p>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $adminData['Gender']; ?></p>
                        <p>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $adminData['City']; ?></p>
                        <p>Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $adminData['Country']; ?></p>
                        <p>Postal_code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $adminData['Postal_code']; ?></p>
                        <p>Street&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; : <?php echo $adminData['Street']; ?></p>
                        <p>House_number&nbsp;: <?php echo $adminData['House_number']; ?></p>
                        <!-- Add more information as needed -->
                    </div>
                    
                    
                 
                    
                </div>
            </div>    
        </div>    
    
    </div>

    <!--right======================================-->

    <div class="main-right">
        <div class="right-container">
            <!--Edit personal details=============================================-->
            <div class="editPersonal">
                <h3>Edit Personal Dettails</h3><br>
                <form action="../update_admin_data.php" method="post">
                    <li>
                        <label for="">Password</label>
                        <input type="password" name="password">
                    </li>
                    <li>
                        <label for="">First name</label>
                        <input type="text" name="fName">
                    </li>
                    <li>
                        <label for="">Last name</label>
                        <input type="text" name="lName">
                    </li>
                    <li>
                        <label for="">Gender</label>
                        <input type="text" name="gender">
                    </li>
                    <li>
                        <label for="">City</label>
                        <input type="text" name="city">
                    </li>
                    <li>
                        <label for="">Country</label>
                        <input type="text" name="country">
                    </li>
                    <li>
                        <label for="">Postal code</label>
                        <input type="number" name="P_code">
                    </li>
                    <li>
                        <label for="">Street</label>
                        <input type="text" name="street">
                    </li>
                    <li>
                        <label for="">House number</label>
                        <input type="number" name="H_no">
                    </li>
                    <li>
                        <label for="">Email</label>
                        <input type="email" name="email">
                    </li>
                    <br>
                    <button type="submit" class="save">Save</button>
                </form>
            </div>
        </div>
    </div>
    
    <!--Feed Aria End-->
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

    <!--============Main Middle End============-->


</body>


</html>
