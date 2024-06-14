<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=tvc";
    $dbusername = "root";
    $dbpassword = ""; // Enter your MySQL password here

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        // Create a PDO database connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to insert data
        $stmt = $pdo->prepare("INSERT INTO Contact_us (Name, Email, Subject, Message) VALUES (?, ?, ?, ?)");

        if ($stmt->execute([$name, $email, $subject, $message])) {
            // Data inserted successfully, you can redirect to a thank you page or back to the contact form
            header("Location:index.php");
        } else {
            echo "Error submitting the contact form.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
