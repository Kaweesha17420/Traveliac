<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Get the data from the form
    $adminId = $_POST['Admin_ID'];
    $firstName = $_POST['First_name'];
    $lastName = $_POST['Last_name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $gender = $_POST['Gender'];
    $city = $_POST['City'];
    $country = $_POST['Country'];
    $postalCode = $_POST['Postal_code'];
    $street = $_POST['Street'];
    $houseNumber = $_POST['House_number'];

    // Update the data in the database
    $stmt = $connection->prepare("UPDATE Administrator SET First_name=?, Last_name=?, Email=?, Password=?, Gender=?, City=?, Country=?, Postal_code=?, Street=?, House_number=? WHERE Admin_ID = ?");
    $stmt->bind_param("ssssssssssi", $firstName, $lastName, $email, $password, $gender, $city, $country, $postalCode, $street, $houseNumber, $adminId);

    if ($stmt->execute()) {
        echo "Data updated successfully.";
        header("Location: Admin/Staff.php"); // Redirect to the staff page
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}

// Fetch and display the existing data for the user
if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch the existing user data
    $sql = "SELECT * FROM Administrator WHERE Admin_ID = $adminId";
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
    <title>Update Administrator</title>
    <link rel="stylesheet" type="text/css" href="./Style/style.css">
</head>
<body>
    <div class="up_ad">
    <h2 class ="up" >Update Administrator</h2>
    <form method="post" action="UpdateAdmin.php">
        <input type="hidden" name="Admin_ID" value="<?php echo $adminId; ?>">
        <label for="First_name">First Name:</label>
        <input type="text" name="First_name" value="<?php echo $row['First_name']; ?>"><br>
        <label for="Last_name">Last Name:</label>
        <input type="text" name="Last_name" value="<?php echo $row['Last_name']; ?>"><br>
        <label for="Email">Email:</label>
        <input type="email" name="Email" value="<?php echo $row['Email']; ?>"><br>
        <label for="Password">Password:</label>
        <input type="text" name="Password" value="<?php echo $row['Password']; ?>"><br>
        <label for="Gender">Gender:</label>
        <input type="text" name="Gender" value="<?php echo $row['Gender']; ?>"><br>
        <label for="City">City:</label>
        <input type="text" name="City" value="<?php echo $row['City']; ?>"><br>
        <label for="Country">Country:</label>
        <input type="text" name="Country" value="<?php echo $row['Country']; ?>"><br>
        <label for="Postal_code">Postal Code:</label>
        <input type="text" name="Postal_code" value="<?php echo $row['Postal_code']; ?>"><br>
        <label for="Street">Street:</label>
        <input type="text" name="Street" value="<?php echo $row['Street']; ?>"><br>
        <label for="House_number">House Number:</label>
        <input type="text" name="House_number" value="<?php echo $row['House_number']; ?>"><br>
        <button class="update"  type="submit" value="Update">Update</button>
    </form>
    </div>
</body>
</html>
