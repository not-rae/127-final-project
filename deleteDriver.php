<!-- 
    This is responsible for deleting all the values that matches with 
    the driver id.
    
 -->

<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delDriver = intval($_POST['driverID']);

    $conn->begin_transaction();

    try {
        // deletes first the values from the driverLicense table where the driverID is a foreign key
        $sqldel2 = $conn->prepare("DELETE FROM driverLicense WHERE driverID = ?"); 
        $sqldel2->bind_param("i", $delDriver);
        $sqldel2->execute();



        $conn->commit();


    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback();

      
        echo "Error deleting Driver in driverLicense: " . $exception->getMessage();
    }
    try {

        // Then deletes the values in the carDriver
        $sqldel3 = $conn->prepare("DELETE FROM carDriver WHERE driverID = ?");
        $sqldel3->bind_param("i", $delDriver);
        $sqldel3->execute();


        $conn->commit();
        header('Location: driver.php');
        exit(); 


    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback();

      
        echo "Error deleting Driver in driver: " . $exception->getMessage();
    }
    
    $sqldel2->close();
    $sqldel3->close();
}

$conn->close();
?>