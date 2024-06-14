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

            <a  class="menu-item active" href="Staff.php">
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
            <a  class="menu-item" href="../Index.php">
                <i class="fa fa-home" aria-hidden="true"></i><h3>Home Page</h3>
            </a>
            <<a href="../logout.php"><button for="log-out" class="btn-logout">Log Out</button></a>
        </aside>
    </div>
    
    <!--============Main Middle Start============-->
    
    <!--Feed Aria Start-->
    <div class="main-middle">
        <div class="middle-container">
            <div class="edituc">
                <h3>STAFF MEMBERS</h3><span>Add,Remove or Edit Staff Members</span>
            </div><br><br><br>
            <div class="feed">


                    <div class="feed-">
                    <?php
                        // Connect to the database
                        $connection = new mysqli("localhost", "root", "", "tvs");

                        // Check for connection errors
                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        // Perform a database query to fetch data
                        $sql = "SELECT * FROM Administrator";
                        $result = $connection->query($sql);

                        if ($result->num_rows > 0) {
                            // Output table headers
                            echo "<table>";
                            echo "<tr><th>Admin_ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>Gender</th><th>DOB</th><th>City</th><th>Country</th><th>P_Code</th><th>Street</th><th>H_Name</th><th>Action</th></tr>";

                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Admin_ID"] . "</td>";
                                echo "<td>" . $row["First_name"] . "</td>";
                                echo "<td>" . $row["Last_name"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "<td>" . $row["Password"] . "</td>";
                                echo "<td>" . $row["Gender"] . "</td>";
                                echo "<td>" . $row["DOB"] . "</td>";
                                echo "<td>" . $row["City"] . "</td>";
                                echo "<td>" . $row["Country"] . "</td>";
                                echo "<td>" . $row["Postal_code"] . "</td>";
                                echo "<td>" . $row["Street"] . "</td>";
                                echo "<td>" . $row["House_number"] . "</td>";

                                //update
                                // Add an Update button
                                echo "<td><a href='../UpdateAdmin.php?id=" . $row["Admin_ID"] . "'class='up'>Update</a></td>";

                                // Add a Delete button
                                echo "<td><a href='../delete.php?id=" . $row["Admin_ID"] . "'class='del'>Delete</a></td>";

                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No records found.";
                        }

                        // Close the database connection
                        $connection->close();
                        ?>

                    </div><br><br><br>
            <div class="editPersonals">
                <h3>Add New User</h3><br>
                <form action="../adminDash.php" method="post">
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
                    <button type="submit" class="add">Add</button>
                </form>
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