<!DOCTYPE html>
<html>
    <head>
        <title>Taxi</title>
        <link rel="stylesheet" type="text/css" href="../Style/style.css">
        <!--fontawesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    body {
    font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
    background-color: #f5f5f5;
    padding: 0;
    margin: 0;
    color: #1a1f36;
    box-sizing: border-box;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

h2 {
    margin-top: 70px;
    text-align: center;
    color: #5469d4;
    font-size: 24px;
    letter-spacing: -1px;
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);
}

label {
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 10px;
    color: #5469d4;
}

input[type="text"],
input[type="tel"],
input[type="email"],
textarea {
    font-size: 14px;
    line-height: 24px;
    padding: 8px 12px;
    width: 100%;
    min-height: 36px;
    border: unset;
    border-radius: 4px;
    outline-color: rgba(84, 105, 212, 0.5);
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0), 0 0 0 0 rgba(0, 0, 0, 0), 0 0 0 0 rgba(0, 0, 0, 0), 1px 1px 5px rgba(60, 66, 87, 0.16);
}

button[type="submit"] {
    background-color: #5469d4;
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    padding: 12px 20px;
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);
}
</style>

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

            <a  class="menu-item active" href="AdTaxi.php">
                <i class="fa fa-taxi" aria-hidden="true"></i><h3>Taxi</h3>
            </a>

            <a  class="menu-item" href="AdHotel.php">
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
            <div class="edituc">
                <h3>TAXI DRIVERS</h3><span>Add,Remove or Edit Taxi</span>
            </div>
            <div class="taxi">
            <div class="taxi">
                    <!-- Display the data from the taxi_drivers table here -->
                    <table class="taxiD"  >
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Vehicle Number</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Database connection parameters
                            $dsn = "mysql:host=localhost;dbname=tvs";
                            $dbusername = "root";
                            $dbpassword = "";

                            // Create a PDO database connection
                            $pdo = new PDO($dsn, $dbusername, $dbpassword);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Prepare and execute the SQL query to retrieve data
                            $stmt = $pdo->query("SELECT * FROM taxi_drivers");

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['first_name'] . "</td>";
                                echo "<td>" . $row['last_name'] . "</td>";
                                echo "<td>" . $row['vehicle_number'] . "</td>";
                                echo "<td>" . $row['phone_number'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>";
                                echo "<a href='../edittaxi.php?id=" . $row['driver_id'] . "' class='up'>Update</a> | ";
                                echo "<a href='../deletetaxi.php?id=" . $row['driver_id'] . "' class='del'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        
            <div class="adddata">
            <h2>Add New Taxi Driver</h2>
                <form action="AdTaxi.php" method="post">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" required><br><br>

                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" required><br><br>

                    <label for="vehicleNumber">Vehicle Number:</label>
                    <input type="text" name="vehicleNumber" required><br><br>

                    <label for="phoneNo">Phone Number:</label>
                    <input type="tel" name="phoneNo" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" required><br><br>

                    <button type="submit" value="Submit">Add Taxi</button>
                </form>
                <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Database connection parameters
                        $dsn = "mysql:host=localhost;dbname=tvs";
                        $dbusername = "root";
                        $dbpassword = "";

                        try {
                            // Create a PDO database connection
                            $pdo = new PDO($dsn, $dbusername, $dbpassword);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Get data from the form
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $vehicleNumber = $_POST['vehicleNumber'];
                            $phoneNo = $_POST['phoneNo'];
                            $email = $_POST['email'];

                            // Prepare and execute the SQL query to insert data
                            $stmt = $pdo->prepare("INSERT INTO taxi_drivers (first_name, last_name, vehicle_number, phone_number, email) VALUES (?, ?, ?, ?, ?)");

                            if ($stmt->execute([$firstName, $lastName, $vehicleNumber, $phoneNo, $email])) {
                                echo "Data inserted successfully.";
                            } else {
                                echo "Error inserting data.";
                            }
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                    }
                    ?>

            </div>
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
