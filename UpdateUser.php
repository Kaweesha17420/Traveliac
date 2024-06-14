<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Get the data from the form
    $userId = $_POST['User_ID'];
    $firstName = $_POST['First_name'];
    $lastName = $_POST['Last_name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Update the data in the database
    $stmt = $connection->prepare("UPDATE Registered_User SET First_name=?, Last_name=?, Email=?, Password=? WHERE User_ID = ?");
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $userId);

    if ($stmt->execute()) {
        echo "User data updated successfully.";
        header("Location: Admin/UsersA.php"); // Redirect to the users page
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch the existing user data
    $sql = "SELECT * FROM Registered_User WHERE User_ID = $userId";
    $result = $connection->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="./Style/style.css">
</head>
<body>
    <div class="up_ad">
    <h2 class ="up" >Update User</h2>
    <form class="hotel" method="post" action="UpdateUser.php">
        <input type="hidden" name="User_ID" value="<?php echo $userId; ?>">
        <label for="First_name">First Name:</label>
        <input type="text" name="First_name" value="<?php echo $row['First_name']; ?>"><br>
        <label for="Last_name">Last Name:</label>
        <input type="text" name="Last_name" value="<?php echo $row['Last_name']; ?>"><br>
        <label for="Email">Email:</label>
        <input type="email" name="Email" value="<?php echo $row['Email']; ?>"><br>
        <label for="Password">Password:</label>
        <input type="text" name="Password" value="<?php echo $row['Password']; ?>"><br>
        <button class="update"  type="submit" value="Update">Update</button>
    </form>
    </div>
</body>
</html>
