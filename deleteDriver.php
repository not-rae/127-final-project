<!-- 
    This is responsible for deleting all the values that matches with 
    the user id.
    
 -->

 <?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delDriver = $_POST['userID'];

    $checkRoleQuery = "SELECT userRole FROM user WHERE userID = '$delDriver'";
    $roleResult = $conn->query($checkRoleQuery);

    $conn->begin_transaction();

    // Error-catch:
    try {
        if ($roleResult->num_rows > 0) {
            $row = $roleResult->fetch_assoc();
            $userRole = $row['userRole'];

            if ($userRole == 'Driver' || $userRole == "Both") {

    
                $conn->query("DELETE FROM rep_vio WHERE reportID IN (SELECT reportID FROM report WHERE userID = '$delDriver')");
                $conn->query("DELETE FROM report WHERE userID = '$delDriver'");
                $conn->query("DELETE FROM driverLicense WHERE userID = '$delDriver'");
            }

      
            $conn->query("DELETE FROM user WHERE userID = '$delDriver'");

            $conn->commit();

            header('Location: driver.php'); 
            exit(); 
        }
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); 
        echo "Error deleting values: " . $exception->getMessage();
    }
}

$conn->close();


?>