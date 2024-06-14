<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if User_ID is provided in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Sanitize the input to prevent SQL injection
        $userId = mysqli_real_escape_string($connection, $_GET['id']);

        // Prepare a SQL statement to delete the record
        $sql = "DELETE FROM Registered_User WHERE User_ID = $userId";

        // Execute the delete query
        if ($connection->query($sql) === TRUE) {
            // Record deleted successfully
            header("Location: Admin/UserA.php");
            exit();
        } else {
            echo "Error deleting user: " . $connection->error;
        }
    } else {
        echo "Invalid User ID.";
    }

    // Close the database connection
    $connection->close();
}
?>
