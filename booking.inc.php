<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to avoid "Undefined array key" warnings
    $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : '';
    $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : '';
    $numAdults = isset($_POST["Num_Adults"]) ? $_POST["Num_Adults"] : null;
    $numChildren = isset($_POST["Num_Children"]) ? $_POST["Num_Children"] : null;
    $country = isset($_POST["Country"]) ? $_POST["Country"] : '';
    $rDate = isset($_POST["R_Date"]) ? $_POST["R_Date"] : '';
    $status = isset($_POST["Status"]) ? $_POST["Status"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $contactNumber = isset($_POST["contactNumber"]) ? $_POST["contactNumber"] : '';
    $cardNumber = isset($_POST["cardNumber"]) ? $_POST["cardNumber"] : '';
    $expireDate = isset($_POST["expireDate"]) ? $_POST["expireDate"] : '';
    $cvc = isset($_POST["cvc"]) ? $_POST["cvc"] : '';

    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=tvs";
    $dbusername = "root";
    $dbpassword = "";

    try {
        // Create a PDO connection to the database
        $pdo = new PDO($dsn, $dbusername, $dbpassword);

        // Format the date as YYYY-MM-DD
        $rDate = date("Y-m-d", strtotime($rDate));

        // Insert data into the Reservation table
        $sql = "INSERT INTO Reservation (First_name, Last_name, Num_Adults, Num_Children, Country, R_Date, Status)
                VALUES (:firstName, :lastName, :numAdults, :numChildren, :country, :rDate, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':numAdults', $numAdults);
        $stmt->bindParam(':numChildren', $numChildren);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':rDate', $rDate);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        // Get the last inserted Reservation ID
       

        // Insert data into the payment table
        $sql = "INSERT INTO payment (credit_cardNum, expir_date, CVC)
                VALUES (:cardNumber, 1, :expireDate, :cvc)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cardNumber', $cardNumber);
        $stmt->bindParam(':expireDate', $expireDate);
        $stmt->bindParam(':cvc', $cvc);
        $stmt->execute();

        // Close the database connection
        $pdo = null;

        // Redirect to a success page or display a success message
        header("Location: index.php");
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}
?>
