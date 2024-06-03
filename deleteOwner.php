<!-- 
    This is responsible for deleting all the values that matches with 
    the user id.
    
 -->

<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delOwner = $_POST['userID'];

    $checkRoleQuery = "SELECT userRole FROM user WHERE userID = '$delOwner'";
    $roleResult = $conn->query($checkRoleQuery);

    $conn->begin_transaction();

    // Error-catch:
    try {
        if ($roleResult->num_rows > 0) {
            $row = $roleResult->fetch_assoc();
            $userRole = $row['userRole'];

            if ($userRole == 'Owner') {
               
                $conn->query("DELETE FROM rep_vio WHERE reportID IN (SELECT reportID FROM report WHERE userID = '$delOwner')");
                $conn->query("DELETE FROM report WHERE userID = '$delOwner'");
            } else if ($userRole == "Both") {
                
                $conn->query("DELETE FROM rep_vio WHERE reportID IN (SELECT reportID FROM report WHERE userID = '$delOwner')");
                $conn->query("DELETE FROM report WHERE userID = '$delOwner'");
                $conn->query("DELETE FROM driverLicense WHERE userID = '$delOwner'");
            }

            // Finally, delete the user record
            $conn->query("DELETE FROM user WHERE userID = '$delOwner'");

            $conn->commit();

            header('Location: owner.php'); 
            exit(); 
        }
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); 
        echo "Error deleting values: " . $exception->getMessage();
    }
}

$conn->close();


?>