<?php
if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=tvs";
    $dbusername = "root";
    $dbpassword = "";

    try {
        // Create a PDO database connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to delete the hotel record
        $stmt = $pdo->prepare("DELETE FROM Hotel WHERE hotel_id = ?");
        $stmt->execute([$hotel_id]);

        echo "Hotel record deleted successfully.";
        header("Location: Admin/AdHotel.php");
    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
} else {
    echo "Hotel ID not specified.";
}
?>
