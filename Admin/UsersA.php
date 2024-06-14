<!DOCTYPE html>
<html>
    <head>
        <title>users</title>
        <link rel="stylesheet" type="text/css" href="../Style/style.css">
        <!--fontawesome icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
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
    </style>
    </head>

<body>
    
<section class="AdminHeader">

    <nav>
        <a href="../index.php"><img src="../Images/Traveliac logo.png" class="hed" ></a>
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
            
            <a  class="menu-item active" href="UsersA.php">
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
            
            <a href="../logout.php"><button for="log-out" class="btn-logout">Log Out</button></a>
        </aside>
    </div>
    
    <!--============Main Middle Start============-->
    <div class="main-middle">
        <div class="middle-container">
            <div class="edituc">
                <h3>Users</h3><span>Add,Remove or Edit Users</span>
            </div>
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
                            $sql = "SELECT * FROM Registered_User";
                            $result = $connection->query($sql);

                            if ($result->num_rows > 0) {
                                // Output table headers
                                echo "<table>";
                                echo "<tr><th>User_ID</th><th>First Name</th><th>Last Name</th><th>Password</th><th>Email</th>";
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["User_ID"] . "</td>";
                                    echo "<td>" . $row["First_name"] . "</td>";
                                    echo "<td>" . $row["Last_name"] . "</td>";
                                    echo "<td>" . $row["Password"] . "</td>";
                                    echo "<td>" . $row["Email"] . "</td>";
                                    
                                    

                                    // Add an Update button
                                    echo "<td><a href='../UpdateUser.php?id=" . $row["User_ID"] . "' class='up'>Update</a></td>";

                                    // Add a Delete button
                                    echo "<td><a href='../DeleteUser.php?id=" . $row["User_ID"] . "' class='del'>Delete</a></td>";

                                    echo "</tr>";
                                }

                                echo "</table>";
                            } else {
                                echo "No records found.";
                            }

                            // Close the database connection
                            $connection->close();
                            ?>

                    </div>
                    <div class="add_user">
                    <h2 class="up">Add New User</h2>
                    <form method="post" action="../newUser.php">
                        <label for="First_name">First Name:</label>
                        <input type="text" name="First_name" required><br>
                        <label for="Last_name">Last Name:</label>
                        <input type="text" name="Last_name" required><br>
                        <label for="Email">Email:</label>
                        <input type="email" name="Email" required><br>
                        <label for="Password">Password:</label>
                        <input type="text" name="Password" required><br>
                        <button class="add" type="submit" value="Add">Add</button>
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
