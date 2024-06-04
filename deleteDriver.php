<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delDriver = $_POST['userID'];

    $checkRoleQuery = "SELECT userRole FROM User WHERE userID = '$delDriver'";
    $roleResult = $conn->query($checkRoleQuery);

    $conn->begin_transaction();


    try {
        if ($roleResult->num_rows > 0) {
            $row = $roleResult->fetch_assoc();
            $userRole = $row['userRole'];

            if ($userRole == 'Driver' || $userRole == "Both") {
                $licenseNumbersQuery = "SELECT licenseNumber FROM driverLicense WHERE userID = '$delDriver'";
                $licenseNumbersResult = $conn->query($licenseNumbersQuery);
                
                if ($licenseNumbersResult->num_rows > 0) {
                    while ($licenseRow = $licenseNumbersResult->fetch_assoc()) {
                        $licenseNumber = $licenseRow['licenseNumber'];
                        
                   
                        $conn->query("DELETE FROM rep_vio WHERE reportID IN (SELECT reportID FROM report WHERE licenseNumber = '$licenseNumber')");
                      
                        $conn->query("DELETE FROM report WHERE licenseNumber = '$licenseNumber'");
                    }
                }

             
                $conn->query("DELETE FROM driverLicense WHERE userID = '$delDriver'");
            }

          
            $conn->query("DELETE FROM User WHERE userID = '$delDriver'");

            $conn->commit();

            header('Location: driver.php'); 
            exit(); 
        } else {
            echo "User not found.";
        }
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); 
        echo "Error deleting values: " . $exception->getMessage();
    }
}

$conn->close();
?>
