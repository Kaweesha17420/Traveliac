<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Get the data from the form
    $hotel_id = $_POST['hotel_id'];
    $hotel_name = $_POST['hotel_name'];
    $phone_no = $_POST['phone_no'];
    $owner = $_POST['owner'];
    $city = $_POST['city'];

    // Prepare and execute the SQL query to update the hotel record
    $sql = "UPDATE Hotel SET hotel_name = '$hotel_name', phone_no = '$phone_no', owner = '$owner', city = '$city' WHERE hotel_id = $hotel_id";

    if ($connection->query($sql) === TRUE) {
        echo "Hotel data updated successfully.";
        header("Location: Admin/AdHotel.php"); // Redirect to the hotels page
        exit();
    } else {
        echo "Error updating hotel: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
}

if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch the existing hotel data
    $sql = "SELECT * FROM Hotel WHERE hotel_id = $hotel_id";
    $result = $connection->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Hotel not found.";
        exit();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Hotel</title>
    <link rel="stylesheet" type="text/css" href="./Style/style.css">
</head>
<body>
    <div class="up_ad ">
        <h2 class ="up" style="margin-top:50px;" >Update Hotel</h2>
        <form class="hotel" method="post" action="UpdateHotel.php">
            <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
            <label for="hotel_name">Hotel Name:</label>
            <input type="text" name="hotel_name" value="<?php echo $row['hotel_name']; ?>"><br>
            <label for="phone_no">Phone Number:</label>
            <input type="text" name="phone_no" value="<?php echo $row['phone_no']; ?>"><br>
            <label for="owner">Owner:</label>
            <input type="text" name="owner" value="<?php echo $row['owner']; ?>"><br>
            <label for="city">City:</label>
            <input type="text" name="city" value="<?php echo $row['city']; ?>"><br>
            <button class="update" type="submit" value="Update">Update</button>
        </form>
    </div>
</body>
</html>
