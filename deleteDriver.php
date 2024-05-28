
<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delDriver = intval($_POST['driverID']);

    $conn->begin_transaction();

    try {

        $sqldel2 = $conn->prepare("DELETE FROM driverLicense WHERE driverID = ?");
        $sqldel2->bind_param("i", $delDriver);
        $sqldel2->execute();


        $sqldel3 = $conn->prepare("DELETE FROM carDriver WHERE driverID = ?");
        $sqldel3->bind_param("i", $delDriver);
        $sqldel3->execute();


        $conn->commit();

        header('Location: driverLicense.php');
        exit(); 


    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback();

      
        echo "Error deleting values: " . $exception->getMessage();
    }



    $sqldel2->close();
    $sqldel3->close();
}

$conn->close();
?>