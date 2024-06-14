<?php
// Connect to the database
$connection = new mysqli("localhost", "root", "", "tvs");

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if driver_id is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $driverId = mysqli_real_escape_string($connection, $_GET['id']);

    // Prepare a SQL statement to delete the record
    $sql = "DELETE FROM taxi_drivers WHERE driver_id = $driverId";

    // Execute the delete query
    if ($connection->query($sql) === TRUE) {
        // Record deleted successfully
        header("Location: Admin/AdTaxi.php");
        exit();
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "Invalid Driver ID.";
}

// Close the database connection
$connection->close();
?>
