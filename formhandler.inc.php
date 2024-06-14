<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=tvs";
    $dbusername = "root";
    $dbpassword = "";

    // Get form data
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $email = $_POST['email'];
    $password = ($_POST['Password']); 
    
    try {
        // Create a PDO database connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to insert data
        $stmt = $pdo->prepare("INSERT INTO Registered_User (First_name, Last_name, Email, Password) VALUES (?, ?, ?, ?)");

        if ($stmt->execute([$Fname, $Lname, $email, $password])) {
            header("Location: index.php");
        } else {
            echo "Error registering user.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
