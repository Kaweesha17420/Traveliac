<!DOCTYPE html>
<html>
    <head>
        <title>Hotels</title>
        <link rel="stylesheet" type="text/css" href="../Style/style.css">
        <!--fontawesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

<body>
    
<section class="AdminHeader">

    <nav>
        <a href="index.html"><img src="../Images/Traveliac logo.png" class="hed" ></a>
        <div class="heright">
            <ul>
                <li><i class="fa fa-user-circle" aria-hidden="true"></i></li>
                <li>ADMIN</li>
             
            </ul>
            
        </div>   
    </nav>
</section>

<div class="main-container">
    <div class="main-left">
        <aside>
            <a  class="menu-item " href="Admin.php">
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

            <a  class="menu-item active" href="AdHotel.php">
                <i class="fa fa-h-square" aria-hidden="true"></i><h3>Hotels</h3>
            </a>
            <a  class="menu-item" href="../Index.php">
                <i class="fa fa-home" aria-hidden="true"></i><h3>Home Page</h3>
            </a>
            
            <a href="../logout.php"><button for="log-out" class="btn-logout">Log Out</button></a>
        </aside>
    </div>
    
    <!--============Main Middle Start============-->
    <div class="main-middle">
        <div class="middle-container">

        <div>
        <h2 style="text-align:center" >Hotel Information</h2>
    <table border="1" class="taxiD" >
        <thead>
            <tr>
                <th>Hotel ID</th>
                <th>Hotel Name</th>
                <th>Phone Number</th>
                <th>Owner</th>
                <th>City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection parameters
            $dsn = "mysql:host=localhost;dbname=tvs";
            $dbusername = "root";
            $dbpassword = "";

            try {
                // Create a PDO database connection
                $pdo = new PDO($dsn, $dbusername, $dbpassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare and execute the SQL query to retrieve data from the Hotel table
                $stmt = $pdo->query("SELECT * FROM Hotel");

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['hotel_id'] . "</td>";
                    echo "<td>" . $row['hotel_name'] . "</td>";
                    echo "<td>" . $row['phone_no'] . "</td>";
                    echo "<td>" . $row['owner'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>";
                    echo "<a href='../UpdateHotel.php?id=" . $row['hotel_id'] . "' class='up'>Update</a> | ";
                    echo "<a href='../DeleteHotel.php?id=" . $row['hotel_id'] . "' class='del'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table><br><br><br>
        </div>
            <h2 style="text-align:center;" >Add New Hotel</h2><br><b></b>
        <div class="editPersonalh">
                <form method="post" action="AdHotel.php" class="man" >
                        
                    <label for="hotel_name">Hotel Name:</label>
                    <input type="text" name="hotel_name" required><br>

                    <label for="phone_no">Phone Number:</label>
                    <input type="text" name="phone_no" required><br>

                    <label for="owner">Owner:</label>
                    <input type="text" name="owner" required><br>

                    <label for="city">City:</label>
                <input type="text" name="city" required><br>

                        
                <button type="submit" class="add">Add</button>
                </form>

                <?php
                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Database connection parameters
                        $dsn = "mysql:host=localhost;dbname=tvs";
                        $dbusername = "root";
                        $dbpassword = "";

                        try {
                            // Create a PDO database connection
                            $pdo = new PDO($dsn, $dbusername, $dbpassword);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Get data from the form
                            $hotel_name = $_POST['hotel_name'];
                            $phone_no = $_POST['phone_no'];
                            $owner = $_POST['owner'];
                            $city = $_POST['city'];

                            // Prepare and execute the SQL query to insert data into the Hotel table
                            $stmt = $pdo->prepare("INSERT INTO Hotel (hotel_name, phone_no, owner, city) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$hotel_name, $phone_no, $owner, $city]);

                            echo "Hotel information inserted successfully.";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                    ?>

            </div>


        
        </div>
    </div>

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


</body>


</html>
