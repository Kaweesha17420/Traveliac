<?php
session_start();
include "connection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT User_ID, First_name, Last_name, Email, Password, NULL as Admin_ID, 'user' as role FROM registered_user WHERE Email='$uname' AND Password='$pass' 
                UNION 
                SELECT NULL as User_ID, First_name, Last_name, Email, Password, Admin_ID, 'admin' as role FROM Administrator WHERE Email='$uname' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['role'] === 'user') {
                // User login
                $_SESSION['email'] = $row['Email'];
                $_SESSION['First_name'] = $row['First_name'];
                $_SESSION['Last_name'] = $row['Last_name'];
                $_SESSION['User_ID'] = $row['User_ID'];
                header("Location: user.php");
                exit();
            } elseif ($row['role'] === 'admin') {
                // Admin login
                $_SESSION['email'] = $row['Email'];
                $_SESSION['First_name'] = $row['First_name'];
                $_SESSION['Last_name'] = $row['Last_name'];
                $_SESSION['Admin_ID'] = $row['Admin_ID'];
                // Set other admin-related session variables
                header("Location: Admin/Admin.php");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
