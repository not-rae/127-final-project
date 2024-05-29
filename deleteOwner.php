

<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delOwner = $_POST['ownerID'];

    $conn->begin_transaction();

    try {
   
        $sqldel1 = $conn->prepare("DELETE FROM carOwner WHERE ownerID = ?");
        $sqldel1->bind_param("i", $delOwner);
        $sqldel1->execute();


        $conn->commit();

        header('Location: owner.php');
        exit(); 
    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback();

        echo "Error deleting values: " . $exception->getMessage();
    }


    $sqldel1->close();

}

$conn->close();
?>