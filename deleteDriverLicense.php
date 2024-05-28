<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delDL = intval($_POST['licenseNumber']);

    $conn->begin_transaction();

    try {
   
        $sqldel2 = $conn->prepare("DELETE FROM history WHERE licenseNumber = ?");
        $sqldel2->bind_param("i", $delDL);
        $sqldel2->execute();

       
        $sqldel1 = $conn->prepare("DELETE FROM driverLicense WHERE licenseNumber = ?");
        $sqldel1->bind_param("i", $delDL);
        $sqldel1->execute();


        $conn->commit();

        header('Location: driverLicense.php');
        exit(); 
    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback();

      
        echo "Error deleting values: " . $exception->getMessage();
    }


    $sqldel1->close();
    $sqldel2->close();
}

$conn->close();
?>