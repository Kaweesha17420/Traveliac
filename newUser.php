<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "tvs");

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Get the data from the form
    $firstName = $_POST['First_name'];
    $lastName = $_POST['Last_name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Insert the new user data into the database
    $stmt = $connection->prepare("INSERT INTO Registered_User (First_name, Last_name, Email, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute()) {
        echo "User added successfully.";
        header("Location: Admin/UsersA.php"); // Redirect to the users page
        exit();
    } else {
        echo "Error adding user: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
?>
