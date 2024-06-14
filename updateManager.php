<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $M_ID = $_POST['M_ID'];
    $Admin_ID = $_POST['Admin_ID'];
    $Name = $_POST['Name'];
    $DOB = $_POST['DOB'];
    $Password = $_POST['Password'];
    $City = $_POST['City'];
    $Country = $_POST['Country'];
    $Postal_code = $_POST['Postal_code'];
    $Street = $_POST['Street'];
    $House_number = $_POST['House_number'];
    $Email = $_POST['Email'];

    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=tvs";
    $dbusername = "root";
    $dbpassword = "";

    try {
        // Create a PDO database connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to update the record
        $stmt = $pdo->prepare("UPDATE Manager SET Admin_ID=?, Name=?, DOB=?, Password=?, City=?, Country=?, Postal_code=?, Street=?, House_number=?, Email=? WHERE M_ID=?");
        $stmt->execute([$Admin_ID, $Name, $DOB, $Password, $City, $Country, $Postal_code, $Street, $House_number, $Email, $M_ID]);

        echo "Record updated successfully.";
        header("Location: Admin/Managers.php");
    } catch (PDOException $e) {
        echo "Error updating record: " . $e->getMessage();
    }
}

// Retrieve the manager's data by the ID from the URL
if (isset($_GET['id'])) {
    $M_ID = $_GET['id'];

    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=tvs";
    $dbusername = "root";
    $dbpassword = "";

    try {
        // Create a PDO database connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to fetch the manager's data
        $stmt = $pdo->prepare("SELECT * FROM Manager WHERE M_ID=?");
        $stmt->execute([$M_ID]);

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Manager not found.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Manager</title>
    <link rel="stylesheet" type="text/css" href="./Style/style.css">
</head>
<body>
<div class="up_ad">
    <h2 style="text-align: center;" >Update Manager</h2>
    <form method="post" action="updateManager.php">
        <input type="hidden" name="M_ID" value="<?php echo $M_ID; ?>">
        <label for="Admin_ID">Admin ID:</label>
        <input type="text" name="Admin_ID" value="<?php if(isset($row)) { echo $row['Admin_ID']; } ?>"><br>
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php if(isset($row)) { echo $row['Name']; } ?>"><br>
        <label for="DOB">Date of Birth:</label>
        <input type="date" name="DOB" value="<?php if(isset($row)) { echo $row['DOB']; } ?>"><br>
        <label for="Password">Password:</label>
        <input type="password" name="Password" value="<?php if(isset($row)) { echo $row['Password']; } ?>"><br>
        <label for="City">City:</label>
        <input type="text" name="City" value="<?php if(isset($row)) { echo $row['City']; } ?>"><br>
        <label for="Country">Country:</label>
        <input type="text" name="Country" value="<?php if(isset($row)) { echo $row['Country']; } ?>"><br>
        <label for="Postal_code">Postal Code:</label>
        <input type="text" name="Postal_code" value="<?php if(isset($row)) { echo $row['Postal_code']; } ?>"><br>
        <label for="Street">Street:</label>
        <input type="text" name="Street" value="<?php if(isset($row)) { echo $row['Street']; } ?>"><br>
        <label for="House_number">House Number:</label>
        <input type="text" name="House_number" value="<?php if(isset($row)) { echo $row['House_number']; } ?>"><br>
        <label for="Email">Email:</label>
        <input type="email" name="Email" value="<?php if(isset($row)) { echo $row['Email']; } ?>"><br>
        <button class="update" type="submit" value="Update">Update</button>
    </form>
</div>
</body>
</html>
