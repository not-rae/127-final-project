<?php
include 'DBConnector.php'; // Make sure this file correctly initializes $conn

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delOwner = $_POST['ownerID'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Prepare and execute the deletion from the history table
        $sqldelHistory = $conn->prepare("DELETE FROM history WHERE plateNumber IN (SELECT plateNumber FROM vehicle WHERE ownerID = ?)");
        $sqldelHistory->bind_param("i", $delOwner);
        $sqldelHistory->execute();
        $sqldelHistory->close(); // Close the statement after execution

        // Prepare and execute the deletion from the vehicle table
        $sqldelVehicle = $conn->prepare("DELETE FROM vehicle WHERE ownerID = ?");
        $sqldelVehicle->bind_param("i", $delOwner);
        $sqldelVehicle->execute();
        $sqldelVehicle->close(); // Close the statement after execution

        $sqldel1 = $conn->prepare("DELETE FROM carOwner WHERE ownerID = ?");
        $sqldel1->bind_param("i", $delOwner);
        $sqldel1->execute();
        $sqldel1->close(); // Close the statement after execution

        // Commit the transaction
        $conn->commit();

        // Redirect to owner.php after successful deletion
        header('Location: owner.php');
        exit();
    } catch (mysqli_sql_exception $exception) {
        // Rollback the transaction if an error occurs
        $conn->rollback();

        // Output the error message
        echo "Error deleting values: " . $exception->getMessage();
    }
}

// Close the database connection
$conn->close();
?>
