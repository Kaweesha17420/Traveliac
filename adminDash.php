<?php

// Connect to the database
$connection = new mysqli("localhost", "root", "", "tvs");

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$password = ($_POST['password']);

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$country = $_POST['country'];
$P_code = $_POST['P_code'];
$street = $_POST['street'];
$H_no = $_POST['H_no'];
$email = $_POST['email'];

// Insert data into Administrator table using prepared statements
$stmt = $connection->prepare("INSERT INTO Administrator (First_name, Last_name, Email, Password, Gender, City, Country, Postal_code, Street, House_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssssssss", $fName, $lName, $email, $password, $gender, $city, $country, $P_code, $street, $H_no);

// Execute the query
if ($stmt->execute()) {
    echo "Data inserted successfully.";
    header("Location: Admin/Staff.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connection->close();

?>
