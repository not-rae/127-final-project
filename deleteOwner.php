<!-- 
    This is responsible for deleting all the values that matches with 
    the owner id.
    
 -->

<?php
include 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delOwner = $_POST['ownerID'];

    $conn->begin_transaction();

    // Error-catch:
    try {
   
        $sqldel1 = $conn->prepare("DELETE FROM carOwner WHERE ownerID = ?");
        $sqldel1->bind_param("i", $delOwner); // assign $delOwner as the value in ?
        $sqldel1->execute();


        $conn->commit();

        header('Location: owner.php'); // returns back to the owner.php
        exit(); // exits the page

    } catch (mysqli_sql_exception $exception) {
    
        $conn->rollback(); // rollback if there are any errors

        echo "Error deleting values: " . $exception->getMessage();
    }


    $sqldel1->close();

}

$conn->close();
?>