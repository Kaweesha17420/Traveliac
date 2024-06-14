<!DOCTYPE html>
<html>
    <head>
        <title>staff</title>
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

            <a  class="menu-item active" href="Managers.php">
                <i class="fa fa-user" aria-hidden="true"></i><h3>Managers</h3>
            </a>

            <a  class="menu-item" href="AdTaxi.php">
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
                <h3>Managers</h3><span>Add,Remove or Edit Managers</span>
            </div>

                                
                    <table border="1" class="MID" >
                        <tr>
                            <th>M_ID</th>
                            <th>Admin_ID</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Password</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Postal_code</th>
                            <th>Street</th>
                            <th>House_number</th>
                            <th>Email</th>
                        </tr>

                        <?php
                        // Database connection parameters
                        $dsn = "mysql:host=localhost;dbname=tvs";
                        $dbusername = "root";
                        $dbpassword = "";

                        // Create a PDO database connection
                        $pdo = new PDO($dsn, $dbusername, $dbpassword);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Prepare and execute the SQL query to retrieve data from the Manager table
                        $stmt = $pdo->query("SELECT * FROM Manager");

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['M_ID'] . "</td>";
                            echo "<td>" . $row['Admin_ID'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['DOB'] . "</td>";
                            echo "<td>" . $row['Password'] . "</td>";
                            echo "<td>" . $row['City'] . "</td>";
                            echo "<td>" . $row['Country'] . "</td>";
                            echo "<td>" . $row['Postal_code'] . "</td>";
                            echo "<td>" . $row['Street'] . "</td>";
                            echo "<td>" . $row['House_number'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";

                            echo "<td>";
                            echo "<a href='../updateManager.php?id=" . $row['M_ID'] . "'class='up'>Update</a> | ";
                            echo "<a href='../deleteManager.php?id=" . $row['M_ID'] . "' class='del'>Delete</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </table><br><br><br>




            <h3 style="font-size: 20px;text-align:center"  >Add New Manager</h3>


            <div class="editPersonalm">
                <form method="post" action="Managers.php" class="man" >
                        
                        <label for="Admin_ID">Admin ID:</label>
                        <input class="ad" type="text" name="Admin_ID" required><br><br>

                        <label for="Name">Name:</label>
                        <input class="ad" type="text" name="Name" required><br><br>

                        <label for="DOB">Date of Birth:</label>
                        <input class="ad" type="date" name="DOB" required><br><br>

                        <label for="Password">Password:</label>
                        <input class="ad" type="password" name="Password" required><br><br>

                        <label for="City">City:</label>
                        <input class="ad" type="text" name="City" required><br><br>

                        <label for="Country">Country:</label>
                        <input class="ad" type="text" name="Country" required><br><br>

                        <label for="Postal_code">Postal Code:</label>
                        <input class="ad" type="text" name="Postal_code" required><br><br>

                        <label for="Street">Street:</label>
                        <input class="ad" type="text" name="Street" required><br><br>

                        <label for="House_number">House Number:</label>
                        <input class="ad" type="text" name="House_number" required><br><br>

                        <label for="Email">Email:</label>
                        <input class="ad" type="email" name="Email" required><br><br>

                        
                        <button type="submit" class="add">Add</button>
                    </form>

                    <?php

                            $dsn = "mysql:host=localhost;dbname=tvs"; // change the database name
                            $dbusername = "root";
                            $dbpassword = "";

                            try {
                            
                                $pdo = new PDO($dsn, $dbusername, $dbpassword);
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    // Retrieve form data
                                    $Admin_ID = $_POST['Admin_ID'];
                                    $Name = $_POST['Name'];
                                    $DOB = $_POST['DOB'];
                                    $Password = $_POST['Password'];
                                    $City = $_POST['City'];
                                    $Country = $_POST['Country'];
                                    $Postal_code = $_POST['Postal_code'];
                                    $Street = $_POST['Street'];
                                    $House_number = $_POST['House_number'];
                                    $Email = $_POST['Email'];

                                    
                                    $sql = "INSERT INTO Manager (Admin_ID, Name, DOB, Password, City, Country, Postal_code, Street, House_number, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $pdo->prepare($sql);

                                    // Bind parameters and execute the query
                                    $stmt->execute([$Admin_ID, $Name, $DOB, $Password, $City, $Country, $Postal_code, $Street, $House_number, $Email]);

                                    echo "Manager information inserted successfully!";
                                }
                            } catch (PDOException $e) {
                                echo "Connection failed: " . $e->getMessage();
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
