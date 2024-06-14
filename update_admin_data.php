<?php
// Start or resume the session
session_start();

// Include the database connection details
$dsn = "mysql:host=localhost;dbname=tvs";
$dbusername = "root";
$dbpassword = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the admin's data based on the logged-in session
    $adminId = $_SESSION['Admin_ID'];

    // Process the form data
    $password = $_POST['password'];
    $first_name = $_POST['fName'];
    $last_name = $_POST['lName'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postal_code = $_POST['P_code'];
    $street = $_POST['street'];
    $house_number = $_POST['H_no'];
    $email = $_POST['email'];

    try {
        // Create a new PDO instance
        $conn = new PDO($dsn, $dbusername, $dbpassword);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update the admin's data in the database
        $stmt = $conn->prepare("UPDATE Administrator SET 
            Password = :password,
            First_name = :first_name,
            Last_name = :last_name,
            Gender = :gender,
            City = :city,
            Country = :country,
            Postal_code = :postal_code,
            Street = :street,
            House_number = :house_number,
            Email = :email
            WHERE Admin_ID = :adminId");

        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':house_number', $house_number);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adminId', $adminId);

        $stmt->execute();

        // Redirect to the admin page or another page after saving
        header("Location: Admin/Admin.php");

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
