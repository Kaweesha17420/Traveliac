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
    $driverId = $_POST['driver_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $vehicleNumber = $_POST['vehicle_number'];
    $phoneNo = $_POST['phone_number'];
    $email = $_POST['email'];

    // Update the data in the database
    $stmt = $connection->prepare("UPDATE taxi_drivers SET first_name=?, last_name=?, vehicle_number=?, phone_number=?, email=? WHERE driver_id = ?");
    $stmt->bind_param("sssssi", $firstName, $lastName, $vehicleNumber, $phoneNo, $email, $driverId);

    if ($stmt->execute()) {
        echo "Data updated successfully.";
        header("Location: Admin/AdTaxi.php"); // Redirect to the taxi drivers page
        exit();
    } else {
        echo "Error updating taxi driver: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}

// Fetch and display the existing data for the taxi driver
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $driverId = $_GET['id'];

    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch the existing taxi driver data
    $sql = "SELECT * FROM taxi_drivers WHERE driver_id = $driverId";
    $result = $connection->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Taxi driver not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Taxi Driver</title>
    <link rel="stylesheet" type="text/css" href="./Style/style.css">
</head>
<body>
    <div class="up_tax">
    <h2 class ="up" >Update Taxi Driver</h2>
    <form method="post" action="edittaxi.php">
        <input type="hidden" name="driver_id" value="<?php echo $driverId; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br>
        <label for="vehicle_number">Vehicle Number:</label>
        <input type="text" name="vehicle_number" value="<?php echo $row['vehicle_number']; ?>"><br>
        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number" value="<?php echo $row['phone_number']; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
        <button class="update"  type="submit" value="Update">Update</button>
    </form>
    </div>
</body>
</html>
