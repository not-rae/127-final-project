

<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delhistory = $_POST['licenseNumber'];

    $conn->begin_transaction();

    try {
   
        $sqldel1 = $conn->prepare("DELETE FROM history WHERE licenseNumber = ?");
        $sqldel1->bind_param("i", $delhistory);
        $sqldel1->execute();


        $conn->commit();

        header('Location: history.php');
        exit(); 
    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback();

        echo "Error deleting values: " . $exception->getMessage();
    }


    $sqldel1->close();

}

$conn->close();
?>